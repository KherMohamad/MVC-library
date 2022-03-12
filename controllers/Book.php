<?php
require_once 'libs/Controller.php';
class Book extends controller{
	public function viewFunction($id = '') {
		if ($id == '') {
			$this->view->setMessage("No book id given!");
		} else {
				require_once 'models/DBconfig.php';
				$bookInfo = $libUser->viewBook($id);
				$this->view->setMessage("Book Name: ". $bookInfo['book_name']. '<br>'.
										"Author: ". $bookInfo['author'].'<br>'.
										"Publication Date: ". $bookInfo['publication_date']
										);
		}
		$this->view->render('views/books/index.phtml');
	}

	public function listFunction($id = null) {
		require_once 'models/DBconfig.php';
		$booksInfo = $libUser->listBooks();
		$message = "";
		for ($k = 0; $k < count($booksInfo); $k++) {
			$message = $message. ($k + 1). '. '. "Book Name: ". $booksInfo[$k]['book_name']. '<br>'.
										"Author: ". $booksInfo[$k]['author'].'<br>'.
										"Publication Date: ". $booksInfo[$k]['publication_date'].
										'<br>'. '<br>';
		}
		$this->view->setMessage($message);
		$this->view->render('views/books/index.phtml');
	}
	
	public function addFunction($info = null) {
		require_once 'models/DBconfig.php';
		if ($info == null) {
			$this->view->setMessage("No book info provided!");
		} else {
			$info = explode(';', $info);
			if (count($info) > 3) {
				$this->view->setMessage("too many data fields given");
		    } else if (count($info) < 3) {
				$this->view->setMessage("too few data fields given");
			} else {
				for ($i = 0; $i < count($info); $i++) {
                $info[$i] = str_replace("%20", " ", $info[$i]);	
			}				
			$libUser->addBook($info);
			$this->view->setMessage("Book: '". $info[0]. "' added to the library.");
            }
		}
		$this->view->render('views/books/index.phtml');
	}
		


	
}
									