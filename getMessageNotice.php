<?php

include 'conn.php';

$user =  mysqli_real_escape_string($conn,$_POST['user']);

if(isset($_GET['notice'])){
    
    $msg = "message";

	$query = mysqli_query($conn, "SELECT * FROM message_notice INNER JOIN users on message_notice.user = users.username WHERE message_notice.receiver = '$user' and message_notice.notified='no' ORDER BY id DESC");


$array = array();

while($row = mysqli_fetch_assoc($query)){

 $array[] = $row;

}

echo json_encode($array);





}else{

$query = mysqli_query($conn, "SELECT * FROM message_notice WHERE receiver = '$user' and saw='no' and notice_type='message' ");


$array = array();

while($row = mysqli_fetch_assoc($query)){

 $array[] = $row;

}

echo json_encode($array);

}




?>