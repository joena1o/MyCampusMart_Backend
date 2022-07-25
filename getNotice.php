<?php


include("conn.php");

$user =  mysqli_real_escape_string($conn,$_POST['user']);

$query = mysqli_query($conn, "SELECT * FROM message_notice  WHERE receiver='$user' and (notice_type = 'review' or notice_type = 'reply') ORDER BY id DESC ");

$array = array(); 

while($row = mysqli_fetch_assoc($query)){

	$array[] =  $row;


}

echo json_encode($array);





?>