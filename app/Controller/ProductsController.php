<?php

class ProductsController extends AppController {

	public $helpers = array('Html', 'Form');

	public function index()
	{
		$this->set('title_for_layout', 'Verkkokauppa');
	}

	

	
}