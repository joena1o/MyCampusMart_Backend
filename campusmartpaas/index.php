<?php 

if(isset($_POST['submit']) && isset($_POST['new_pass']) && isset($_POST['cpassword']) ){
    
    include("../conn.php");
    
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['new_pass']);
    $cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);
    
    
    $check = mysqli_query($conn, "SELECT * FROM reset_request WHERE email = '$email' ");
    
    $check_num = mysqli_num_rows($check);
    
    
    if(strlen($pass) < 8 && strlen($cpass) <  8){
        echo '<div class="alert alert-danger">
    New password must be at least 8 characters long
    </div>';
        return;
    }
    
    
    if($check_num<1){
    
    
    
    if($pass == $cpass){
        
        $pas = crypt($pass, '$12$hrd$reer');
        
        $sql = mysqli_query($conn, "UPDATE users SET password = '$pas' WHERE email = '$email' ");
    
    
    if($sql){
        
        $sql2 = mysqli_query($conn, "DELETE from reset_request email = '$email' ");
        
        if($sql2){
            echo '<div class="alert alert-success">
        Password Update
    </div>';
        }
        
         
    
    
    
    }else{
         echo '<div class="alert alert-danger">
     Failed to update
    </div>';
    }
        
    }else{
         echo '<div class="alert alert-danger">
     Passwords dont match
    </div>';
    }
    
    }else{
        
         echo '<div class="alert alert-danger">
    Error
    </div>';
        
    }
    
    
}





?>



<!doctype>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> MyCampus Mart</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary">
            <div class="navbar-bramd text-light">
           MyCampus Mart
            </div>
    </nav>
    
    <center>
    <div style="width: 70%; margin-top: 10%;">

        <form class="form-group" method='post' action='https://www.mycampusmart.com.ng/campusmartpaas/index.php?email=jonathan'>

            <div class="lead">Email: <?php if(isset($_GET['email'])) echo $_GET['email'] ?></div><br>
<input name="email" class="form-control" value="<?php if(isset($_GET['email'])) echo $_GET['email'] ?>" type="hidden">

            <input name="new_pass" class="form-control" placeholder="Enter new Password" type="password"><br>
            <input name="cpassword" class="form-control" placeholder="Confirm Password" type="password" ><br>

            <button name="submit" class="btn btn-primary text-light">
                    Submit
            </button>

        </form>


    </div>
</center>


</body>

</html>