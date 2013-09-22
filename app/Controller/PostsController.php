<?php

class PostsController extends AppController {

	public $helpers = array('Html', 'Form');

	public function index()
	{
		$this->set('title_for_layout', 'Vieraskirja');
		$this->set('posts', $this->Post->find('all'));
	}

	
}