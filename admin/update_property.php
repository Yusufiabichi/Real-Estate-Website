<?php 
include('include/header.php');
include'include/config.php';
extract($_REQUEST);

$id=$_REQUEST['id'];

$query=mysqli_query($con,"select * from property where id='$id'");
$res=mysqli_fetch_array($query);

$id=$res['id'];
$img=$res['image'];
$sold_res=$res['sold'];


if(isset($submit))
{

  $file=$_FILES['file']['name'];

  if($file=="")
  {

  $query="update property set title='$title',bedroom='$bedroom',hall='$hall',kichan='$kichan',price='$price',address='$add',description='$description',bathroom='$bathroom',parking_space='$parking_space',property_type='$property_type',land_area='$land_area',sold='$sold' where id='$id'";
  mysqli_query($con,$query); 

  $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Update successful.
  </div>';
    echo"<script>window.location.href='view_property.php';</script>";
  }
  else
  {


  
  $query="update property set title='$title',bedroom='$bedroom',hall='$hall',kichan='$kichan',price='$price',address='$add',description='$description',bathroom='$bathroom',parking_space='$parking_space',property_type='$property_type',land_area='$land_area',sold='$sold',image='$file' where id='$id'";
  mysqli_query($con,$query);
  unlink("images/property_image/$img");

  move_uploaded_file($_FILES['file']['tmp_name'],"images/property_image/".$_FILES['file']['name']); 


   $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Update successful.
  </div>';

echo"<script>window.location.href='view_property.php';</script>";

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
                                Update Property
                                
                            </h2>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="title" value="<?php echo $res['title'];?>" class="form-control">
                                                <label class="form-label">Property Title</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="property_owner" value="<?php echo $res['property_owner'];?>" class="form-control">
                                                <label class="form-label">Property Owner</label>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="property_type" value="<?php echo $res['property_type'];?>" class="form-control">
                                                <label class="form-label">Property Type</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="lot_size" value="<?php echo $res['lot_size'];?>" class="form-control">
                                                <label class="form-label">Property Lot Size</label>
                                            </div>
                                        </div>
                                     </div> -->

                                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                 <label style="color:gray;">Sold</label>
                                               
                                               <input name="sold" type="radio" <?php if($sold_res=='yes') echo 'checked';?> id="radio_36" value="yes" class="with-gap radio-col-light-blue" checked />
                                                <label for="radio_36">YES</label>

                                                <input name="sold" type="radio" <?php if($sold_res=='no') echo 'checked';?> id="radio_30" value="no" class="with-gap radio-col-red"  />
                                                <label for="radio_30">NO</label>
                                            </div>
                                        </div>
                                     </div>

                                     

                                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="land_area" value="<?php echo $res['land_area'];?>" class="form-control">
                                                <label class="form-label">Land area</label>
                                            </div>
                                        </div>
                                     </div>
                                    
                                    
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="price" value="<?php echo $res['price'];?>" class="form-control">
                                                <label class="form-label">Price</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="sqr_price" value="<?php echo $res['sqr_price'];?>" class="form-control">
                                                <label class="form-label">Sqr Fit Price</label>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="add" value="<?php echo $res['address'];?>" class="form-control">
                                                <label class="form-label">Address</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea required name="description" class="form-control"><?php echo $res['description'];?></textarea>
                                                <label class="form-label">Description</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">                                       
                                     <div class="custom-file">
                                    <label class="form-label">Add Property Image</label>
                                    <input  name="file"  type="file" multiple />                                   
                                     </div>                                            
                                      </div>

                                      <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">                                       
                                     <div class="custom-file">
                                    <label class="form-label">Property Image</label>
                                    <img src="images/property_image/<?php echo $img;?>" width="200">                              
                                     </div>                                            
                                      </div>

                                <div class="header col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">
                                                 
                               <h4 style="text-align: center;">Condition</h4>
                                                                                     
                                </div>



                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="kichan" value="<?php echo $res['kichan'];?>" class="form-control">
                                                <label class="form-label">Kitchen</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="hall" value="<?php echo $res['hall'];?>" class="form-control">
                                                <label class="form-label">Hall</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="bedroom" value="<?php echo $res['bedroom'];?>" class="form-control">
                                                <label class="form-label">Bedroom</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="bathroom" value="<?php echo $res['bathroom'];?>" class="form-control">
                                                <label class="form-label">Bathroom</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="parking_space" value="<?php echo $res['parking_space'];?>" class="form-control">
                                                <label class="form-label">Parking Space</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">
                             
                                     
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Update">
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