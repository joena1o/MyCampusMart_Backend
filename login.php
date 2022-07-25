<?php

include("conn.php");

$email =  mysqli_real_escape_string($conn,$_POST['entry']);
$password =  mysqli_real_escape_string($conn,$_POST['password']);



 $pas = crypt($password, '$12$hrd$reer');


	$check = mysqli_query($conn, "SELECT * FROM users WHERE (email='$email' or phone='$email')  and password ='$pas'");
  




	

  $array = array();

  while($row = mysqli_fetch_assoc($check)){

  	$array[] = $row;

  }

  echo json_encode($array);

  



?>