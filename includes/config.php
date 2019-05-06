<?php 
	function getConnection(){
		$pdoConn = new PDO("mysql:host=localhost;dbname=sis","root","");
		$pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdoConn;
	}

	function selectWizards($wizQuery, $params = []){
		$pdo = getConnection();
		$stmt = $pdo->prepare($wizQuery);

		if(isset($params)) {
			
			foreach ($params as $param) {
				$parameter = (object) $param;
				$stmt->bindParam($parameter->name, $parameter->value, PDO::PARAM_STR);	
			} 	

			$stmt->execute();
		}
		return $stmt->fetchAll();
	}

	function updateWizard($wizQuery,$params = []){
		$pdo = getConnection();
		$stmt = $pdo->prepare($wizQuery);

			if(isset($params)){

				 foreach ($params as $param) {
				 	$paramater = (object) $param;
				 	$stmt->bindParam($paramater->aray, $paramater->value, PDO::PARAM_STR);
				 }
				 $stmt->execute();
			}
	}
	function expelWizard($wizQuery){
		$pdo = getConnection();
		$stmt = $pdo->prepare($wizQuery);
		return $stmt->execute();
	}
		
?>