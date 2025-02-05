<?php 
require  'include/config.php';
$errormsg = $successmsg = " ";
$name  = $email =  $phone  =  $message = $propertyname = $propertyaddress = "";
 function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data,FILTER_SANITIZE_STRING);
    return $data;
  }
$id =  validate_input($_GET['id']);
$name =  validate_input($_GET['name']);
$email = validate_input($_GET['email']);
$phone =  validate_input($_GET['phone']);
$message =  validate_input($_GET['message']);
$propertyname  =  validate_input($_GET['propertyname']);
$propertyaddress =  validate_input($_GET['propertyaddress']);

    $stmt = $con->prepare("INSERT INTO propertiescontact(Name,Email,Phonenumber,
        Message,PropertyName,PropertyAddress)
        VALUES (?,?,?,?,?,?)");
       
         if(empty($name) || empty($email) || empty($phone) || empty($message)){
          $errormsg = "true";      
        }
         else{
         $stmt->bind_param("ssssss", $name,$email,$phone, $message,$propertyname,$propertyaddress);
         If($stmt->execute() === TRUE){
          $successmsg = "true";
         } 
         else {
          $errormsg = "true";   
         }  
        }
        
      $url =  "properties-details.php?id=".urlencode($id)."&errormessage=".urlencode($errormsg)."&successmessage=".urlencode($successmsg);
      header('location:'.$url);
        
?>