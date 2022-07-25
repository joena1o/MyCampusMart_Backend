<?php

include 'conn.php';

$id = $_GET['id'];



$query =  mysqli_query($conn, "SELECT * FROM new_ad WHERE id = '$id' ORDER BY id DESC");

$array = array();

while ($row = mysqli_fetch_assoc($query)) {
	# code...
	$array[] = $row; 
}

echo json_encode($array);


?>