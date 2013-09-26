<?php


class ProductsController extends AppController {

	public $helpers = array('Html', 'Form');

	public function index()
	{
		$this->set('title_for_layout', 'Verkkokauppa');
        
        $this->loadModel('Product_type');

        $this->set('ptypes', $this->Product_type->find('all'));
	}

    public function search()
    {
        
        if ( ! empty($this->data))
        {
            $products = $this->Product->find('all', 
                array('conditions' => 
                              array('Product.product_name LIKE' => '%'.strtoupper($this->data['Product']['product_name']).'%',
                                    'Product.ptype_id' => (int) $this->data['Product']['ptype_id'])
                                           ));

            $this->set('products', $products);
        }
        elseif ( empty($this->data)) 
        {
            $this->set('products', 'null');
        }          
    }

	

	
}