<?php
require_once 'libs/Controller.php';

class Err extends Controller {
	
	public function standardFunction() {
		$this->view->setMessage("the controller doesn't exist");
		$this->view->render('Views/error/index.phtml');
	}
	
}