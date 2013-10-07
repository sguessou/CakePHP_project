<?php

class Product extends AppModel {

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

	
}