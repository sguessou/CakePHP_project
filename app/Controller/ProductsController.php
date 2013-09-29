<?php

App::uses('ConnectionManager', 'Model');

class ProductsController extends AppController {

	public $helpers = array('Html', 'Form' => array('className' => 'BootstrapForm'), 'Js');

    public $components = array('RequestHandler');

	public function index()
	{
        $this->logUser('Index page');

		$this->set('title_for_layout', 'Verkkokauppa');
        
        $this->loadModel('Product_type');
        $this->loadModel('Cartitem');

        $this->set('ptypes', $this->Product_type->find('all'));

        // If cart_id is in the session, get it from there 
        $cart_id = $this->Session->read('cartId');

        // If not we generate a new one and save it in the session
        if (! $cart_id)
        {
            $cart_id = md5( uniqid(rand(), true) );

            $this->Session->write('cartId', $cart_id);
        }

        $this->set('cartItems', $this->Cartitem->find('all', array(
                                         'conditions' => array('Cartitem.cart_id LIKE' => $cart_id),
                                         'fields' => array('SUM(Cartitem.quantity) AS cnt'),
                                         'group' => 'Cartitem.cart_id'           
                                                      )));

        $this->pageTitle = 'Verkkokauppa';
	}

    
    public function search()
    {
        $this->set('title_for_layout', 'Haun Tulos');

        $db = ConnectionManager::getDataSource('default');

        $cartId = $this->Session->read('cartId');


        if ( ! $this->RequestHandler->isAjax())
        {
            $this->logUser('Search');

            $fieldName = $this->data['Product']['product_name'];
            $orderByName =  $this->data['order'];
            $productTypeId = (int) $this->data['Product']['ptype_id'];
            
            $products = $this->searchEngine($fieldName, $orderByName, $productTypeId);

            $this->set('products', $products);
        }
           
        $this->loadModel('Cartitem');

        if ($this->Cartitem->save($this->data))
        {
            $this->logUser('Ajax');
            
            $this->set('dataitems', $db->fetchAll('SELECT products.* FROM products INNER JOIN cartitems  
                                                   WHERE products.product_id = cartitems.product_id 
                                                   AND cartitems.cart_id LIKE ? ', array($cartId)));
                
            $this->render('add_to_cart', 'ajax');    
        }
        
    }//End method search

    public function searchEngine($fieldName, $orderByName, $productTypeId)
    {
        //$db = ConnectionManager::getDataSource('default');

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
        }
        else
        {
            $products = $this->Product->find('all', array('conditions' => 
                                                            array('Product.product_name LIKE' =>  $value,
                                                                  'Product.ptype_id' => $productTypeId )
                                               ));
        }
           
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

        $this->set('dataitems', $db->fetchAll('SELECT products.* FROM products INNER JOIN cartitems  
                                                WHERE products.product_id = cartitems.product_id 
                                                AND cartitems.cart_id LIKE ? ', array($cartId))
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

	
}