<?php 
   include('include/header.php');
extract($_REQUEST);
include'include/config.php';
if(isset($submit))
{

$file=$_FILES['file']['name'];
  
  //$query="insert into property values('','$title','$bedroom','$hall','$kitchan','$bathroom','$parking_space','$price','$add','$file','$description','$property_type','$sold','$land_area',now())";  
  //$r=mysqli_query($con,$query);
  //move_uploaded_file($_FILES['file']['tmp_name'],"images/property_image/".$_FILES['file']['name']); 

  $query = "INSERT INTO property 
        (title, bedroom, hall, kichan, bathroom, parking_space, price, address, image, description, property_type, sold, land_area, date, created_at) 
        VALUES 
        ('$title', '$bedroom', '$hall', '$kichan', '$bathroom', '$parking_space', '$price', '$add', '$file', '$description', '$property_type', '$sold', '$land_area', CURDATE(), NOW())";


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

// if($r)
// {
//   $msg='<div class="alert alert-success alert-dismissible">
//     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
//     <strong>Success!</strong> Property Data Add successful.
//   </div>';    
// }
// else
// {
// $msg='<div class="alert alert-danger alert-dismissible">
//     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
//     <strong>Success!</strong> Property Data  Not Added.'.mysqli_error($con).
//   '</div>';

// }        
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

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="title" class="form-control">
                                                <label class="form-label">Property Title</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="property_type" class="form-control">
                                                <label class="form-label">Property Type</label>
                                            </div>
                                        </div>
                                    </div>

                                     
                                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="land_area" class="form-control">
                                                <label class="form-label">Land area</label>
                                            </div>
                                        </div>
                                     </div>


                                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="price" class="form-control">
                                                <label class="form-label">Price</label>
                                            </div>
                                        </div>
                                    </div>


                                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                 <label style="color:gray;">Sold</label>
                                               
                                               <input name="sold" type="radio" id="radio_36" value="yes" class="with-gap radio-col-light-blue" checked />
                                                <label for="radio_36">YES</label>

                                                <input name="sold" type="radio" id="radio_30" value="No" class="with-gap radio-col-red"  />
                                                <label for="radio_30">NO</label>
                                            </div>
                                        </div>
                                     </div>

                                    
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="add" class="form-control">
                                                <label class="form-label">Address</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea required name="description" class="form-control"></textarea>
                                                <label class="form-label">Description</label>
                                            </div>
                                        </div>
                                    </div>

                               <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                <div class="custom-file">
                                    <label class="form-label">Add Property Image</label>
                                    <input required name="file"  type="file" multiple />
                                    
                                </div>
                           
                                            
                               </div>

                                <div class="header col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">
                                                 
                               <h4 style="text-align: center;">Condition</h4>
                                                                                     
                                </div>



                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="kichan" class="form-control" min="0" value="0">
                                                <label class="form-label">Kitchen</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="hall" class="form-control">
                                                <label class="form-label">Hall</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="bedroom" class="form-control">
                                                <label class="form-label">Bedroom</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="bathroom" class="form-control">
                                                <label class="form-label">Bathroom</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="parking_space" class="form-control">
                                                <label class="form-label">Parking Space</label>
                                            </div>
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