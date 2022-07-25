<?php

include("conn.php");


$loc =  mysqli_real_escape_string($conn,$_POST['location']);
$user =  mysqli_real_escape_string($conn,$_POST['user']);
$state = mysqli_real_escape_string($conn,$_POST['state']);

if(isset($_GET['page'])){
    
    $page = (int)$_GET['page'];
    
    $next = (int)$page*8;
    
    if(isset($_GET['search'])){
        
        $search = $_GET['search'];
        
        $select = "SELECT * FROM new_ad WHERE title LIKE '%$search%' and (location = '$loc' or state='$state') and user!= '$user' LIMIT ".$next.",8";
    }else{
         $select = "SELECT * FROM new_ad WHERE (location = '$loc' or state='$state') and user!= '$user' LIMIT ".$next.",8";
    }
    
   
    
}else{
    $select = "SELECT * FROM new_ad WHERE location = '$loc' and user!= '$user' ";
}



$mysql = mysqli_query($conn, $select);

if($mysql){
    
    $array = array();
    
    while($row = mysqli_fetch_assoc($mysql) ){
        $array[] = $row;
    }
    
    echo json_encode($array);
    
}else{
    echo mysqli_error($conn);
}






?>