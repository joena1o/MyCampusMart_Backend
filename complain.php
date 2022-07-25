<?php

include "conn.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$complain = mysqli_real_escape_string($conn, $_POST['complaint']);

$sql = "INSERT INTO reports(name,complaint) VALUES('$name','$complain')";

$query = mysqli_query($conn, $sql);

if($query){
    echo "Submitted";
}else{
    echo "Failed";
}




?>