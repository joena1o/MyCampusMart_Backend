<?php

include("conn.php");

$user =  mysqli_real_escape_string($conn,$_POST['user']);
$item_id =  mysqli_real_escape_string($conn,$_POST['item_id']);

if(isset($user) && (isset($item_id)!=null || $item_id!="") ){


$check = mysqli_query($conn, "SELECT * FROM viewed WHERE users = '$user' and item_id='$item_id' ");

if(mysqli_num_rows($check) > 0){
    
    $array = array();

	$num  = mysqli_query($conn, "SELECT * FROM viewed WHERE item_id = '$item_id' ");

		

   while ($row = mysqli_fetch_assoc($num)) {
   	
   	$array[] = $row; 
   }

   echo json_encode($array);

}else{
		$insert = mysqli_query($conn,"INSERT INTO viewed(users,item_id) VALUES('$user','$item_id')");
		
		$array = array();

		if($insert){
			
			$num  = mysqli_query($conn, "SELECT * FROM viewed WHERE item_id = '$item_id' ");
			
			

		 while ($row = mysqli_fetch_assoc($num)) {
   
   	        $array[] = $row; 
        }

            echo json_encode($array);

		}


}
}






?>