<?php

  include "conn.php";

  $user = $_GET['user'];

  if(isset($_GET['search'])){
      
	$search = $_GET['search'];
	
	 $page = (int)$_GET['page'];
         
    $next =(int)($page)*10;  
	
	
	 if(isset($_GET['state'])){
	     
	      $state = $_GET['state'];
	     
	     if(isset($_GET['camp'])){
	         
	        $camp = $_GET['camp'];
	         
	         $query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and title LIKE '%$search%' and location='$camp' and state= '$state' ORDER BY id DESC LIMIT ".$next.", 10   ");
	         
	     }else{
	         $query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and title LIKE '%$search%' and state= '$state' ORDER BY id DESC LIMIT ".$next.", 10  ");
	     }
	     
	     
	 }else{
	     	$query = mysqli_query($conn, "SELECT * FROM new_ad WHERE user != '$user' and title LIKE '%$search%' ORDER BY id DESC LIMIT ".$next.", 10  ");
	 }
	
	
  
    
  

  }
  
  else{

      if(isset($_GET['page'])){
          
          
          

        $page = (int)$_GET['page'];
         
    $next =(int)($page)*10;     
          
          if(isset($_GET['rand']) && isset($_GET['rand'])!="DESC"){
              $sql = "SELECT * FROM new_ad WHERE user != '$user' ORDER BY id DESC LIMIT ".$next.",10 ";  
          }else{
              $sql = "SELECT * FROM new_ad WHERE user != '$user' ORDER BY id DESC LIMIT ".$next.",10 ";  
          }
          
          
          

          $query = mysqli_query($conn, $sql);

      }else{

        $query = mysqli_query($conn,$sql);

      }

  	
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