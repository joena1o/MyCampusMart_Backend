<?php

include("conn.php");

$id = $_GET['id'];
$user = $_GET['user'];


$query = mysqli_query($conn, "SELECT * FROM new_ad INNER JOIN users on (new_ad.user = users.username) WHERE new_ad.id = '$id' and new_ad.user = '$user'");

if($query){

  	$array = array();

  while ($row = mysqli_fetch_assoc($query)) {

  	$array[] = $row;

  	
  }

}

  echo json_encode($array);




?>