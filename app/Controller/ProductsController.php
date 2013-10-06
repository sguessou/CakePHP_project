<?php

App::uses('ConnectionManager', 'Model');

class ProductsController extends AppController {

	public $helpers = array('Html', 'Form' => array('className' => 'BootstrapForm'), 'Js');

    public $components = array('RequestHandler');

    public $baseUrl = FULL_BASE_URL;

	public function index()
	{
        $this->getCartId();

        $this->logUser('Index');

		$this->set('title_for_layout', 'Verkkokauppa');
        $this->set('baseUrl', $this->baseUrl);
           
        $this->loadModel('Product_type');
        $this->set('ptypes', $this->Product_type->find('all'));

        $this->pageTitle = 'Verkkokauppa';
        
    }//End method index

    
    public function search($action = NULL)
    {
        $this->set('title_for_layout', 'Haun Tulos');

        $db = ConnectionManager::getDataSource('default');

        $cartId = $this->getCartId();


        if ( isset($this->data['Product']['product_name'])) 
        {
            $this->logUser('Search');

            $fieldName = $this->data['Product']['product_name'];
            $orderByName =  $this->data['order'];
            $productTypeId = (int) $this->data['Product']['ptype_id'];
            
            $products = $this->searchEngine($fieldName, $orderByName, $productTypeId);

            $this->set('products', $products);
            $this->set('baseUrl', $this->baseUrl);
        }

    }//End method search

    public function searchEngine($fieldName, $orderByName, $productTypeId)
    {
        $value = '%';

        if ( $fieldName)
        {
            $value = '%' . $fieldName . '%';        
        }

        if ( $orderByName)
        {
            $products = $this->Product->find('all', array('conditions' => 
                                                        array('Product.product_name LIKE' => $value,
                                                              'Product.ptype_id' => $productTypeId),
                                                              'order' => array('Product.product_name ASC')
                                               ));
            return $products;
        }    
           
        $products = $this->Product->find('all', array('conditions' => 
                                                            array('Product.product_name LIKE' =>  $value,
                                                                  'Product.ptype_id' => $productTypeId )
                                               ));
        return $products;

    }//End method searchEngine

	public function addView()
    { 
        $this->set('title_for_layout', 'Verkkokauppa');

        $this->loadModel('Product_type');
        
        $this->set('ptypes', $this->Product_type->find('all'));

        $this->pageTitle = 'Verkkokauppa';
    }

    public function add()
    {
        $this->logUser('Add product');

        if ( $this->request->is('post')) 
        {
            if ( $this->Product->save($this->request->data)) 
            {
                $this->Session->setFlash('Tuote tallennettu!');
                return $this->redirect(array('action' => 'addView'));
            }
        }

        $this->Session->setFlash('Tuote ei voitu tallentaa!');

        return $this->redirect(array('action' => 'addView'));
    }

    public function addToCart()
    {
       
        $cartId = $this->getCartId();

        $db = ConnectionManager::getDataSource('default');

        $this->set('dataitems', $db->fetchAll('SELECT products.* , cartitems.quantity, product_types.type_name as typeName FROM products 
                                                INNER JOIN cartitems
                                                INNER JOIN product_types  
                                                WHERE products.product_id = cartitems.product_id
                                                AND products.ptype_id = product_types.ptype_id 
                                                AND cartitems.cart_id LIKE ?', array($cartId))
                                              );

    }

    public function emptyCart()
    {
        $this->logUser('Empty cart');

        $this->loadModel('Cartitem');

        $cartId = $this->getCartId();

        $conditions = array('Cartitem.cart_id' => $cartId);

        $this->Cartitem->deleteAll($conditions, false);
        
        return $this->redirect(array('action' => 'index'));
    }

    public function logUser($action)
    {
        $this->loadModel('Accesslog');

        $this->Accesslog->create();
        $this->Accesslog->set('url', $action);
        $this->Accesslog->set('ip', $_SERVER['REMOTE_ADDR']);
        $this->Accesslog->set('host', gethostbyaddr( $_SERVER['REMOTE_ADDR'] ));
        $this->Accesslog->set('accessed_at', date("Y-m-d H:i:s"));
        $this->Accesslog->save();

        return;
    }

    public function randomProducts()
    {
        $db = ConnectionManager::getDataSource('default');

        $productIds = $db->fetchAll('SELECT product_id FROM products ORDER BY product_id DESC');

        $count = $db->fetchAll('SELECT COUNT(*) as cnt FROM products');

        $count = (int) $count[0][0]['cnt'];

        $products = array();

        $i = 0;

        while ($i < 8)
        {
           $arrIndex =  rand(0, $count-1);

           if ( $productIds[$arrIndex] > 0)
           {
                $products[] = $productIds[$arrIndex];

                $productIds[$arrIndex] = 0;

                $i++;
           }
           
        }

        $this->set('products', $products);

    }//End method randomProducts

    public function listProducts($productTypeId)
    {
        $db = ConnectionManager::getDataSource('default');

        $products = $db->fetchAll('SELECT * FROM products WHERE ptype_id = ? ORDER BY product_id DESC', array($productTypeId));

        $this->set('products', $products);
    }

    public function getCartId()
    {
        // If cart_id is in the session, get it from there 
        $cart_id = $this->Session->read('cartId');

        if ( $cart_id)
        {
            return $cart_id;
        }

        // If not we generate a new one and save it in the session
        if (! $cart_id)
        {
            $cart_id = md5( uniqid(rand(), true) );

            $this->Session->write('cartId', $cart_id);

            return $cart_id;
        }
    }//End getCartId

    public function addItem()
    {
        $db = ConnectionManager::getDataSource('default');
        $this->loadModel('Cartitem');

        $cartId = $this->getCartId();

        $this->autoRender = false;

        $pid = $this->request->data['pid'];

        //We check if product exist in cart
        $count = $db->fetchAll('SELECT COUNT(*) as cnt FROM cartitems 
                                WHERE product_id = ? AND cart_id LIKE ?', array($pid, $cartId));

        $count = (int) $count[0][0]['cnt'];

        //If product found we update quantity
        if ( $count)
        {
            $this->Cartitem->updateAll(array('Cartitem.quantity' => 'Cartitem.quantity + 1'), 
                                            array(
                                                'Cartitem.cart_id LIKE' => $cartId, 
                                                'Cartitem.product_id' => $pid
                                            ));        
        }
        //If product not found we insert it into table 
        elseif ( ! $count)
        {
            $this->Cartitem->create();
            $this->Cartitem->set('cart_id', $cartId);
            $this->Cartitem->set('product_id', $pid);
            $this->Cartitem->set('added_at', date("Y-m-d H:i:s"));
            $this->Cartitem->save();
        }    
    }
	
    public function cartCount()
    {
        $db = ConnectionManager::getDataSource('default');

        $cart_id = $this->getCartId();

        $count = $db->fetchAll('SELECT SUM(quantity) as cnt FROM cartitems WHERE cart_id LIKE ?', array($cart_id));

        $this->set('count', (int) $count[0][0]['cnt']);
    }

}//End class ProductsController