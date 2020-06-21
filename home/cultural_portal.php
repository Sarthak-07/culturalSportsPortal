<?php
session_start();
if(!isset ($_SESSION['username'])){
	header('location:signin.php');
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="navbar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg sticky-top navbar-mainbg">
        <img class="rait-logo" src="logo-1-RAIT.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon my-toggler"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cultural_portal.php"><i class="far fa-address-book"></i>Cultural Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sports_portal.php"><i class="far fa-clone"></i>Sports Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link last-nav-item" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link last-nav-item" href="logout.php"><i lass="far fa-calendar-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="signin-form">
        <form action="documents.php" method="post" enctype="multipart/form-data">
            <div class="form-header">
                <h2>Form</h2>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['username']?>" name="name" disabled>
            </div>
            <div class="form-group">
                <label>Event Name</label>
                <input type="text" class="form-control" placeholder="Event Name" name="event_name" required="required">
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" id="birthday" name="Date">
            </div>
            <div class="form-group">
                <label for="file">Upload File:</label> <br>
                <input class="form-control" type="file" id="img" name="file" accept="application/pdf" >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block btn-lg" name="submit" value="Upload"></input>
            </div>	
        </form>
        
    </div>
    <style>
        body{
		color: #999;
		background-image:url(../images/image1.jpg);
		font-family: 'Roboto', sans-serif;
		background-size: cover;
	}
	.form-control{
		min-height: 41px;
		box-shadow: none;
		border-color: #e1e1e1;
	}
	.form-control:focus{
		border-color: #00cb82;
	}	
    .form-control, .btn{        
        border-radius: 3px;
    }
	.form-header{
		margin: -30px -30px 20px;
		padding: 30px 30px 10px;
		text-align: center;
		background: #00cb82;
		border-bottom: 1px solid #eee;
		color: #fff;
	}
	.form-header h2{
		font-size: 34px;
		font-weight: bold;
        margin: 0 0 10px;
		font-family: 'Pacifico', sans-serif;
    }
	.form-header p{
		margin: 20px 0 15px;
		font-size: 17px;
		line-height: normal;
		font-family: 'Courgette', sans-serif;
	}
    .signin-form{
		width: 370px;
		margin: 0 auto;	
		padding: 30px 0;	
	}
	@media only screen and (max-width: 370px){
		.signin-form{
			width: 310px;
			margin: 0 auto;	
			padding: 30px 0;	
		}
	  }
    .signin-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f0f0f0;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signin-form .form-group{
		margin-bottom: 20px;
	}		
	.signin-form label{
		font-weight: normal;
		font-size: 13px;
	}
    .signin-form .btn{        
        font-size: 16px;
        font-weight: bold;
		background: #00cb82;
		border: none;
		min-width: 200px;
    }
	.signin-form .btn:hover, .signin-form .btn:focus{
		background: #00b073 !important;
        outline: none;
	}
    .signin-form a{
		color: #00cb82;		
	}
    .signin-form a:hover{
		text-decoration: underline;
	}
    </style>
    <script src="navbar.js"></script>
 
</body>