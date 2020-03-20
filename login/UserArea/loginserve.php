<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db="login";

// GET EXISTING USER FROM DDB
$con= mysqli_connect($host,$username,$password,$db);
mysqli_select_db($con, $db);

if(!isset($current_user)){
    $current_user = null;
}

//IF USERNAME IS FILLED
if(isset($_POST["username"])){
    $user=$_POST['username'];
    $password=$_POST['password'];
    $sql = "SELECT * FROM users where username='".$user."'AND password='".$password."' limit 1 ";
    $result=mysqli_query($con,$sql);
    
    //GET TOP RESULT
    if(mysqli_num_rows($result)==1){
        $current_user = $_POST["username"];
        $_SESSION["username"]=$current_user;
        // LOOGED IN AS ...//
        mysqli_query($con,"UPDATE users SET isOnline = '1' WHERE username = '$current_user'" );
        echo "<script>location.href='UserPage.php'</script>";
        exit();
    }else{
        // IF LOGIN INCORRECT
        echo "<script>alert('Wrong Account Information.')</script>";
        echo "<script>location.href='login_page.php'</script>";
        }
}




//CREATE NEW ENTRY TO DATABASE
if(isset($_POST["NewUsername"])){
    //GET POST INFO
    $newUser = strtolower($_POST["NewUsername"]);
    $NewPassword = $_POST["NewPassword"];
    $NewFullName = $_POST["NewFullname"];
    //CHECK QUERY
    $checkUser = "SELECT  name, username FROM users where username='$newUser'";
    $result=mysqli_query($con,$checkUser);
    $row = mysqli_fetch_array($result);
    //IF USER FOUND IN QUERY
    if ($row['username']==$newUser) {
        // CHECK IF ErrUser == TRUE
        $_SESSION ["ErrUser"]  = "<b>$newUser</b> already exists, please change <b>username</b>"; 
        echo "<script>location.href='login_page.php'</script>";
        exit();
     }else{
         //IF NEW USER INFO NOT IN DATABASE
         //CREATING NEW USER
        $_SESSION['username'] = null;
        $_SESSION ["ErrUser"]=null;
        $CreateNewUser = "INSERT INTO users (Name,Username,Password) VALUES ('$NewFullName','$newUser','$NewPassword')";
        $conn = new mysqli($host, $username, $password, $db);
        if($conn->query($CreateNewUser)=== TRUE){
            //FIND NEW USER INFO FROM DB
            $_REQUEST["username"] = $newUser;
            $sql = "SELECT * FROM users where username='".$newUser."'AND password='".$NewPassword."' limit 1 ";
            
            $result=mysqli_query($con,$sql);
            
            //GET NEW USER INFO FROM DB
            if(mysqli_num_rows($result)==1){
                $current_user = $_REQUEST["username"];
                // LOOGED IN AS ...//   
                mysqli_query($con,"UPDATE users SET isOnline = '1' WHERE username = '$current_user'" );
                $_SESSION['username'] = $current_user;
                echo "<script>location.href='UserPage.php'</script>";
                exit();
            }
        }
    }
}

/* SQL INJECTING
1) would it work for select?
2) set it up for "create new user"?
*/

?>

