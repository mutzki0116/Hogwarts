<?php 
	//this is to call the extension file which is config .php in the includes folder
	include_once './includes/config.php';

	//this query is to select all data from the database 
		if(isset($_POST['submitbutton'])){
	$user = $_POST['uname'];
	$pass = $_POST['psw'];
	
	$wizQuery = "SELECT username,password FROM wizardRecords WHERE username = '".$user."' && password='".$pass."'";
	$data = selectWizards($wizQuery);

	if($data > 0){
		header("Location: index2.php?welcome");
	}
}
?>