
<?php include('include/header.php');
?>
<script>
function formSubmission(){
    var id = document.forms["myForm"]["id"].value;
    var name = document.forms["myForm"]["name"].value;
    var email = document.forms["myForm"]["email"].value;
    var phone = document.forms["myForm"]["phone"].value;
    var message = document.forms["myForm"]["message"].value;
    var  propertyName = document.forms["myForm"]["propertyname"].value;  
    var propertyAddress = document.forms["myForm"]["propertyaddress"].value;
   // the below url submit the form data to a php file name contactonproperty. 
    window.location.href="contactonproperty.php?id="+ id + "&name=" + name + "&email=" + email+ "&phone=" + phone +  "&message=" + message + "&propertyname=" + propertyName + "&propertyaddress=" + propertyAddress;
    }
</script>
<?php

 // function to validate and sanitize user input  
 function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data,FILTER_SANITIZE_STRING);
    return $data;
  }
 
$id = $errormsg = $successmsg =  " ";
if(isset($_GET['id'])){
$id =  validate_input($_GET['id']);
}
else{
  $id = " ";
}
if(isset($_GET['id']) AND isset($_GET['errormessage']) AND isset($_GET['successmessage'])){
    $id =  validate_input($_GET['id']);
    $errormsg =  validate_input($_GET['errormessage']);
    $successmsg =  validate_input($_GET['successmessage']);
    }
    if($successmsg === "true"){
        $successmsg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>"." Your message is  succcessfully submitted "."<br>"."thank you for contacting us.".
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
            "<span aria-hidden='true'>"."&times"."</span>".
          "</button>"."</div>";  
            "</div>";
    }
    if($errormsg === "true"){
        $errormsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>"."We are sorry some fields are empty  all fields must be filled before submitting the form".
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
             "<span aria-hidden='true'>"."&times"."</span>".
           "</button>"."</div>";  
    }
$query=mysqli_query($con,"select * from property where id='$id'");
$res=mysqli_fetch_array($query);

$id=$res['id'];
$img=$res['image'];
$bedroom=$res['bedroom'];
$bathroom=$res['bathroom'];
$hall=$res['hall'];
$kichan=$res['kichan'];
$parkingspace=$res['parking_space'];
$kithan=$res['kichan'];
$description=$res['description'];
$title=$res['title'];
$price=$res['price'];
$address=$res['address'];
$property_type=$res['property_type'];
$sold=$res['sold'];
?>

<!-- main header start -->


<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Property Details </h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Property Details</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Properties details page start -->
<div class="properties-details-page content-area-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12 slider">
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-60">
                    <div class="heading-properties">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h3><?php echo $title;?></h3>
                                    <p><i class="fa fa-map-marker"></i> <?php echo $address;?></p>
                                </div>
                                <div class="p-r">
                                    <h3>N<?php echo $price;?></h3>
                                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">

                        <?php

$query=mysqli_query($con,"select * from images where property_id='$id'");
$res=mysqli_fetch_array($query);
                    
$img1=$res['image1'];
$img2=$res['image2'];
$img3=$res['image3'];
$img4=$res['image4'];
                        ?>


                        <div class="active item carousel-item" data-slide-number="0">
                            <img src="admin/images/property_image/<?php echo $img;?>" class="img-fluid" alt="property-4">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                            <img src="admin/images/property_image/<?php echo $img1;?>" class="img-fluid" alt="property-6">
                        </div>
                        <div class="item carousel-item" data-slide-number="2">
                            <img src="admin/images/property_image/<?php echo $img2;?>" class="img-fluid" alt="property-1">
                        </div>
                        <div class="item carousel-item" data-slide-number="4">
                            <img src="admin/images/property_image/<?php echo $img3;?>" class="img-fluid" alt="property-5">
                        </div>
                        <div class="item carousel-item" data-slide-number="5">
                            <img src="admin/images/property_image/<?php echo $img4;?>" class="img-fluid" alt="property-8">
                        </div>
                        <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#propertiesDetailsSlider">
                                <img src="admin/images/property_image/<?php echo $img;?>" class="img-fluid" alt="property-4">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#propertiesDetailsSlider">
                                <img src="admin/images/property_image/<?php echo $img1;?>" class="img-fluid" alt="property-6">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#propertiesDetailsSlider">
                                <img src="admin/images/property_image/<?php echo $img2;?>" class="img-fluid" alt="property-1">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-3" data-slide-to="3" data-target="#propertiesDetailsSlider">
                                <img src="admin/images/property_image/<?php echo $img3;?>" class="img-fluid" alt="property-5">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-4" data-slide-to="4" data-target="#propertiesDetailsSlider">
                                <img src="admin/images/property_image/<?php echo $img4;?>" class="img-fluid" alt="property-8">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tabbing box start -->
                <div class="tabbing tabbing-box mb-60">
                    <ul class="nav nav-tabs" id="carTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Related Properties</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="carTabContent">
                        <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <h3 class="heading">Property Description</h3>
                           <p><?php echo $description;?></p>
                        </div>
                        <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab"> 
                            <div class="amenities-box mb-60">
                                <h3 class="heading">Property Details</h3>
                         <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li>
                                                <strong>Property Id:</strong> <?php echo $id;?>
                                            </li>
                                            <li>
                                                <strong>Price:</strong>N <?php echo $price;?>/
                                            </li>
                                            <li>
                                                <strong>Property Type:</strong> <?php echo $property_type;?>
                                            </li>
                                            <li>
                                                <strong>Bathrooms:</strong> <?php echo $bathroom;?>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li>
                                                <strong>Land area:</strong> <?php echo $land_area;?>
                                            </li>
                                            
                                            <li>
                                                <strong>Bedroom:</strong> <?php echo $bedroom;?>
                                            </li>
                                            <li>
                                                <strong>Parking Space :</strong> <?php echo $parkingspace;?>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li>
                                                <strong>Sold:</strong> <?php echo $sold;?>
                                            </li>
                                            <li>
                                                <strong>Address:</strong> <?php echo $address;?>
                                            </li>                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab"> 
                            <div class="section location">
                                <h3 class="heading">Property Location</h3>
                                <div class="">
                                 <ul>
                                    <li>
                                        <strong>Address:</strong> <?php echo $address;?>
                                    </li>                                            
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="6" role="tabpanel" aria-labelledby="6-tab">
                            <div class="related-properties">
                                <h3 class="heading">Related Properties</h3>
              <div class="row">
        <?php 
        include'include/config.php';
