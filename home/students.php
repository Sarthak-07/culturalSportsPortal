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
  
<div class="container">
<div class="form-row">
<form name="dep" method="get">
<div class="col-xs-6 col-sm-4 col-lg-2">
    <div class="name">Department</div>
        
            <select name="department" id="department">
                    <option value="All">All</option>
                    <option value="CE">Comps</option>
                    <option value="EXTC">Extc</option>
                    <option value="IT">IT</option>
            </select>
        </div>

        <div class="col-xs-6 col-sm-4 col-lg-2">
        <div class="name">Year</div>
        
            <select name="year" id="year">
            <option value="All">All</option>
                    <option value="SE">SE</option>
                    <option value="TE">TE</option>
                    <option value="BE">BE</option>
            </select>
        </div>
        <div class="col-xs-6 col-sm-4 col-lg-2">
        <div class="name">Batch</div>
        
            <select name="batch" id="batch">
            <option value="All">All</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="C4">C4</option>
                    <option value="B1">B1</option>
            </select>
      

        </div>
        <div class="col-xs-6 col-sm-4 col-lg-2">
        <div class="name">Search</div>  
         
        <input type="submit" name="go"
                class="button" value="go" />
        
        </div>
</form>
</div>
<div class="form-row">


</div>
<div>
<?php
$mysqli= new mysqli('localhost','root','','login_signup');
if(isset($_GET['go']))
{   $sql="DELETE FROM combine";
    $mysqli->query($sql);
    $dep=$_GET['department'];
    $year=$_GET['year'];
    $batch=$_GET['batch'];
    if($dep=="All"){
      $dep_ar=array("EXTC","CE","IT");
    }
    else{
      $dep_ar=array($dep);
    }
    if($year=="All"){
      $year_ar=array("SE","TE","BE");
    }
    else{
      $year_ar=array($year);
    }
    if($batch=="All"){
      $batch_ar=array("A1","A2","C4","B1");
    }
    else{
      $batch_ar=array($batch);
    }
    echo "<input class='form-control' type='text' placeholder='Search' aria-label='Search'>";
    $fetch_db=array();
    for($x=0;$x<count($dep_ar);$x++){
      for($y=0;$y<count($year_ar);$y++){
        for($z=0;$z<count($batch_ar);$z++){
          $fetch_db[]=$dep_ar[$x]."_".$year_ar[$y]."_".$batch_ar[$z];
          
                  
          /*
          $sql="SELECT * FROM `$fetch_db`";
          $res=$mysqli->query($sql);
          $res->data_seek(0);
          while ($row = $res->fetch_assoc() or die($mysqli->error)) {
              echo "<h3>".$row['name']."</h3>"."<h5>".$row['rollno']."<h5><br>";              
            }*/                
    } 
}
}
for($s=0;$s<count($fetch_db);$s++){
  $sql="INSERT INTO `combine` (name,rollno)
        SELECT name,rollno FROM `$fetch_db[$s]`;";
        $mysqli->query($sql);
}
$sql="SELECT * FROM combine";
$res=$mysqli->query($sql);
while ($row = $res->fetch_assoc() or die($mysqli->error)) {
  echo "<div class='row'>
        <div class='col-xs-6 col-sm-4 col-lg-2'>
        <h3>"
        .$row['name']."</h3>".
        "<h5>".$row['rollno'].
        "<h5><br>
        </div>
        <div class='col-xs-6 col-sm-4 col-lg-2'><br>
        <div class='form-group'>
                <a href='student_details.php?pid=".$row['name']."'>
                <button type='submit' class='btn btn-primary btn-block btn-sm' name='submit' value='View'>
                View</button>
                </a>
            </div>
        </div>
        </div>
        ";              
}

}
?>
</div>





</div>

</body>
</html>
