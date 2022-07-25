<?php

include("conn.php");




if(isset($_GET['state'])){

	$state = $_GET['state'];

	$select =  mysqli_query($conn,"SELECT * FROM campuses WHERE state='$state' ORDER by campus ASC ");



}else{

	$select = mysqli_query($conn, "SELECT * FROM campuses ORDER by campus ASC");

}



if($select){
	$array = array();

	while ($row = mysqli_fetch_assoc($select)) {
		$array[] = $row; 
	}
     
     echo json_encode($array);

}else{
    echo mysqli_error($conn);
}


?>