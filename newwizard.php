<?php 

	include_once './includes/config.php';

	if(isset($_POST['submitbutton'])){
		$user = $_POST['userName'];
		$pass = $_POST['passWord'];
		$fname = $_POST['firstname1'];
		$lname = $_POST['lastname1'];
		$mname = $_POST['middlename1'];
		$bday1 = $_POST['bday1'];
		$addr1 = $_POST['address1'];
		$addr2 = $_POST['address2'];
		$haws = $_POST['hogwarts'];
		$wizQuery = "INSERT INTO wizardrecords(wizard_fname,wizard_lname,wizard_mname, birthdate, address1, address2, house, username, password) VALUES(:fname, :lname, :mname, :bday1, :addr1, :addr2, :haws,:user,:pass);";	
		$pdo = getConnection();
		$wizResult = $pdo->prepare($wizQuery);
    	$wizResult->bindParam(':fname', $firstname);
    	$wizResult->bindParam(':lname', $lname);
    	$wizResult->bindParam(':mname', $mname);
    	$wizResult->bindParam(':bday1', $bday1);	
		$wizResult->bindParam(':addr1', $addr1);
    	$wizResult->bindParam(':addr2', $addr2);
		$wizResult->bindParam(':haws', $haws);
    	$wizResult->bindParam(':user', $user);
		$wizResult->bindParam(':pass', $pass);
		$wizResult->execute([':fname'=>$fname,':lname'=>$lname,':mname'=>$mname,':bday1'=>$bday1,':addr1'=>$addr1,':addr2'=>$addr2,':haws'=>$haws,':user'=>$user,':pass'=>$pass]);
		header("Location: index.php?newUserAdded");

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
<style type="text/css">
	.avatar{
		position: relative;
		left: 40%;
		width: 23%;
	}	

</style>

</head>
<body>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Hogwarts University of Witchcrafting and Wizardry</a></li>
  	<li class="breadcrumb-item"><a href="#">Add New Wizard</a></li>
  </ol>
</nav>

<div class="container">
  <form method="POST" action="#">
    	<div class="imgcontainer">
      		<img src="download.png" alt="Avatar" class="avatar">
    	</div>
  		<div class="form-row">
    		<div class="form-group col-md-12">
    			<label for="userName">Username</label>
      				<input type="text" class="form-control" name="userName" placeholder="Username" required>
      			<label for="passWord">Password</label>
      				<input type="password" class="form-control" name="passWord" placeholder="Password" required>
     			<label for="firstname1">Firstname</label>
      				<input type="text" class="form-control" name="firstname1" placeholder="Firstname" required>
     			<label for="lastname1">Lastname</label>
      				<input type="text" class="form-control" name="lastname1" placeholder="Lastname" required>
      			<label for="middlename1">Middlename</label>
      				<input type="text" class="form-control" name="middlename1" placeholder="Middlename" required>
      			<label for="bday1">Birthdate</label>
      				<input type="date" class="form-control" name="bday1" placeholder="Birthdate">
      			<label for="address">Address</label>
				    <input type="text" class="form-control" name="address1" placeholder="1234 Main St., Brgy. Tibay">
 		   		<label for="address2">Address 2</label>
    				<input type="text" class="form-control" name="address2" placeholder="District, City">
    			<label for="hogwarts">Choose your House</label>
      				<select name="hogwarts" class="form-control">  
        				<option>Hupplepuff</option>
        				<option>Gryffindor</option>
        				<option>Slytherin</option>
        				<option>Ravenclaw</option>
      				</select><br>
    			<input type="submit" name="submitbutton" value="Create New Wizard" class="btn btn-primary">
    		</div>
  		</div>   
  </form>
</div>
</body>
</html>