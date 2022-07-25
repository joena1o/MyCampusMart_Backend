<?php

include("conn.php");
     
     $user =  mysqli_real_escape_string($conn,$_POST['user']);
      $title =  mysqli_real_escape_string($conn,$_POST['title']);
      $category =  mysqli_real_escape_string($conn,$_POST['category']);
      $cond =  mysqli_real_escape_string($conn,$_POST['condition']);
      $price =  mysqli_real_escape_string($conn,$_POST['price']);
      $des =  mysqli_real_escape_string($conn,$_POST['desc']);
      $barter =  mysqli_real_escape_string($conn,$_POST['bart']);
      $phone =  mysqli_real_escape_string($conn,$_POST['phone']);
      $id =  mysqli_real_escape_string($conn,$_POST['id']);
      $status =  mysqli_real_escape_string($conn,$_POST['status']);


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


          

if(isset($_FILES['file']) || isset($_FILES['file1']) || isset($_FILES['file2'])){
    
    $insert = "UPDATE new_ad SET user = '$user' ,title = '$title' ,category = '$category',cond = '$cond' ,price = '$price', negotiate='$nego', barter='$barter', contact_price='$contact', des = '$des',phone ='$phone', image='$img_name', image2='$img_name1' , image3='$img_name2', status='$status'  WHERE id = '$id' ";   
    
    
}else{
    
     $insert = "UPDATE new_ad SET user = '$user' ,title = '$title' ,category = '$category',cond = '$cond' ,price = '$price', negotiate='$nego', barter='$barter', contact_price='$contact', des = '$des',phone ='$phone', status='$status'  WHERE id = '$id' ";   
    
}          
          
        

    

		     if(mysqli_query($conn, $insert)){
		     	echo "uploaded";
		     }else{
		     	echo mysqli_error($conn);
		     }
		


     








?>