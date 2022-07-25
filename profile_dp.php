<?php


include "conn.php";

$user = mysqli_real_escape_string($conn, $_POST['user']);



$image =$_FILES['dp'];

           $img_tmp = $image['tmp_name'];
      $img_name = $image['name'];

          $path = "dps/".$img_name;

          move_uploaded_file($img_tmp, $path);


$sql = "UPDATE users SET profile_pic = '$img_name' WHERE username = '$user' ";

$query = mysqli_query($conn, $sql);

if($query){
    echo "Uploaded";
}else{
    echo "Failed";
}





?>