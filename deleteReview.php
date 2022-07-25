<?php

include "conn.php";

$id = mysqli_real_escape_string($conn,$_POST['id']);

$sql = "DELETE FROM review WHERE ID = '$id' ";

$query = mysqli_query($conn, $sql);


if($query){
    echo "Removed";
}else{
    echo "Failed";
}




?>