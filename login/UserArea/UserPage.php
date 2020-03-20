<?php 


include("loginserve.php");
include("UserSessions.php");

//CHECK IF USER WITH NO USERNAME CAN ACCESS
if(isset($_SESSION["username"])){
  $logoutUser = $_SESSION["username"];
  }else{
  //echo $_SESSION["username"];
  echo "<script>location.href='../index.php'</script>"; 
}

// gather data from database //
$UserData = "SELECT id,username,name,isOnline,LastSess from users where username ='$logoutUser'";
$AllUserData = "SELECT id,username,name,isOnline,LastSess from users";
$UserResults=mysqli_query($con,$UserData);
$AllUserResults=mysqli_query($con,$AllUserData);
$Name = mysqli_fetch_array($UserResults);




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
    .row.content {height: 550px}
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">User Page</a></li>
        <li><a href="../index.php">Main Page</a></li>
        <li><a href="../DeleteAcc/deleteAccPage.php">Delete Account</a></li>
        <li><a href="/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2><?php echo $Name['username'];  ?></h2>
      <ul class="nav nav-pills nav-stacked">
        <li>
        <div class="dropdown ">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Options
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <ul>
                    <a href="../index.php"> <li>Main Page</li></a>
                    <a href="../DeleteAcc/deleteAccPage.php"> <li style="background-color:red;color:white;">Delete Profile</li></a>
                    <a href ="logout.php"><li>Log Out</li></a>
                  </ul>
                </div>
        </div>
        </li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Welcome to the page <?php echo $Name['name']; ?></h4>
        <p>Some text..</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>User ID#</h4>
            <p><?php echo $Name['id']; ?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Last Session Activity</h4>
            <?php 
              echo  $Name['LastSess'];
            ?>
            
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Todays Sessions</h4>
            <p>10 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Bounce</h4>
            <p>30%</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p style="text-align:center"> <b>Current users </b>
            <?php

    // DISPLAY ONLINE STAT OF USERS//
function checkOnline($check){
  if($check == 0){
    echo "- not Online";
  }else{
    echo "- Online";
  }
}

// CHANGE ONLINE STAT //
while($row = mysqli_fetch_array($AllUserResults)){
echo "<p style='text-align:center;'>", $row['username'], checkOnline($row['isOnline']),"</p>";}
            ?></p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
