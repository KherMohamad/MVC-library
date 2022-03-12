<?php
class View {
	private $message;
public function setMessage($message) {
	$this->message = $message;
}
public function getMessage() {
	return $this->message;
}
public function render($script) {
	require($script);
}
}