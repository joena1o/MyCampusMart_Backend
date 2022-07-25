<?php

include("conn.php");

$item_id =  mysqli_real_escape_string($conn,$_POST['item_id']);
$user_id =  mysqli_real_escape_string($conn,$_POST['user_id']);
$user =  mysqli_real_escape_string($conn,$_POST['user']);
$name =  mysqli_real_escape_string($conn,$_POST['name']);
$message =  mysqli_real_escape_string($conn,$_POST['review']);
$type =  mysqli_real_escape_string($conn,$_POST['Type']);

$insert = mysqli_query($conn, "INSERT INTO review(user_id,item_id,user,name,review) VALUES('$user_id','$item_id','$user','$name','$message')");

if($type == "reply"){
    $insert2 = mysqli_query($conn, "INSERT INTO message_notice(user,receiver,message,item_id,notified,saw,notice_type) VALUES('$user_id','$user','$message',
'$item_id','no','no','$type')");
}else{
    $insert2 = mysqli_query($conn, "INSERT INTO message_notice(user,receiver,message,item_id,notified,saw,notice_type) VALUES('$user','$user_id','$message',
'$item_id','no','no','$type')");
}




if($insert){
	echo "success";
}else{
	echo mysqli_error($conn);
}



?>