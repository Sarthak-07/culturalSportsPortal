<?php
session_start();
if(!isset ($_SESSION['username'])){
	header('location:signin.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><i class="material-icons">person</i></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="admin.php">Home</a></li>
      <li class="active"><a href="#">students</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
      <li class="login" style="float:right;"><a href="signin.php">Logout</li></a>
    </ul>
  </div>
</nav>
<div class="row">
<div class="col-xs-6 col-sm-4 col-lg-2"></div>
<div class="col-xs-6 col-sm-4 col-lg-2">
    <?php
    $pid=$_GET['pid'];
    $con= mysqli_connect('localhost','root','','login_signup');
    
    $path="Docs/";
    echo "<h3>".$pid."</h3><br>";
    $sql="SELECT event,date,doc_name FROM documents WHERE name='$pid'";
    $res=mysqli_query($con,$sql);
    while ($row = $res->fetch_assoc()){
      echo "<br>Event:".$row['event'].
            "<br>Date:".$row['date']."<br>pdf:<a href='".$path.$row['doc_name']."'>".$row['doc_name']."</a>
            <br>";
    }
    
    ?>
</div>
</div>

</body>
</html>