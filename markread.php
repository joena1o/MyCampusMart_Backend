<?php


include 'conn.php';


$user =  mysqli_real_escape_string($conn,$_POST['user']);
$id =  mysqli_real_escape_string($conn,$_POST['id']);


$query = mysqli_query($conn, "UPDATE message_notice set saw = 'yes' WHERE item_id = '$id' and receiver = '$user' ");


$query2 = mysqli_query($conn, "UPDATE message_alert set seen = 'yes' WHERE item_id = '$id' and receiver = '$user' ");


if($query){
	echo "Reg";
}else{
	echo "failed";
}




?>