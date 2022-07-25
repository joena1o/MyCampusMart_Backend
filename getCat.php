<?php

  include "conn.php";

  $user = $_GET['user'];
  $cat = $_GET['cat'];

  if(isset($_GET['search'])){

	   $search = $_GET['search'];
	   
	   
	 if(isset($_GET['state'])){
	     
	       $state = $_GET['state'];
	     
	     if(isset($_GET['camp'])){
	         
	          $page = (int)$_GET['page'];
         
        $next =(int)($page)*10; 
	        
	          $camp = $_GET['camp'];
	         
	         $query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and title LIKE '%$search%' and category='$cat' and location='$camp' and state='$state' LIMIT ".$next.", 10");
	         
	     }else{
	          $page = (int)$_GET['page'];
         
        $next =(int)($page)*10; 
	         $query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and title LIKE '%$search%' and category='$cat' and state='$state' LIMIT ".$next.", 10 ");
	     }
	     
	     
	 }else{
	     
	     $page = (int)$_GET['page'];
         
        $next =(int)($page)*10;     
	     
	     	$query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and title LIKE '%$search%' and category='$cat'  LIMIT ".$next.", 10");
	 }

    //   if(isset($_GET['camp'])){

    //     $camp = $_GET['camp'];

    //      $query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and title LIKE '%$search%' and category='$cat' and location='$camp'");


    //   }else{
    //      $query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and title LIKE '%$search%' and category='$cat'  ");

    //   }
  	 
    
    

  }else{
      
       $page = (int)$_GET['page'];
         
        $next =(int)($page)*10;     

    
        $query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and category='$cat' LIMIT ".$next.", 10");

      

        

  }
  


  if($query){
  	$array = array();

  while ($row = mysqli_fetch_assoc($query)) {

  	$array[] = $row;

  	
  }

  echo json_encode($array);


}else{
    
    echo mysqli_error($conn);

}







?>