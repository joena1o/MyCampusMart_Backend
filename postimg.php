<?php

$image =$_FILES['file'];
$img_tmp = $image['tmp_name'];
$img_name = $image['name'];


$path = "uploads/".$img_name;

move_uploaded_file($img_tmp, $path);



if(isset($image)){
	echo "success";
}else{
	echo "failed";
}



?>