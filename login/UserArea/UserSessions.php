<?php 
// IF SESSION TIME ALREADY STARTED
if(isset($_SESSION['UserUpTime'])){
  $UserUpTime =  $_SESSION['UserUpTime'];
  $date1 = date("h:i:s");
  $date2 = $UserUpTime;

  $datetimeObj1 = new DateTime($date1);
  $datetimeObj2 = new DateTime($date2);
  //$date2 = new DateTime('2020-03-17');

  $DateDiff = $datetimeObj1->diff($datetimeObj2);
  $Difference = $DateDiff->format('%h hours and %i minutes %s seconds');
  }else{
  $_SESSION['UserUpTime'] = null;
  $_SESSION['UserUpTime'] = date("h:i:s");

  
}
?>