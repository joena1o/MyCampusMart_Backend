<?php

include("conn.php");

$id =  mysqli_real_escape_string($conn,$_POST['item_id']);
$user =  mysqli_real_escape_string($conn,$_POST['user']);


$query = mysqli_query($conn, "SELECT * FROM wishlist WHERE user='$user' and item_id='$id'");



if($query){


		$array = array();

		while($row = mysqli_fetch_assoc($query)){
           $array[] = $row;
		}

	echo json_encode($array);
}




?>