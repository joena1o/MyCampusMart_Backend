<?php


include("conn.php");


$email =  mysqli_real_escape_string($conn,$_POST['email']);


$sql = mysqli_query($conn,"SELECT * FROM reset_request WHERE email = '$email' ");


if($sql){
    
    if(mysqli_num_rows($sql) > 0){
        
        $query = mysqli_query($conn, "UPDATE reset_request SET email = '$email' ");
        
         if($query){
            
            mail("jonathanhyefur@gmail.com", "MyCampus mart password reset", "This link has been sent to you to reset your forgotten password" , "", "https://woaded-tendencies.000webhostapp.com/campusmartpaas/index.php?email='jonathanhyefur@gmail.com" );
            
            
             echo "Sent";
            
        }else{
            echo "failed";
        }
        
    }else{
        
        $query = mysqli_query($conn, "INSERT INTO reset_request(email,status) VALUES('$email','awaiting')");
        
        
        if($query){
            
             mail( $email, "MyCampus mart password reset", "This link has been sent to you to reset your forgotten password" , "", "https://woaded-tendencies.000webhostapp.com/campusmartpaas/index.php?email='$email'" );
             
             echo "Sent";
            
        }else{
            echo "failed";
        }
        
    }
    
    
}else{
    echo mysqli_error($conn);
}





?>