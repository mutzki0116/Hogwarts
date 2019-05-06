<?php 
	function getConnection(){
		$pdoConn = new PDO("mysql:host=localhost;dbname=sis","root","");
		$pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdoConn;
	}
	function selectWizards($wizQuery){
		$pdo = getConnection();
		$stmt = $pdo->query($wizQuery); 
		return $stmt->fetchAll();
	}
	function updateWizard($wizQuery){
		$pdo = getConnection();
		$stmt = $pdo->prepare($wizQuery);
		return $stmt->execute();
	}
	function expelWizard($wizQuery){
		$pdo = getConnection();
		$stmt = $pdo->prepare($wizQuery);
		return $stmt->execute();
	}
		
?>