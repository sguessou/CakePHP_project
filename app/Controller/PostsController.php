<?php

class PostsController extends AppController {

	public $helpers = array('Html', 'Form');

	public function index()
	{
		$this->set('title_for_layout', 'Vieraskirja');
		$this->set('posts', $this->Post->find('all'));
	}

	public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

	
}