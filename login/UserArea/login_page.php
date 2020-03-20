<?php
 include("loginserve.php");
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

<nav class="navbar navbar-inverse">
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
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
            <form action="loginserve.php" method="POST">
            <ul>
                <li><h4 class="container-txt">Login</h4></li>
                <li><input type="text" placeholder="Username" id="username1" name="username"></li>
                <li><input type="password" placeholder="Password" id="password1" name="password"></li>
                <li><input type="submit" value="Login" name="submit"></li>
            </ul>  
            </form>
        </div>


        
    <div class="login-container">
        <form action="./loginserve.php" method="POST">
            <ul>
                <li><h4 class="container-txt">Create new Account</h4></li>
                <?php echo "<p style='color:red;'>"; 
                if(isset($_SESSION ["ErrUser"])){
                  echo $_SESSION ["ErrUser"];
                }else{
                  echo null;
                }
                 echo "</p>"; ?>
                <li><input type="text" placeholder="Full Name" id="username2" name="NewFullname"></li>
                <li><input type="text" placeholder="Username" id="username3" name="NewUsername"></li>
                <li><input type="password" placeholder="Password" id="password2" name="NewPassword"></li>
                <li><input type="submit" value="Create" name="submit"></li>
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
