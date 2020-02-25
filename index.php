<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
  <?php
    session_start();
    
    include 'factory.php';
    include 'util.php';  
  ?>

	
</head>
<body>
  <?php
    require 'header.php';
  ?>
<div class="container">
  <?php
  if(!isset($_SESSION["login"])){
    header("location: login.php");
  }
?>
  <?php
    
    // $demo = ;
    // $orderby =$demo."id";
    $order=  $_GET['order_'] ?  ($_GET['order_'] == "asc" ? 'desc':'asc') :"desc";
    $orderby = $_GET['orderby'] ? $_GET['orderby'] : 'id';
    
    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }
  ?>
  <h2>Student Info</h2>
  <p><a href="add.php" class="btn btn-primary">Add Record</a></p>  
  <div class="search-container">
    <form action="" method="GET"> 
      <input type="hidden" name="tag" value="true">
      <?php 
      if($_GET["search"] == ""){
        echo '<input type="text" placeholder="Search.." name="search">';
      }else{
        $name__ = $_GET["search"];
        
        echo "<input type='text' placeholder='Search..' name='search' value='".$name__."'>";  
      }
  ?>    
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  <table class="table table-bordered" id="mytable"> 
    <thead>
      <tr>
        <th>S.NO</th>
        <th><a href='?orderby=name&order_=<?php echo $order ?>&pageno=<?php echo $pageno?>&search=<?php echo $_GET['search'];?>'>Name</a></th>
        <th><a href='?orderby=email&order_=<?php echo $order ?>&pageno=<?php echo $pageno?>&search=<?php echo $_GET['search'];?>'>Email</a></th>
        <th><a href='?orderby=roll_no&order_=<?php echo $order ?>&pageno=<?php echo $pageno?>&search=<?php echo $_GET['search'];?>'>Roll NO</a></th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="table1">
    	<?php
      if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $offset = ($pageno-1) * 5;
          
      if(isset($_GET["added"])){
          echo "Record Added";
        }
    		if(isset($_GET["update"])){
          echo "Record Updated";
        }
         
        if($_GET["id"]){
          ?>

          <?php
          $sql = "DELETE FROM student WHERE id='".$_GET["id"]."'";
          if (mysqli_query($conn, $sql)) {
              echo "Record deleted successfully";
          } else {
              echo "Error deleting record: " . $conn->error;
          }
        }
        $sql_ = "";
        $pages_count = get_page_count();
      $name_ = $_GET["search"];
        if($_GET["search"] != "" ){
            // $name_ = $_POST["search"];
           
           $sql_ = "select id, name, email, roll_no from student where email= '".$name_."' or name = '".$name_."' order by $orderby $order LIMIT  $offset, 5";
           
        }else{
          if($_GET["search"]){
            
          $sql_ = "select id, name, email, roll_no from student where email= '".$name_."' or name = '".$name_."' order by $orderby $order LIMIT  $offset, 5";
          }else{
            $sql_ = "select id, name, email, roll_no from student  order by $orderby $order LIMIT  $offset, 5 ";
          }
        
        
      }
        // echo $sql_;
        $count = 0;
        $result = mysqli_query($conn, $sql_);
        $record_count = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
          
          $count = 1+$offset;
          while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>"; 
        echo "<td>".$count."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["roll_no"]."</td>";
        echo "<td><a href='edit.php?id=".$row["id"]."'>Edit</a>&nbsp&nbsp<a onClick=\"javascript: return confirm('Are you sure you want to Delete?');\" href='index.php?id=".$row["id"]."'>Delete</a></td>";
        
     
        $count++;
      }
      ?>

      <ul class="pagination">
        <li><a href="?orderby=<?php echo $orderby ?>&order=<?php echo $order ?>&pageno=1&search=<?php echo $_GET['search'];?>">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a <?php if($pageno <= $pages_count-1){}else{ echo 'href';}?>="?orderby=<?php echo $orderby; ?>&order=<?php echo $order; ?>&<?php if($pageno <= 1){ echo '#'; } else { echo "pageno=".($pageno - 1); } ?>&search=<?php echo $_GET['search'];?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $pages_count){ echo 'disabled'; } ?>">
          <a <?php if($pageno >= $pages_count){}else{ echo 'href';}?>="?orderby=<?php echo $orderby ?>&order=<?php echo $order ?>&<?php if($pageno >= $pages_count){ echo '#'; } else { echo "pageno=".($pageno + 1); } ?>&search=<?php echo $_GET['search'];?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $pages_count; ?>&search=<?php echo $_GET['search'];?>">Last</a></li>
      </ul>
       <?php }else{
          echo '<p style="font-size: 30px">No Record Found</p>';
       }?>

    </tbody>
  </table>


</body>
</html>