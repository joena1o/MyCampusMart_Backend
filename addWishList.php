<?php

include("conn.php");


$user =  mysqli_real_escape_string($conn,$_POST['user']);
$item =  mysqli_real_escape_string($conn,$_POST['item']);
$item_id =  mysqli_real_escape_string($conn,$_POST['item_id']);


$check = mysqli_query($conn, "SELECT * FROM wishlist WHERE user='$user' and item_id='$item_id' ");

$check_no = mysqli_num_rows($check);

if(isset($user) && isset($item) && isset($item_id) && $check_no<1){


  
  $query = mysqli_query($conn, "INSERT INTO wishlist(user,item_name,item_id) VALUES('$user','$item','$item_id')");

  if($query){
  	echo "Added";
  }else{
  	echo "Failed";
  }

}else{

	 $query = mysqli_query($conn, "DELETE FROM wishlist WHERE user = '$user' and item_id='$item_id' ");

	 if($query){
	 	echo "Removed";
	 }else{
	 	echo "Failed o";
	 }

	

}




?>