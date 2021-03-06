<?php 

	//this is to call the extension file which is config .php in the includes folder
	include_once './includes/config.php';

	if(isset($_GET['wizardId'])){
		$wiz_id = $_GET['wizardId'];
		$wizQuery = "SELECT * FROM wizardrecords WHERE wizard_id = '".$wiz_id."'";
		$data = selectWizards($wizQuery);
	}
	if(isset($_POST['submitbutton'])){
	$a = $_POST['firstname1'];
	$b = $_POST['lastname1'];
	$c = $_POST['middlename1'];
	$d = $_POST['bday1'];
	$e = $_POST['address1'];
	$f = $_POST['address2'];
	$g = $_POST['hogwarts'];
	
	$wizQuery = "UPDATE wizardrecords SET wizard_fname= :firstname,wizard_lname=:lastname,wizard_mname=:middlename,birthdate=:bday,address1=:addone,address2=:addtwo,house=:haws WHERE wizard_id = '".$wiz_id."'";
	
	$update = updateWizard($wizQuery, [
			['aray' => ':firstname', 'value' => $a],
			['aray' => ':lastname', 'value' => $b],
			['aray' => ':middlename', 'value' => $c],
			['aray' => ':bday', 'value' => $d],
			['aray' => ':addone', 'value' => $e],
			['aray' => ':addtwo', 'value' => $f],
			['aray' => ':haws', 'value' => $g],
		]);
			header('Location: viewwizards.php?wizardUpdatedSuccessfully');
	
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
<body>
 	
<div class="container">
	<?php 
		foreach ($data as $wizInfo): 
	?>
	<form action="#" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstname1">Firstname</label>
      <input type="text" class="form-control" name="firstname1" value="<?php echo $wizInfo['wizard_fname']; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="lastname1">Lastname</label>
      <input type="text" class="form-control" name="lastname1" value="<?php echo $wizInfo['wizard_lname']; ?>">
    </div>
  </div>
  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="middlename1">Middlename</label>
            <input type="text" class="form-control" name="middlename1" value="<?php echo $wizInfo['wizard_mname']; ?>">
        </div>
  </div>
  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="bday1">Birthdate</label>
            <input type="date" class="form-control" name="bday1" value="<?php echo $wizInfo['birthdate']; ?>" >
        </div>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address1" value="<?php echo $wizInfo['address1']; ?>">
  </div>
  <div class="form-group">
    <label for="address2">Address 2</label>
    <input type="text" class="form-control" name="address2" value="<?php echo $wizInfo['address2']; ?>">
  </div>
  <div class="form-group col-md-3">
      <label for="hogwarts">Choose your House</label>
      <select name="hogwarts" class="form-control">
        <option><?php echo $wizInfo['house']; ?></option>
        <option>Hupplepuff</option>
        <option>Gryffindor</option>
        <option>Slytherin</option>
        <option>Ravenclaw</option>
            </select>
            </div>
        <!-- <a href="updateWizard.php?wizardId=<?= $wizard->wizard_id; ?>"> --><input type="submit" class="btn btn-primary" name="submitbutton" value="Update Wizard Details">
    </div>
    </form>
  	<?php endforeach; ?>
   
</div>
</body>
</html>