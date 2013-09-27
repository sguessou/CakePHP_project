<?php


class ContactsController extends AppController {

	public $helpers = array('Html', 'Form' => array('className' => 'BootstrapForm'), 'Js');

	public $components = array('RequestHandler');

	// In the controller
	public function contact() 
	{
		$this->set('contacts', $this->paginate());
	}

	public function index()
	{
		if (! empty($this->data))
		{
			$this->Contact->create();
			if ($this->Contact->save($this->data))
			{
				if ($this->RequestHandler->isAjax())
				{
					$this->set('contacts', $this->paginate());
					$this->render('contact', 'ajax');
				}
				else
				{
					$this->Session->setFlash('Contact has been saved');
					$this->redirect(array('action' => 'contact'));
				}
			}
		}
	}

} 