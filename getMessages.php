<?php

include("conn.php");




	$user =  mysqli_real_escape_string($conn,$_POST['user']);
	 $item_id =  mysqli_real_escape_string($conn,$_POST['id']);
	 $owner =  mysqli_real_escape_string($conn,$_POST['receiver']);



   $query = mysqli_query($conn,"SELECT * FROM messages INNER JOIN new_ad on messages.item_id = new_ad.id WHERE messages.item_id = '$item_id' and (messages.user = '$user' or messages.user='$owner') and (messages.receiver='$owner' or messages.receiver='$user') ");

if($query){

	$array = array();

   while ($row = mysqli_fetch_assoc($query)) {
   	# code...
   	$array[] = $row; 
   }

   echo json_encode($array);

}else{
    echo mysqli_error($conn);
}

   







?>