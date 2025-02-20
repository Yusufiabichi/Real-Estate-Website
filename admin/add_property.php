<?php 
include('include/header.php');
extract($_REQUEST);
include 'include/config.php';

if(isset($submit)) {
    $file = $_FILES['file']['name'];
    
    // Ensure $sold is properly set
    $sold = isset($sold) ? $sold : 'No';  // Default to 'No' if not set

    // Explicitly defining the column names
    $query = "INSERT INTO property 
        (title, bedroom, hall, kitchan, bathroom, parking_space, price, address, image, description, property_type, sold, land_area, created_at) 
        VALUES 
        ('$title', '$bedroom', '$hall', '$kitchan', '$bathroom', '$parking_space', '$price', '$add', '$file', '$description', '$property_type', '$sold', '$land_area', NOW())";

    $r = mysqli_query($con, $query);

    if($r) {
        move_uploaded_file($_FILES['file']['tmp_name'], "images/property_image/" . $_FILES['file']['name']);
        $msg = '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Property Data Added Successfully.
        </div>';    
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> Property Data Not Added. ' . mysqli_error($con) . '
        </div>';
    }
}
?> 
