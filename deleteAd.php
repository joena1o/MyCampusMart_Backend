<?php

include("conn.php");

if(isset($_POST['id'])){

$id =  mysqli_real_escape_string($conn,$_POST['id']);

$sql =  mysqli_query($conn, "DELETE FROM new_ad WHERE id = '$id' ");

if($sql){
    
    $sql2 =  mysqli_query($conn, "DELETE FROM wishlist WHERE item_id = '$id' ");
    
    if($sql2){
        echo "Done";
    }else{
        echo "failed";
    }
    
}else{
    mysqli_error($conn);
}



}



?>