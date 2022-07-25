<?php

include "conn.php";

$user = $_GET['user'];


$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user' ");

$array = array();

while ($row = mysqli_fetch_assoc($query)) {
	# code...

    $array[] = $row;

}

echo json_encode($array);




?>