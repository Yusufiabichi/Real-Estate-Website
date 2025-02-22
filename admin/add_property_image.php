<?php 

include('include/header.php');
include('include/config.php');

if(isset($_POST['submit'])) {

    // Ensure property ID is selected
    if(!isset($_POST['property_id']) || empty($_POST['property_id'])) {
        $msg = '<div class="alert alert-danger">Error: Property ID is required.</div>';
    } else {
        $property_id = mysqli_real_escape_string($con, $_POST['property_id']);

        // Upload directory
        $targetDir = "images/property_image/";

        // Validate and store uploaded images
        $image1 = isset($_FILES['image1']['name']) ? $_FILES['image1']['name'] : '';
        $image2 = isset($_FILES['image2']['name']) ? $_FILES['image2']['name'] : '';
        $image3 = isset($_FILES['image3']['name']) ? $_FILES['image3']['name'] : '';
        $image4 = isset($_FILES['image4']['name']) ? $_FILES['image4']['name'] : '';

        $targetFile1 = $targetDir . basename($image1);
        $targetFile2 = $targetDir . basename($image2);
        $targetFile3 = $targetDir . basename($image3);
        $targetFile4 = $targetDir . basename($image4);

        // Move uploaded files to target directory
        $uploadSuccess = true;

        if(!empty($image1) && !move_uploaded_file($_FILES['image1']['tmp_name'], $targetFile1)) {
            $uploadSuccess = false;
        }
        if(!empty($image2) && !move_uploaded_file($_FILES['image2']['tmp_name'], $targetFile2)) {
            $uploadSuccess = false;
        }
        if(!empty($image3) && !move_uploaded_file($_FILES['image3']['tmp_name'], $targetFile3)) {
            $uploadSuccess = false;
        }
        if(!empty($image4) && !move_uploaded_file($_FILES['image4']['tmp_name'], $targetFile4)) {
            $uploadSuccess = false;
        }

        if ($uploadSuccess) {
            // Insert images into the database
            $query = "INSERT INTO images (image1, image2, image3, image4, property_id) 
                      VALUES ('$image1', '$image2', '$image3', '$image4', '$property_id')";
            
            if(mysqli_query($con, $query)) {
                $msg = '<div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Images uploaded successfully.
                        </div>';
            } else {
                $msg = '<div class="alert alert-danger">Error: Could not insert images into the database.</div>';
            }
        } else {
            $msg = '<div class="alert alert-danger">Error: File upload failed.</div>';
        }
    }
}

?>  
    <!-- Header -->
    
    <section>
       
       <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
        <!-- #END# Left Sidebar -->
        <section class="content">
        <div class="container-fluid">
            <?php echo @$msg;?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Add Property
                            </h2>
                         </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">

                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">
                                        <select class="form-control show-tick" name="property_id">
                                            <option disabled selected>--Select Room Title--</option>
                                            <?php
                                            $sel=mysqli_query($con,"select * from property");
                                            while($res=mysqli_fetch_array($sel))
                                            {
                                            ?>

                                            <option value="<?php echo $res['id'];?>"><?php echo $res['title'];?></option>  
                                           
                                           <?php  }  ?>

                                        </select>  


                             
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                      <div class="dz-message">
                                   
                                    <h3>Click to Image upload.</h3>
                                    
                                </div>
                                <div>
                                    <input required name="image1" type="file" multiple />
                                </div>
                             
                             </div>


                             <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                      <div class="dz-message">
                                   
                                    <h3>Click to Image upload.</h3>
                                    
                                </div>
                                <div>
                                    <input required name="image2" type="file" multiple />
                                </div>
                             
                             </div>

                             <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                      <div class="dz-message">
                                   
                                    <h3>Click to Image upload.</h3>
                                    
                                </div>
                                <div>
                                    <input required name="image3" type="file" multiple />
                                </div>
                             
                             </div>


                             <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                      <div class="dz-message">
                                   
                                    <h3>Click to Image upload.</h3>
                                    
                                </div>
                                <div>
                                    <input required name="image4" type="file" multiple />
                                </div>
                             
                             </div>
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">
                             
                                     
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            <?php include'include/footer.php';?>
            <!-- Select Plugin Js -->
 
