<?php

include("conn.php");


if(isset($_GET['user'])){

$user = $_GET['user'];

$select = mysqli_query($conn, "SELECT * FROM new_ad INNER JOIN viewed on viewed.item_id = new_ad.id WHERE viewed.users = '$user' ORDER by viewed.id DESC  LIMIT 0,10 ");

$array = array();

while($row = mysqli_fetch_assoc($select)){

  $array[] = $row;

}

echo json_encode($array);

}else{

   $id = $_GET['id'];

$select = mysqli_query($conn, "SELECT * FROM new_ad WHERE id='$id'");

$array = array();

while($row = mysqli_fetch_assoc($select)){

  $array[] = $row;

}

echo json_encode($array);

}

?>