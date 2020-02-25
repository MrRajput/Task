<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<!--  -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<title>Update Record</title>
</head>
<body>
	<?php 	
		session_start();
		if(!isset($_SESSION["login"])){
			header("location: login.php");
		}
		include 'factory.php';
		$name = "";
		$email = "";
		$zipcode = "";
		$city = "";
		$state = "";
		$address = "";
		$rollno = "";
		if ($_SERVER[REQUEST_METHOD] == POST) {
			if($_POST["name"]){
				$name = $_POST["name"];

			}
			if($_POST["email"]){
				$email = $_POST["email"];
			}
			if($_POST["zipcode"]){
				$zipcode = $_POST["zipcode"];
			}
			if($_POST["city"]){
				$city = $_POST["city"];
			}
			if($_POST["state"]){
				$state = $_POST["state"];
			}
			if($_POST["address"]){
				$address = $_POST["address"];
			}
			if($_POST["rollno"]){
				$rollno = $_POST["rollno"];
			}
			
			$sql = "update student set name = '".$name."' , roll_no = '".$rollno."', email = '".$email."', address = '".$address."', city = '".$city."', state = '".$state."', zip = '".$zipcode."' where id='".$_GET["id"]."'" ;
				
		if (mysqli_query($conn, $sql)) {
			
			header("Location: index.php?update"); 

		}else{
			echo '<script type="text/javascript">';
			echo 'confirm("Email already Exist")';

			echo '</script>';

		}
		}
			$select = "select * from student where id='".$_GET["id"]."'";
			$result = mysqli_query($conn, $select);
    		if($row = mysqli_fetch_assoc($result)) {
				
	 ?>
	<div class="container">
  <h2>Update Record</h2>
  <form class="form-horizontal" id = "second_form" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $row["name"]; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rollno">Roll No:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="rollno" placeholder="Enter Roll No" name="rollno"value="<?php echo $row["roll_no"]; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $row["email"]; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="<?php echo $row["address"]; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="city">City:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="<?php echo $row["city"]; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="state">State:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="state" placeholder="Enter State" name="state" value="<?php echo $row["state"]; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="zipcode">Zipcode:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="zipcode" placeholder="Enter zipcode" name="zipcode" value="<?php echo $row["zip"]; ?>">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" value="submit">
      </div>
    </div>
  </form>
</div>
<?php
	}
?>
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