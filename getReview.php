<?php

include("conn.php");

$user = $_GET['user_id'];

if(isset($_GET['page'])){
    
  
    
    $select = mysqli_query($conn, "SELECT * FROM review WHERE user_id = '$user' LIMIT 0,6");
}else{
    $select = mysqli_query($conn, "SELECT * FROM review WHERE user_id = '$user' ORDER BY id DESC");
}




if($select){
   
   $array = array();

   while($row = mysqli_fetch_assoc($select)){
      
      $array[] = $row;

   }

  echo json_encode($array);

} 





?>