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

$sid= validate_input($_GET['x']);

$query2=mysqli_query($con,"select * from images where property_id='$sid'");
$image1=mysqli_fetch_array($query2);

$img1=$image1['image1'];
$img2=$image1['image2'];
$img3=$image1['image3'];
$img4=$image1['image4'];

unlink("images/property_image/$img1");
unlink("images/property_image/$img2");
unlink("images/property_image/$img3");
unlink("images/property_image/$img4");


mysqli_query($con,"delete from images where property_id='$sid'");
echo"<script>window.location.href='view_property_image.php';</script>";		
	

?>