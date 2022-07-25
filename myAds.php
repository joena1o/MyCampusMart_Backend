<?php

include("conn.php");

$user = $_GET['user'];

$query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user='$user' ORDER BY id DESC");

if($query){

		$array = array();

  while ($row = mysqli_fetch_assoc($query)) {
  	# code...
  		$array[] = $row; 
  }

  echo json_encode($array);

}






?>