$query=mysqli_query($con,"select * from property ORDER BY RAND() LIMIT 2");
while($res=mysqli_fetch_array($query))
{
$id=$res['id'];
$img=$res['image'];

        ?>    
            <div class="col-md-6">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="tag button alt featured">Featured</div>
                            <div class="price-ratings-box">
                                <p class="price">
                                    N <?php echo $res['price'];?>
                                </p>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <img src="admin/images/property_image/<?php echo $img;?>" alt="property-1" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.php?id=<?php echo $id;?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <div class="property-magnify-gallery"> 
                                <a href="admin/images/property_image/<?php echo $img;?>" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="properties-details.php?id=<?php echo $id;?>"><?php  echo $res['title'];?></a>
                        </h1>
                        <div class="location">
                            <a href="properties-details.php?id=<?php echo $id;?>">
                                <i class="fa fa-map-marker"></i><?php echo $res['address'];?>
                            </a>
                        </div>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-bed"></i> <?php echo $res['bedroom'];?> : Bedroom
                            </li>
                            <li>
                                <i class="flaticon-bath"></i> <?php echo $res['hall'];?> : Hall
                            </li>
                            <li>
                                <i class="fa fa-coffee"></i> <?php echo $res['kichan'];?> : kitchen
                            </li>
                            <li>
                               <i class="flaticon-balcony-and-door"></i><?php echo $res['parking_space'];?> : Parking Space 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
<?php } ?>
            
        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Amenities box start -->
                <div class="amenities-box mb-60">
                    <h3 class="heading">Condition</h3>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                <li><span><i class="flaticon-bath"></i> <?php echo $bathroom;?> Bathroom</span></li>
                                <li><span> <i class="flaticon-bath"></i> <?php echo $hall;?> : Hall <span></li>
                           </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <ul>
                                 <li><span><i class="fa fa-coffee"></i> <?php echo $kichan;?> : kitchen <span></li>
                                <li><span><i class="flaticon-balcony-and-door"></i><?php echo $parkingspace;?> Parking Space</span></li>
                            </ul>
                        </div>
                        </div> 
                </div>

                <!-- Contact 1 start --> 
                <div class="contact-3 mb-60">
                    <h3 class="heading">Have Interest on Property Please  Contact us</h3>
                    <div class="container">
                        <div class="row">
                            <form action="#" method="post" name="myForm" enctype="multipart/form-data">
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                       <?php echo $errormsg.$successmsg; ?>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group name">
                                            <input type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group email">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group number">
                                            <input type="text" name="phone"  id="phone" class="form-control" placeholder="Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group message">
                                            <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <input type="hidden" name ="propertyname"  value ="<?php echo $title;?>">
                                    <input type="hidden" name ="id"  value ="<?php echo $id;?>">
                                    <input type="hidden" name ="propertyaddress"  value ="<?php echo $address;?>">
                                        <div class="send-btn">
                                            <button type="submit" class="btn btn-color btn-md btn-message" onclick="formSubmission();">Send Message</button>
                                       <!-- when the form is submitted the function formSubmission on line 5 (five) receive the data and send it to contactonproperty.php -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          </div>
          </div>
</div>
<!-- Properties details page end -->

<!-- Footer start -->
<?php include('include/footer.php');?>
<!-- Footer end -->

</body>
</html>