<?php

include("conn.php");



    
    $image[] = $_FILES['image']['name'];
    $tmp[] = $_FILES['image']['tmp_name'];
    $item_id = $_POST['item_id'];
    
    foreach($image as $key=> $value){
        foreach($tmp as $key=> $tmpfile){
            if(move_uploaded_file($tmpfile, "uploads/".$value)){
                $insert = mysqli_query($conn, "INSERT INTO ad_images(image1,item_id) VALUES('$value','$item_id')");
                
                if($insert){
                    echo json_encode(array("message"=>"sucess"));
                    
                }else{
                     echo json_encode(array("message"=>"Error".mysqli_error($conn)));
                }
            }
        }
    }
    






?>