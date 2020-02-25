<?php 

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		function check_email($email){
			include 'factory.php';
			$sql_check = "select count(*) as abc from student where email='".$email."'";
			
			$check_result = mysqli_query($conn, $sql_check) or die(mysql_error());
			$row = mysqli_fetch_assoc($check_result);
			if($row["abc"] != 0){
				return "email already exist";
			}	
		}
		// function check_email_update($id, $name, $rollno, $email, $address, $city, $state, $zipcode){
		// 	include 'factory.php';

		// 	$sql = "update student set name = '".$name."' , roll_no = '".$rollno."', email = '".$email."', address = '".$address."', city = '".$city."', state = '".$state."', zip = '".$zipcode."' where id='".$id."'" ;
		// 	echo $sql;

		// 	$sql_data = "select email from student where id='".$id."'";
		// 	$sql_check = "select count(*) as abc from student where email='".$email."'";
		// 	$check_result_ = mysqli_query($conn, $sql_data) or die(mysql_error());
		// 	$prev = mysqli_fetch_assoc($check_result_);
		// 	echo "<br>".$prev["email"];
		// 	if($prev["email"] == $email){
		// 		if(mysqli_query($conn, $sql))
		// 		header("Location: index.php?update"); 
		// 	}else if(){
				
		// 	}

		// }
		function check_user_email($email){
			include 'factory.php';
			$sql_check = "select count(*) as abc from user where email='".$email."'";
			
			$check_result = mysqli_query($conn, $sql_check) or die(mysql_error());
			$row = mysqli_fetch_assoc($check_result);
			if($row["abc"] != 0){
				return "email already exist";
			}	
		}
		function get_page_count() {
			include 'factory.php';
			$sql_check = "select count(*) as abc from student";
			$row_count = mysqli_query($conn, $sql_check);
			$number = mysqli_fetch_array($row_count)[0];
			$pages = ceil($number/5);
			
			return $pages;
		}
		function user_login($email, $password){
			include 'factory.php';
			// echo "<br>dfsfs<br>" ;
			$check = check_user_email($email);
			// echo $check;
			$sql_check = "";
			$sql_check="select * from user where email ='".$email."' and password = '".$password."'";
			$check = check_user_email($email);
			if($check == "email already exist"){

				$result = mysqli_query($conn, $sql_check);
				if(mysqli_num_rows($result)>0){
					
					if($row = mysqli_fetch_assoc($result)){
						echo $row["name"];
						session_start();
						$_SESSION["name"] = $row["name"];
						$_SESSION["email"] = $row["email"];
						$_SESSION["id"] = $row["id"];
						$_SESSION["login"] = "true";
						header("location: dashboard.php");
					}
				}else{
					echo "check your password";
				}	
			}else{
				echo "User not Exist";

			}
		}




?>