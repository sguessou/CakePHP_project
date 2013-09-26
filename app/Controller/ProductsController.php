<?php


class ProductsController extends AppController {

	public $helpers = array('Html', 'Form' => array('className' => 'BootstrapForm'));

	public function index()
	{
		$this->set('title_for_layout', 'Verkkokauppa');
        
        $this->loadModel('Product_type');

        $this->set('ptypes', $this->Product_type->find('all'));

        $this->pageTitle = 'Verkkokauppa';
	}


    public function search()
    {
        $this->set('title_for_layout', 'Haun Tulos');
        

        if ( $this->data['Product']['product_name'] && ! $this->data['order'])
        {
            $products = $this->Product->find('all', 
                array('conditions' => 
                              array('Product.product_name LIKE' => '%'.strtoupper($this->data['Product']['product_name']).'%',
                                    'Product.ptype_id' => (int) $this->data['Product']['ptype_id'])
                                           ));

            $this->set('products', $products);
        }
        //select query + order by product_name asc
        elseif ( $this->data['Product']['product_name'] && $this->data['order'])
        {
            $products = $this->Product->find('all', 
                array('conditions' => 
                              array('Product.product_name LIKE' => '%'.strtoupper($this->data['Product']['product_name']).'%',
                                    'Product.ptype_id' => (int) $this->data['Product']['ptype_id']),
                       'order' => array('Product.product_name ASC')
                                           ));

            $this->set('products', $products);
        }
        elseif ( ! $this->data['Product']['product_name'] && ! $this->data['order']) 
        {
            $products = $this->Product->find('all', 
                         array('conditions' => array('Product.ptype_id' => (int) $this->data['Product']['ptype_id'])
                    ));

            $this->set('products', $products);
        }
        //select query + order by product_name asc
        elseif ( ! $this->data['Product']['product_name'] && $this->data['order']) 
        {
            $products = $this->Product->find('all', 
                         array('conditions' => array( 'Product.ptype_id' => (int) $this->data['Product']['ptype_id'] ),
                               'order' => array('Product.product_name ASC')
                               ));

            $this->set('products', $products);
        }

        $this->pageTitle = 'Haun Tulos';          
    
    }//End method search

	public function addView()
    {
        $this->set('title_for_layout', 'Verkkokauppa');

        $this->loadModel('Product_type');
        
        $this->set('ptypes', $this->Product_type->find('all'));
    }

	
}