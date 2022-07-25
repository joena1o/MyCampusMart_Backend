<?php

include("conn.php");

$id =  mysqli_real_escape_string($conn,$_POST['user']);

if(($id!=null or $id!="null") and isset($_POST['count'])){
$query = mysqli_query($conn, "SELECT * FROM message_alert  WHERE  receiver='$id'  ORDER BY period DESC");
}else if(($id!=null or $id!="null") and !isset($_POST['count'])){
$query = mysqli_query($conn, "SELECT * FROM message_alert  WHERE (user = '$id' or receiver='$id')  ORDER BY period DESC");
}
else{
	$query = mysqli_query($conn, "SELECT * FROM message_alert  ORDER BY id DESC");
}
if($query){

  	$array = array();

  while ($row = mysqli_fetch_assoc($query)) {

  	$array[] = $row;

  	
  }

}

  echo json_encode($array);




?>