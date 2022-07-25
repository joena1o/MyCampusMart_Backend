<?php

    include("conn.php");
     
     $user =  mysqli_real_escape_string($conn,$_POST['user']);
      $title =  mysqli_real_escape_string($conn,$_POST['title']);
      $category =  mysqli_real_escape_string($conn,$_POST['category']);
      $cond =  mysqli_real_escape_string($conn,$_POST['condition']);
      $price =  mysqli_real_escape_string($conn,$_POST['price']);
      $bart =  mysqli_real_escape_string($conn,$_POST['bart']);
      $des =  mysqli_real_escape_string($conn,$_POST['desc']);
      $phone =  mysqli_real_escape_string($conn,$_POST['phone']);
      $loc =  mysqli_real_escape_string($conn,$_POST['location']);
      $state =  mysqli_real_escape_string($conn,$_POST['state']);
      
      if($_POST['nego']=="true"){

          $nego = "true";
      }else{
          $nego = "false";
      }

       if($_POST['contact']=="true"){

          $contact = "true";
      }else{
          $contact = "false";
      }
     


if(isset($_FILES['file'])){

  $image =$_FILES['file'];

           $img_tmp = $image['tmp_name'];
      $img_name = $image['name'];

          $path = "uploads/".$img_name;

          move_uploaded_file($img_tmp, $path);
}else{
      
        $img_name = "none";

}

if(isset($_FILES['file1'])){

  $image1 =$_FILES['file1'];

           $img_tmp1 = $image1['tmp_name'];
      $img_name1 = $image1['name'];

          $path = "uploads/".$img_name1;

          move_uploaded_file($img_tmp1, $path);
}else{
      
        $img_name1 = "none";

}

if(isset($_FILES['file2'])){

  $image2 =$_FILES['file2'];

           $img_tmp2 = $image2['tmp_name'];
      $img_name2 = $image2['name'];

          $path = "uploads/".$img_name2;

          move_uploaded_file($img_tmp2, $path);
}else{
      
        $img_name2 = "none";

}
          

     if(isset($_POST['user']) && isset($_POST['title']) && isset($_POST['category']) && isset($_POST['price']) && isset($_POST['phone'])){
	     	$insert = "INSERT INTO new_ad(user,title,category,cond,price,negotiate,barter,contact_price,des,phone,image,image2,image3,location,state,status) VALUES('$user','$title','$category','$cond','$price','$nego','$bart','$contact','$des','$phone','$img_name','$img_name1','$img_name2','$loc','$state','Available')";

		     if(mysqli_query($conn, $insert)){
		         
		         echo "Uploaded";
		     
		      
		     
		     }else{
		     	echo "Failed to upload ad";
		     	echo mysqli_error($conn);
		     }
		 }else{
		 	echo "Failed to upload ad2";
		 }


     




?>