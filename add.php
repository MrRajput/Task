<!DOCTYPE html>
<html>
<head>
	<title>Add Record</title>
</head>
<body>

	<?php 
		require 'header.php';	
		require 'factory.php';
		require 'util.php';
		session_start();
		if(!isset($_SESSION["login"])){
			header("location: login.php");
		}

	?>
	<?php 
		
		$name = "";
		$email = "";
		$zipcode = "";
		$city = "";
		$state = "";
		$address = "";
		$rollno = "";
		$email_status = "";
		if ($_SERVER[REQUEST_METHOD] == POST) {
			if($_POST["name"]){
				$name = test_input($_POST["name"]);
			}
			if($_POST["email"]){
				$email = test_input($_POST["email"]);
				$email_status = check_email($_POST["email"]);
			}
			if($_POST["zipcode"]){
				$zipcode = test_input($_POST["zipcode"]);
			}
			if($_POST["city"]){
				$city = ($_POST["city"]);
			}
			if($_POST["state"]){
				$state = test_input($_POST["state"]);
			}
			if($_POST["address"]){
				$address = test_input($_POST["address"]);
			}
			if($_POST["rollno"]){
				$rollno = test_input($_POST["rollno"]);
			}
			
			// echo $name."  1   ".$email."  2  ".$zipcode." 3 ".$city." 4 ".$address." 5 ".$rollno." 6 ".$state;

			$sql = "INSERT INTO student (name, roll_no, email, address, city, state, zip)
 VALUES ('".$name."','".$rollno."','".$email."','".$address."','".$city."','".$state."','".$zipcode."')";
 		if($email_status == "email already exist"){
 			echo "<script>confirm('Email Already Exist');</script>";
 		}else if (mysqli_query($conn, $sql)) {
			header("Location: index.php?added"); 
		}else{
			
		}
		}
		
	 ?>
	<div class="container">
  <h2>Add Record</h2>
  <form class="form-horizontal" id = "second_form" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rollno">Roll No:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="rollno" placeholder="Enter Roll No" name="rollno">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="city">City:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="state">State:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="state" placeholder="Enter State" name="state">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="zipcode">Zipcode:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="zipcode" placeholder="Enter zipcode" name="zipcode">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" value="submit">
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('form[id="second_form"]').validate({
		  rules: {
		    name: 'required',
		    rollno: 'required',
		    address: 'required',
		    city: 'required',
		    state: 'required',
		    zipcode: 'required',
		    email: {
		      required: true,
		      email: true,
		    },
		    
		  },
		  messages: {
		    name: 'This field is required',
		    rollno: 'This field is required',
		    address: 'This field is required',
		    city: 'This field is required',
		    state: 'This field is required',
		    zipcodee: 'This field is required',
		    // lname: 'This field is required',
		    user_email: 'Enter a valid email',
		    
		  },
		  submitHandler: function(form) {
		    form.submit();
		  }
		});
		});
</script>>
</body>
</html>