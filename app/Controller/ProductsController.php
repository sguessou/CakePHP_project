<?php

App::uses('ConnectionManager', 'Model');

class ProductsController extends AppController {

	public $helpers = array('Html', 'Form' => array('className' => 'BootstrapForm'), 'Js');

    public $components = array('RequestHandler');


	public function index()
	{
        $db = ConnectionManager::getDataSource('default');

        $this->logUser('Index');

		$this->set('title_for_layout', 'Verkkokauppa');
        
        $this->loadModel('Product_type');
        
        $this->set('ptypes', $this->Product_type->find('all'));

        // If cart_id is in the session, get it from there 
        $cart_id = $this->Session->read('cartId');

        // If not we generate a new one and save it in the session
        if (! $cart_id)
        {
            $cart_id = md5( uniqid(rand(), true) );

            $this->Session->write('cartId', $cart_id);
        }

        if ( $this->RequestHandler->isAjax())
        {
            $cartId = $this->Session->read('cartId');

            $this->logUser('IndexAjax');
                
            $this->set('dataitems', $db->fetchAll('SELECT products.* , product_types.type_name as typeName FROM products 
                                                   INNER JOIN cartitems
                                                   INNER JOIN product_types  
                                                   WHERE products.product_id = cartitems.product_id
                                                   AND products.ptype_id = product_types.ptype_id 
                                                   AND cartitems.cart_id LIKE ?', array($cartId)));   

            $this->render('add_to_cart', 'ajax');
        }   
         
        $count = $db->fetchAll('SELECT COUNT(*) as cnt FROM cartitems WHERE cart_id LIKE ?', array($cart_id));

        $this->set('count', (int) $count[0][0]['cnt']);

        $this->pageTitle = 'Verkkokauppa';
        
    }//End method index

    
    public function search()
    {
        $this->set('title_for_layout', 'Haun Tulos');

        $db = ConnectionManager::getDataSource('default');

        $cartId = $this->Session->read('cartId');


        if ( isset($this->data['Product']['product_name'])) 
        {
            $this->logUser('Search');

            $fieldName = $this->data['Product']['product_name'];
            $orderByName =  $this->data['order'];
            $productTypeId = (int) $this->data['Product']['ptype_id'];
            
            $products = $this->searchEngine($fieldName, $orderByName, $productTypeId);

            $this->set('products', $products);

            $count = $db->fetchAll('SELECT COUNT(*) as cnt FROM cartitems WHERE cart_id LIKE ?', array($cartId));

            $this->set('count', (int) $count[0][0]['cnt']);
        }

        if ( $this->RequestHandler->isAjax())
        {
            if ( $this->data['Form']['action'] == 'addProduct')
            {
                $this->loadModel('Cartitem');

                if ( $this->Cartitem->save($this->data))
                {
                    $cartId = $this->Session->read('cartId');

                    $this->logUser('Ajax-add');
                    
                    $this->set('dataitems', $db->fetchAll('SELECT products.* , product_types.type_name as typeName FROM products 
                                                           INNER JOIN cartitems
                                                           INNER JOIN product_types  
                                                           WHERE products.product_id = cartitems.product_id
                                                           AND products.ptype_id = product_types.ptype_id 
                                                           AND cartitems.cart_id LIKE ?', array($cartId)));

                    $this->render('add_to_cart', 'ajax');    
                }
            }
            elseif ( $this->data['Form']['action'] == 'showCart')
            {
                $this->logUser('Ajax-show');

                $cartId = $this->Session->read('cartId');
                    
                $this->set('dataitems', $db->fetchAll('SELECT products.* , product_types.type_name as typeName FROM products 
                                                       INNER JOIN cartitems
                                                       INNER JOIN product_types  
                                                       WHERE products.product_id = cartitems.product_id
                                                       AND products.ptype_id = product_types.ptype_id 
                                                       AND cartitems.cart_id LIKE ?', array($cartId)));
      
                $this->render('add_to_cart', 'ajax');        
            } 
            
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
       
        $cartId = $this->Session->read('cartId');

        $db = ConnectionManager::getDataSource('default');

        $this->set('dataitems', $db->fetchAll('SELECT products.* , product_types.type_name as typeName FROM products 
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

        $cartId = $this->Session->read('cartId');

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

    public function test()
    {
        $db = ConnectionManager::getDataSource('default');

        $this->logUser('Index');

        $this->set('title_for_layout', 'Verkkokauppa');
        
        $this->loadModel('Product_type');
        
        $this->set('ptypes', $this->Product_type->find('all'));

        // If cart_id is in the session, get it from there 
        $cart_id = $this->Session->read('cartId');

        // If not we generate a new one and save it in the session
        if (! $cart_id)
        {
            $cart_id = md5( uniqid(rand(), true) );

            $this->Session->write('cartId', $cart_id);
        }

        if ( $this->RequestHandler->isAjax())
        {
            $cartId = $this->Session->read('cartId');

            $this->logUser('IndexAjax');
                
            $this->set('dataitems', $db->fetchAll('SELECT products.* , product_types.type_name as typeName FROM products 
                                                   INNER JOIN cartitems
                                                   INNER JOIN product_types  
                                                   WHERE products.product_id = cartitems.product_id
                                                   AND products.ptype_id = product_types.ptype_id 
                                                   AND cartitems.cart_id LIKE ?', array($cartId)));   

            $this->render('add_to_cart', 'ajax');
        }   
         
        $count = $db->fetchAll('SELECT COUNT(*) as cnt FROM cartitems WHERE cart_id LIKE ?', array($cart_id));

        $this->set('count', (int) $count[0][0]['cnt']);

        $this->pageTitle = 'Verkkokauppa';
    }

	
}