<?php
include("loginserve.php");
include("UserSessions.php");
$startTime =  $_SESSION['UserUpTime'];
$endTime = date("h:i:s");
$logoutUser = $_SESSION['username'];

if(isset($logoutUser)){

    mysqli_query($con,"UPDATE users SET LastSess= '$Difference' WHERE username = '$logoutUser'" );
    mysqli_query($con,"UPDATE users SET isOnline = '0' WHERE username = '$logoutUser'" );
    session_destroy();
    echo "<script>location.href='../index.php'</script>"; 
    
}else{
    session_destroy();
    echo "<script>location.href='../index.php'</script>";
}

?>
