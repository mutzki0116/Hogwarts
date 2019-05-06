<?php 
	//this is to call the extension file which is config .php in the includes folder
	include_once './includes/config.php';

	//this query is to select all data from the database 
	$wizQuery = "SELECT * FROM wizardRecords";
	
	$data = selectWizards($wizQuery);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Hogwarts University of Witchcrafting and Wizardry</a></li>
    <li class="breadcrumb-item"><a href="newwizard.php">Add New Wizard</a></li>
    <li class="breadcrumb-item"><a href="#">View List of Wizards</a></li>
    
  </ol>
</nav>
<div class="container">
<table class="table table-striped">
	<tr>
		<th>Name</th>
		<th>Birthdate</th>
		<th>Address</th>
		<th>Sorted House</th>
		<th colspan="2">Action</th>
		
	</tr>
<!-- 	this is to fetch every data and put it into the variable $wizInfo
 -->	
 	<?php 
		foreach ($data as $wizInfo): 
	?>
	<tr>
<!-- 		this is to show the data from the db into a table -->
		<td><?php echo $wizInfo['wizard_fname']," ",$wizInfo['wizard_lname']; ?></td>
		<td><?php echo $wizInfo['birthdate']; ?></td>
		<td><?php echo $wizInfo['address1']," ",$wizInfo['address2']; ?></td>
		<td><?php echo $wizInfo['house']; ?></td>
		<td>
        	<div class="btn-group mt-2" role="group" aria-label="Second group">
        		<a href="editWizard.php?wizardId=<?php echo $wizInfo['wizard_id']; ?>">
        			<button type="button" class="btn btn-success" name="edit">Edit</button>
        		</a>
        		<a href="expelWizard.php?wizardId=<?php echo $wizInfo['wizard_id']; ?>">
                	<button type="button" class="btn btn-danger" name="expel">Expel</button>
            	</a>
            </div>
        </td>
	</tr>	
	<?php 
		endforeach;
	?>
</table>
</div>
</body>
</html>