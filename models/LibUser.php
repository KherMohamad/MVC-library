<?php

class LibUser {
	private $db;

	
	function __construct($db) {
		$this->db = $db;
	}
	public function viewBook($bookId) {
		try {
			$stmt = $this->db->prepare("SELECT * FROM BOOKS WHERE 
			 book_id = :bookId LIMIT 1");
			$stmt->execute(array(':bookId'=>$bookId));
            $bookInfo = $stmt->fetch(PDO::FETCH_ASSOC);
			return $bookInfo;
		} catch (PDOException $e) {
				echo $e->getMessage;
		}
	}
	
	public function listBooks() {
		try {
			$stmt = $this->db->prepare("SELECT * FROM BOOKS");
			$stmt->execute();
			$booksInfo = array(array());
			$k = 0;
			while ($row = $stmt->fetch()) {
				$booksInfo[$k] = $row;
				$k++;
			}
			return $booksInfo;
		} catch (PDOException $e) {
			echo $e->getMessage;
		}
	}
	
	public function addBook($info) {
		try {
			$stmt = $this->db->prepare("INSERT INTO BOOKS (book_name, author, publication_date) 
			                            VALUES ('$info[0]', '$info[1]', '$info[2]')");
			$stmt->execute();
		} catch (PDOException $e) {
			echo $e->getMessage;
		}
	}
	
		
			 
}