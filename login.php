 
<?php
  
  include 'util.php';
?> 
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
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<?php
  $email = "";
  $password = "";
  session_start();
  // echo var_dump($_SESSION["login"]);
  if(isset($_SESSION["login"])){

    header("location: dashboard.php");
  }
  if ($_SERVER[REQUEST_METHOD] == POST) {
      if(isset($_POST["email"])){
        $email = test_input($_POST["email"]);
        echo $email;
      }
      if(isset($_POST["password"])){
        $password = test_input($_POST["password"]);
        // echo $password;
      }
      // echo "string";
       user_login($email, $password); 
  }

?>
<div class="container">
  <h2 align="center">Login</h2>
  <form class="form-horizontal" id = "second_form" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
      </div>
    </div>
    
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-primary col-sm-12" value="submit">
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
  
  $(document).ready(function() {
    $('form[id="second_form"]').validate({
      rules: {
        email: 'required',
        password: 'required',
        email: {
          required: true,
          email: true,
        },
        
      },
      messages: {
        password: 'This field is required',
        user_email: 'Enter a valid email',
        
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
    });
</script>
</body>
</html>
