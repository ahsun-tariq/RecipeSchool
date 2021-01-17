<?php
require_once('db_connection.php');
$name = $_GET['query'];
$query = "SELECT name FROM recipe WHERE name like '{$name}%'";
$response = @mysqli_query($connection,$query);
$jsonArr = array();
   if($response) {
        while ($row = mysqli_fetch_array($response)) {
        	$temp['value']=$row['name'];
        	$temp['label']=$row['name'];
        	$jsonArr[]=$temp;
        }
   }
   echo json_encode($jsonArr);
?>