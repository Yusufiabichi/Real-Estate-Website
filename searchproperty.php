<?php 
require  'include/config.php';
include ('include/header.php');
?>
<script>
//the function when user send a message property. 
function formSubmission(){
    var name = document.forms["propertyform"]["name"].value;
    var email = document.forms["propertyform"]["email"].value;
    var phone = document.forms["propertyform"]["phonenumber"].value;
    var message = document.forms["propertyform"]["message"].value;
    var  propertyName = document.forms["propertyform"]["propertyname"].value;  
    var propertyAddress = document.forms["propertyform"]["propertyaddress"].value;
   // the below url submit the form data to a php file name propertycontact. 
    window.location.href="propertycontact.php?name="+ name + "&email=" + email+ "&phone=" + phone +  "&message=" + message + "&propertyname=" + propertyName + "&propertyaddress=" + propertyAddress;
  }
</script>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Properties Grid</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Properties Grid</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->
<?php
$errormsg = $successmsg = " ";
$searchproperty  =  "";
 function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data,FILTER_SANITIZE_STRING);
    return $data;
  }
  $searchproperty =  validate_input($_GET['search']);
$query = "SELECT  * FROM  property WHERE title LIKE '%$searchproperty%' || 
bedroom LIKE '%$searchproperty%' || hall LIKE '%searchproperty%' || 
kichan LIKE '%searchproperty%' || bathroom LIKE '%searchproperty%' ||
 parking_space LIKE '%searchproperty%' || price LIKE '%searchproperty%' || 
address LIKE '%searchproperty%' || description LIKE '%searchproperty%' ||
property_type  LIKE '%searchproperty%' || land_area LIKE '%searchproperty%' ";
$answer = $con->query($query);
          if($answer != TRUE){
              echo "query not executed";
          }
          else{
            if($answer->num_rows > 0){
                while($res = $answer->fetch_assoc()){
                    $id=$res['id'];
                    $img=$res['image'];
                   $propertyaddress = $res['address'];?>
                   <div class="row  mt-5 mx-0">
                   <div class="col-lg-3 col-md-3 col-sm-3 mt-5">
                   </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="tag button alt featured">Featured</div>
                                    <div class="price-ratings-box">
                                        <p class="price">
                                             <?php echo $res['price'];?>
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
                                    <a href="properties-details.php?id=<?php echo $id;?>"><?php $propertyname =  $res['title']; echo $res['title'];?></a>
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
                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i><?php echo $res['land_area'];?> Sq Ft
                                    </li>
                                    <li>
                                        <i class="fa fa-coffee"></i> <?php echo $res['kichan'];?> : kitchen
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <a href="#" data-toggle="modal" data-target="#contactproperty" data-whatever="contactproperty">
                                    <i class="fa fa-envelope"></i>Have interest contact us  
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 mt-5">
                   </div>
        </div>
        <!-- Properties list fullwidth end -->

           
<!-- Modal contact on property start-->
<div class="modal fade" id="contactproperty" tabindex="-1" role="dialog" aria-labelledby="Modalforcontact" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" name = "propertyform" >
            <div class="row mx-0">
              <div class="form-group">
                    <?php echo $errormsg;
                        echo  $successmsg; ?>
               </div>
           </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name<span class="require">*<span></label>
            <input type="text" name="name"  class="form-control" class="name">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          
          <div class="form-group">
            <label for="phonenumber" class="col-form-label">Phonenumber<span class="require">*<span></label>
            <input type="text" name="phonenumber" class="form-control" name="phonenumber">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label ">Message<span class="require">*<span></label>
            <textarea name="message" class="form-control" class="message"></textarea>
          </div>
          <input type="hidden" name="propertyname" value="<?php echo $propertyname; ?>" >
          <input type="hidden" name="propertyaddress" value="<?php echo $propertyaddress; ?>" >
            <div class="modal-footer">
            <button type="submit" class="btn btn-color  btn-message" onclick="formSubmission();">Send Message</button>
            <!-- when the form is submitted the function formSubmission on line 6 (six) receive the data and send it to propertycontact.php -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal contact on property end-->



                <?php 
                }
            
            }
            else{
              echo "<div class='container'>
              <div class='row mx-0'>
              <div class='col-lg-3 col-md-3 col-sm-0 col-xls-0'></div>
            <div class=' col-lg-8 col-md-8 col-sm-12 col-xls-12 alert alert-success alert-dismissible fade show mt-3 ' role='alert'>No item match your search.
            <br> Click the below button to view other Properties<br>
            <p> <a href='properties.php' class='btn btn-info'>Properties</a></p>
                 </div> 
                </div>
                </div>
              </div>";
           }
        
        }  
        ?>
<!-- Footer start -->
<?php include('include/footer.php');?>
?>
