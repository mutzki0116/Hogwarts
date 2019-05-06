<?php 

	include_once './includes/config.php';
	if(isset($_GET['wizardId'])){
		$wiz_id = $_GET['wizardId'];
		$wizQuery = "DELETE FROM wizardRecords WHERE wizard_id = '".$wiz_id."'";
		$data = expelWizard($wizQuery);
		header("Location: viewwizards.php?wizardWasExpeled");

	}	

?>