<?php
include("DeleteAcc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../Style.css">
  <style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    .row.content {height: 450px}
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>


<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../index.php">Login System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="../index.php">Main Page</a></li>
        <li ><a href="../UserArea/UserPage.php">User Page</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8"> 
        <div class="login-container">
            <form action="DeleteAcc.php" method="POST">
            <ul>
                <li><?php
                if(isset($_SESSION["passCheck"])){
                  echo $_SESSION["passCheck"];
                }else{
                  $_SESSION["passCheck"] = null;
                }
                
                ?> </li>
                <li><h4 class="container-txt">Are you sure?</h4></li>
                <li><input type="password" placeholder="Password" id="password" name="passwordDel"></li>
                <li><input type="submit" style="background-color:red;color:white;border:none;border-radius:4px;padding:4px;margin-top:10px;" value="Delete Account" name="submit" ></li>
            </ul>  
            </form>
        </div>
    </div>

    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
