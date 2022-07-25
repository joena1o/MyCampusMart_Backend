<?php


include "conn.php";

$user = mysqli_real_escape_string($conn, $_GET['user']);

$sql = "SELECT * FROM new_ad WHERE user = '$user' ";

$query = mysqli_query($conn, $sql);

$array = array();

if($query){
    while($row = mysqli_fetch_assoc($query)){
        $array[] = $row;
    }
    
    echo json_encode($array);
    
}else{
    echo mysqli_error($conn);
}



?>