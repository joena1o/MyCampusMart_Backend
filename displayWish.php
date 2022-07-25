<?php

include("conn.php");

//$id = $_POST['item_id'];
$user = $_GET['user'];


$query = mysqli_query($conn, "SELECT * FROM wishlist INNER JOIN new_ad on wishlist.item_id = new_ad.id WHERE wishlist.user='$user'");


$array = array();

While($row = mysqli_fetch_assoc($query)){

  $array[] = $row;

}

echo json_encode($array);



?>