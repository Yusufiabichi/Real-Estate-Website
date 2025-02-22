<?php include('include/header.php'); ?>
<!-- main header end -->
<script>
function formSubmission(){
    var name = document.forms["propertyform"]["name"].value;
    var email = document.forms["propertyform"]["email"].value;
    var phone = document.forms["propertyform"]["phonenumber"].value;
    var message = document.forms["propertyform"]["message"].value;
   var  propertyName = document.forms["propertyform"]["propertyname"].value;  
   var propertyAddress = " "; 
   // the below url submit the form data to a php file name propertycontact. 
   window.location.href="propertycontact.php?name="+ name + "&email=" + email+ "&phone=" + phone +  "&message=" + message + "&propertyname=" + propertyName + "&propertyaddress=" + propertyAddress;
  }
function search(){
     const searchproperty = document.forms["searchForm"]["searchproperty"].value;
     if(searchproperty === ""){
        alert("Please you cannot search an empty property search again");
     }
     else{
         window.location.href="searchproperty.php?search=" + searchproperty;
     }
    
}
</script>
<?php 
$successmsg = $errormsg = "";
function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data,FILTER_SANITIZE_STRING);
    return $data;
  }
if(isset($_GET['errormessage']) AND isset($_GET['successmessage'])){
    $errormsg =  validate_input($_GET['errormessage']);
    $successmsg =  validate_input($_GET['successmessage']);
    }
    if($successmsg === "true"){
        $successmsg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>"." Your message is  succcessfully submitted thank you for contacting us.".
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
?>
<style>
.contactlabel {
     font-weight:bold;
     font-size:17px;
     color:black;
 }
</style>
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

<!-- Properties list fullwidth start -->
<div class="properties-list-fullwidth content-area-2">
    <div class="container">
        <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
            <div class="row clearfix">
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-5">
                    <h4>
                        <span class="heading-icon">
                            <i class="fa fa-caret-right icon-design"></i>
                            <i class="fa fa-th-large"></i>
                        </span>
                        <span class="heading">Properties Grid</span>
                    </h4>
                </div>
                </div>
           </div>
           <!-- Searching property start -->
                   <div class="container-fluid row  mb-5">
                   <form action="#" name="searchForm" method="post">
                       <input type="text" name="searchproperty" placeholder="Search Property" class="form-control  mb-3" style="width:100%;"/>
                        <div class="send-btn">
                                <button type="submit" class="btn btn-color btn-md btn-message" onclick="search();">Search</button>
                        <!-- When the user click the search button the function search is executed on line 14 -->
                        </div>
                   </form>      
                 </div>
           <!-- End of searching property -->
        <div class="subtitle">
            Results  Found
        </div>
        <div class="row">
        <?php 
        include'include/config.php';

            $query=mysqli_query($con,"select * from property");
            while($res=mysqli_fetch_array($query))
            {
            $id=$res['id'];
            $img=$res['image'];
            $propertyaddress = $res['address'];

        ?>    
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="property-box">
                    <div class="property-thumbnail">
                        <a href="properties-details.html" class="property-img">
                            <div class="tag button alt featured">For Sale</div>
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
                                <i class="fa fa-coffee"></i> <?php echo $res['kichan'];?> : kitchen
                            </li>
                        </ul>
                    </div>
                    <div class="footer">
                        <a href="#" data-toggle="modal" data='' data-target="#contactproperty" data-whatever="contactproperty">
                            <i class="fa fa-envelope"></i>Have interest? contact us  
                        </a>
                    </div>
                </div>
            </div>
<?php } ?>
            
        </div>
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
           <label for="propertyname" class="col-form-label">Property Name: </label> 
            <select name="propertyname" class="form-control show-tick" >
             <option name="propertyname" value=" ">Select</option>
            <?php
           $query=mysqli_query($con,"select * from property");
           while($res=mysqli_fetch_array($query))
            {?>
                <option name="propertyname" value=" <?php echo $res['title'];?>"> <?php echo  $res['title'];?></option>
          <?php 
            }
            ?>
            </select>
          </div> 
          <div class="form-group">
            <label for="phonenumber" class="col-form-label">Phonenumber<span class="require">*<span></label>
            <input type="text" name="phonenumber" class="form-control" name="phonenumber">
          </div>
           <div class="form-group">
            <label for="message-text" class=" contactlabel">Message<span class="require">*<span></label>
            <textarea name="message" class="form-control" class="message"></textarea>
          </div> 
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

<!-- Footer start -->
<?php include('include/footer.php');?>