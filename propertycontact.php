<?php 
 require  'include/config.php';
$errormsg = $successmsg = " ";
$name  = $email =  $phone  =  $message = $propertyname = $propertyaddress = "";
// function to validate and sanitize user input  
function validate_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = filter_var($data,FILTER_SANITIZE_STRING);
  return $data;
}
$name =  validate_input($_GET['name']);
$email = validate_input($_GET['email']);
$phone =  validate_input($_GET['phone']);
$message =  validate_input($_GET['message']);
$propertyname  =  validate_input($_GET['propertyname']);
$propertyaddress =  validate_input($_GET['propertyaddress']);
echo $name.$email.$phone.$message.$propertyname.$propertyaddress;
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

$url =  "properties.php?errormessage=".urlencode($errormsg)."&successmessage=".urlencode($successmsg);
header('location:'.$url);
?>