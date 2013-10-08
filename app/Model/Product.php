<?php

class Product extends AppModel {

	public $components = array('Session');

	public $name = 'Product';

	public $validate = array(

				'filename' =>	array(
										'uploadError' => array(
															'rule' => 'uploadError',
															'message' => 'Something went wrong with the file upload',
															'required' => FALSE,
															'allowEmpty' => TRUE
											                   ),
										'mimeType' => array(
													'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
													'message' => 'Invalid file, only images allowed',
													'required' => FALSE,
													'allowEmpty' => TRUE
															),
										'processUpload' => array(
													'rule' => 'processUpload',
													'message' => 'Something went wrong processing your file',
													'required' => FALSE,
													'allowEmpty' => TRUE,
													'last' => TRUE
												)));

	public $uploadDir = 'images';

	/**
	 * Before Validation Callback
	 * @param array $options
	 * @return boolean
	 */
	public function beforeValidate($options = array()) {
		// ignore empty file - causes issues with form validation when file is empty and optional
		if (!empty($this->data[$this->alias]['filename']['error']) && $this->data[$this->alias]['filename']['error']==4 && $this->data[$this->alias]['filename']['size']==0) {
			unset($this->data[$this->alias]['filename']);
		}

		return parent::beforeValidate($options);
	}

	/**
	 * Process the Upload
	 * @param array $check
	 * @return boolean
	 */
	public function processUpload($check=array()) {
		// deal with uploaded file
		if (!empty($check['filename']['tmp_name'])) {

			// check file is uploaded
			if (!is_uploaded_file($check['filename']['tmp_name'])) {
				return FALSE;
			}

			
			
			App::uses('CakeSession', 'Model/Datasource');
			$filename =  WWW_ROOT . $this->uploadDir . DS . CakeSession::read('lastInsertedId').'.jpg';
			CakeSession::delete('lastInsertedId');

			// try moving file
			if (!move_uploaded_file($check['filename']['tmp_name'], $filename)) {
				return FALSE;

			// file successfully uploaded
			} 
		}

		return TRUE;
	}

	
}