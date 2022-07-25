<?php

include("conn.php");

$email =  mysqli_real_escape_string($conn,$_POST['email']);
$password =  mysqli_real_escape_string($conn,$_POST['password']);
$phon =  mysqli_real_escape_string($conn,$_POST['phone']);
$name =  mysqli_real_escape_string($conn,$_POST['fname']);
$lname =  mysqli_real_escape_string($conn,$_POST['lname']);
$campus =  mysqli_real_escape_string($conn,$_POST['campus']);
$username =  mysqli_real_escape_string($conn,$_POST['username']);
$state =  mysqli_real_escape_string($conn,$_POST['state']);




$check1 =  mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

if(mysqli_num_rows($check1) > 0){
	echo "username";
	return;
}else{
    
    $check2 =  mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");
    
    if(mysqli_num_rows($check2) > 0){
	echo "email";
	return;

        
    }else{
        
        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' and phone ='$phon'");

        if(mysqli_num_rows($check) > 0){
	   echo "User with the same details already exists";
    }else{
        
        $pas = crypt($password, '$12$hrd$reer');

	    $query = mysqli_query($conn, "INSERT INTO users(email,phone,username,fname,lname,password,campus,state) VALUES('$email','$phon','$username','$name','$lname','$pas','$campus','$state')");

		if($query)
			echo "User registered";
		else
		  echo mysqli_error($conn);

        }
        
    }
    
    
}








?>