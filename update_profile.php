<?php


include("conn.php");

 $name = mysqli_real_escape_string($conn,$_POST['fname']);
 $lastname = mysqli_real_escape_string($conn,$_POST['surname']);
 $phone = mysqli_real_escape_string($conn,$_POST['phone']);
 $state = mysqli_real_escape_string($conn,$_POST['state']);
 $camp = mysqli_real_escape_string($conn,$_POST['campus']);

$user = mysqli_real_escape_string($conn,$_POST['user']);


$sql = "UPDATE users SET phone='$phone', fname = '$name', lname='$lastname', campus='$camp', state='$state' WHERE username = '$user' ";

$query = mysqli_query($conn, $sql);

if($query){
    echo "Updated";
}else{
    echo "Failed";
}






?>