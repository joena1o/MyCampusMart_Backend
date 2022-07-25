		<?php

include("conn.php");

$user = mysqli_real_escape_string($conn,$_POST['user']);
$receiver = mysqli_real_escape_string($conn,$_POST['receiver']);
if(isset($_POST['message'])){
	$message = mysqli_real_escape_string($conn,$_POST['message']);

}else{
	$message = $_FILES['file']['name'];
}

$item =  mysqli_real_escape_string($conn,$_POST['item']);
$item_id =  mysqli_real_escape_string($conn,$_POST['item_id']);
$type =  mysqli_real_escape_string($conn,$_POST['Type']);


$check = mysqli_query($conn, "SELECT * FROM message_alert WHERE item_id='$item_id' and (user = '$user' or receiver= '$user') and (receiver='$receiver' or user='$receiver')   ");

if(mysqli_num_rows($check) > 0){

		$update = mysqli_query($conn, "UPDATE message_alert SET last_mssage = '$message', user='$user', receiver='$receiver', seen='no' WHERE (user = '$user' or receiver= '$user') and (receiver='$receiver' or user='$receiver') and item_id='$item_id' ");

       if($update)
       	echo "update";


}else{

     $insert = mysqli_query($conn, "INSERT INTO message_alert(user,receiver,item_id,item_title,last_mssage,seen) VALUES('$user','$receiver','$item_id','$item','$message','no')");

      if($insert){
       	echo "insert";
}else{
	echo "failed";
}

}
if(isset($_FILES['file'])){
	$image =$_FILES['file'];

           $img_tmp = $image['tmp_name'];
      $img_name = $image['name'];

          $path = "dms/".$img_name;

          move_uploaded_file($img_tmp, $path);

          $query = mysqli_query($conn,"INSERT INTO messages(user, message, receiver, item_name, item_id,type) VALUES('$user','$img_name','$receiver','$item','$item_id','$type')");


}else{

		 $query = mysqli_query($conn,"INSERT INTO messages(user, message, receiver, item_name, item_id,type) VALUES('$user','$message','$receiver','$item','$item_id','$type')");		

}



$notice = mysqli_query($conn, "INSERT INTO message_notice(user,receiver,message,item_id,notified,saw,notice_type) VALUES('$user','$receiver','$message',
'$item_id','no','no','$type')");


if($query){
	echo "success";
}else{
	echo mysqli_error($conn);
}




?>