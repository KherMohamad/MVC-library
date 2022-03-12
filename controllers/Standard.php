<?php
require_once 'libs/Controller.php';
require_once 'models/User.php';
class Standard extends Controller {
	private $user;
	public function standardFunction($id = '') {
		$this->user = new User();
		$this->view->setMessage('Hello, '.$id .' from Standard function of standard file');
		$this->view->render('views/standard/index.phtml');
	}
}
	