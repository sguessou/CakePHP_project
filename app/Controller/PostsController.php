<?php

class PostsController extends AppController {
	public $helpers = array('Html', 'Form');

	$this->set('posts', $this->Post->find('all'));
}