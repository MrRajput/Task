<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</head>
<body>
	
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-laft">
     
      <li>
        <a href="dashboard.php" style="font-size: 25px;">
          <?php session_start(); echo $_SESSION["name"];?>
            
        </a><
          /li>
    </ul>
    <?php 
    
    if(!$_SESSION["login"]){
        header("location: login.php" )
      
      ?>
   
  </div>
  	<?php 
  }else{
  		?>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Home</a></li>	
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      <li><a href="user_update.php?id=<?php echo $_SESSION['id']?> "><span class="glyphicon glyphicon-log-in"></span> Update</a></li>
    </ul>
		<?php }?>
</nav>

</body>
</html>