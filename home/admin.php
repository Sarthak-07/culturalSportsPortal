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

  <script type="text/javascript"> 
        function doclick() {
    times++;
    location.hash = times;
}
window.onhashchange = function() {       
    if (location.hash.length > 0) {        
        times = parseInt(location.hash.replace('#',''),10);     
    } else {
        times = 0;
    }
    document.getElementById('message').innerHTML =      
        'Recorded <b>' + times + '</b> clicks';
}
    </script> 
</head>
<body onLoad="doclick();">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><i class="material-icons">person</i></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="students.php">students</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
      <li class="login" style="float:right;"><a href="logout.php">Logout</li></a>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Sports and Cultural Portal</h3>
  <p>Work in progress</p>
</div>

</body>
</html>
