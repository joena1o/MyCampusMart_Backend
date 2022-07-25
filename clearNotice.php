<?php


include 'conn.php';


$user =  mysqli_real_escape_string($conn,$_POST['user']);



$query = mysqli_query($conn, "UPDATE message_notice set notified = 'yes'  WHERE receiver = '$user' ");





if($query){
	echo "Reg";
}else{
	echo mysqli_error($conn);
}




?>