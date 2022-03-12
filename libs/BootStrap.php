<?php
class BootStrap {
	public function __construct () {
		$tokens = explode('/', rtrim(ltrim($_SERVER['REQUEST_URI'], '/'), '/'));
		$tokens = array_slice($tokens, 2);
		$controllerName = ucfirst($tokens[0]);
		$filePath = 'controllers/'.$controllerName.'.php';
		if (file_exists($filePath)) {
			require_once($filePath);
		    $controller = new $controllerName;
			if (isset($tokens[1])&& method_exists($controller, $functionName = $tokens[1]. 'Function')) {
				if (isset($tokens[2])) {
				$controller->{$functionName}($tokens[2]);
				 } else {
					$controller->{$functionName}();
					
				}
			} else {
				$controller->standardFunction();
			}
		} else {
		    require_once('controllers/Err.php');
			$controllerName = 'Err';
			$controller = new $controllerName;
			$controller->standardFunction();
			}
	}
}
		
		