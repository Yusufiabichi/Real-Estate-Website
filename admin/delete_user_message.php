<?php 

include'include/config.php';

 // function to validate and sanitize user input  
 function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data,FILTER_SANITIZE_STRING);
    return $data;
  }

$id = validate_input($_GET['x']);

mysqli_query($con,"delete from propertiescontact where id='$id'");
echo"<script>window.location.href='users_message.php';</script>";		
?>