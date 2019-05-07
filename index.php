<?php 
	include_once './includes/config.php';

	if(isset($_POST['submitbutton'])){
		$user = $_POST['userName'];
		$pass = $_POST['passWord'];
		$wizQuery = "SELECT * FROM wizardrecords WHERE username = :username && password = :password ";
		
		$data = selectWizards($wizQuery, [
			['name' => ':username', 'value' => $user],
			['name' => ':password', 'value' => $pass],
		]);

		foreach ($data as $wizInfo): 
		if($data > 0){
			if($wizInfo['role'] == 'user'){
			session_start();
			$_SESSION['wizId'] = $wizInfo['wizard_id'];
			header("Location: index2.php?");
			}
			elseif ($wizInfo['role'] == 'admin') {
			session_start();
			$_SESSION['wizId'] = $wizInfo['wizard_id'];
			header("Location: viewwizards.php?");
			}
		}
		else{
			header("Location: index.php?WizardUnidentified");
		}
		endforeach;
	}	


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="includes/otherstyles.css">
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
    <li class="breadcrumb-item"><a href="index.php">Hogwarts University of Witchcrafting and Wizardry</a></li>
	<form class="form-inline my-4 my-lg-0">
      <button class="btn btn-outline-success mr-2" type="submit">Search</button>
    </form>

<!--   	<li class="breadcrumb-item"><a href="newwizard.php">Add New Wizard</a></li>
    <li class="breadcrumb-item"><a href="viewwizards.php">View List of Wizards</a></li> -->
  </ol>
</nav>
	<div class="row">
  		<div class="col-sm-3">
    		<div class="card">
      			<div class="card-body">
        			<h5 class="card-title">Hupplepuff</h5>
        			<p class="card-text">Hufflepuffs value hard work, patience, loyalty, and fair play. The house has produced its share of great wizards – not least Newt Scamander, author of Fantastic Beasts.</p>
        			<a href="newwizard.php" class="btn btn-primary">Join Hupplepuff House!</a>
      			</div><hr>
    		</div>
  		</div>
  		<div class="col-sm-3">
    		<div class="card">
      			<div class="card-body">
        			<h5 class="card-title">Gryffindor</h5>
        			<p class="card-text">With a lion as its crest and Professor McGonagall at its head, Gryffindor is the house which most values the virtues of courage, bravery and determination.</p>
        			<a href="newwizard.php" class="btn btn-primary">Join Gryffindor House!</a>
      			</div><hr>
    		</div>
  		</div>
   </div>

	<div class="row">
  		<div class="col-sm-3">
    		<div class="card">
      			<div class="card-body">
        			<h5 class="card-title">Ravenclaw</h5>
        			<p class="card-text">Ravenclaws prize wit, learning, and wisdom. It's an ethos etched into founder Rowena Ravenclaw's diadem: 'wit beyond measure is man's greatest treasure'.</p>
        			<a href="newwizard.php" class="btn btn-primary">Join Ravenclaw House!</a>
      			</div><hr>
    		</div>
  		</div>
  		<div class="col-sm-3">
    		<div class="card">
      			<div class="card-body">
        			<h5 class="card-title">Slytherin</h5>
        			<p class="card-text">Slytherin produces more than its share of Dark wizards, but also turns out leaders who are proud, ambitious and cunning. Merlin is one particularly famous Slytherin.</p>
        			<a href="newwizard.php" class="btn btn-primary">Join Slytherin House!</a>
      			</div><hr>
    		</div>
  		</div>
   </div>
   <div class="loginform">
   		<div class="container">
  			<form method="POST" action="#">
    			<div class="imgcontainer">
      				<img src="download3.png" alt="Avatar" class="avatar">
    			</div>
  					<div class="form-row">
    					<div class="form-group col-md-12">
    						<label for="userName">Username</label>
      						<input type="text" class="form-control" name="userName" placeholder="Username" required>
      						<label for="passWord">Password</label>
      						<input type="password" class="form-control" name="passWord" placeholder="Password" required><br>
							<span class="psw"><a href="newwizard.php">Create an Account</a></span>
      						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    						<input type="submit" name="submitbutton" value="Wizard Login" class="btn btn-primary ">
      					</div>
      				</div>
 			</form>
      	</div>
    </div>
</body>
</html>