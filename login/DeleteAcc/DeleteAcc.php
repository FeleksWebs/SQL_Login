<?php
include("../UserArea/loginserve.php");
//  CHECK IF PASSWORD INPUT FIELD 
if(isset($_POST['passwordDel'])){
    $UserLog = $_SESSION['username'];
    $userPass = $_POST['passwordDel'];

    //FIND USER
    $userSQL = "SELECT * FROM users where username='".$UserLog."'AND password='".$userPass."' limit 1";
    $DeleteSQL = "DELETE FROM users WHERE username='".$UserLog."'";
    $result=mysqli_query($con,$userSQL);

  
    // CHECK IF PASSWORDS MATCH
    if(mysqli_num_rows($result)==1){
        echo "password matches";
        $_SESSION["passCheck"] = null;
        $_SESSION["username"] = null;
        
        $result=mysqli_query($con,$userSQL);
        echo mysqli_num_rows($result);

        //RUN DELETE QUERY
        if($con->query($userSQL)){
        mysqli_query($con,$DeleteSQL );
        }



        echo "<script>location.href='../index.php'</script>";
    }else{
        $_SESSION["passCheck"] = "<p style='color:red'>Password does not match!</p>";
        echo "<script>location.href='deleteAccPage.php'</script>";
    }  
}

?>