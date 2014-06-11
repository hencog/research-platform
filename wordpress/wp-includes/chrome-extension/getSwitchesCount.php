<?php 

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$user_id = $_POST['user_id'];
$date = $_POST['date'];

mysql_select_db("wordpress", $con);
$today = new DateTime($date);
$tomorrow = new DateTime($date);
date_modify($tomorrow, '+1 day');
$today = $today->format('Y-m-d H:i:s');
$tomorrow = $tomorrow->format('Y-m-d H:i:s');

$query = sprintf("SELECT * from `wordpress`.`sessions` WHERE `user_id` = %s and `end` > '%s' and `end` < '%s'", $user_id,$today,$tomorrow);

$res = mysql_query($query);
$switchCount = 0;
while($r = mysql_fetch_assoc($res)) {
    $switchCount += $r['switches'];
}
print_r($switchCount);
mysql_close($con);
?>