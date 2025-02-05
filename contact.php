<?php include('include/header.php');
$errormsg = $successmsg = " ";
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    require  'include/config.php';
   // function to validate and sanitize user input  
   function validate_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     $data = filter_var($data,FILTER_SANITIZE_STRING);
     return $data;
   }
   // when contact form submitted the below code executes
          $name =  $phonenumber = $email = $subject = $message = $date =  $time  = "";
            $name =  validate_input($_POST['name']);
            $phonenumber =  validate_input($_POST['phone']);
            $email =  validate_input($_POST['email']);
            $subject =  validate_input($_POST['subject']);
            $message =  validate_input($_POST['message']);
            $date = date("d/m/y");
            $time = date("h:i:sa");
            $stmt = $con->prepare("INSERT INTO inquiry(name,subject,email,mobile,message,date,time)
          VALUES (?,?,?,?,?,?,?)");
            if(empty($subject) || empty($message) || empty($name) || empty($phonenumber) || empty($email)){
              
                $errormsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>"."Some fields are empty.Fill them before submittting the form.".
               "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                "<span aria-hidden='true'>"."&times"."</span>"."</button>"."</div>"; 
            }
            else{
            $stmt->bind_param("sssssss",$name,$subject,$email,$phonenumber,$message,$date,$time);
            If($stmt->execute() === TRUE){
                $successmsg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>"."Thank you for contacting us.".
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                "<span aria-hidden='true'>"."&times"."</span>"."</button>"."</div>";  
            } 
            else {
                $errormsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>"."We are sorry something was went wronged your message was not submitted".
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                 "<span aria-hidden='true'>"."&times"."</span>".
               "</button>"."</div>";   
            }  
           }
}
?>
<!-- main header end -->

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Contact Us</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php">Home</a></li>
                <li class="active">Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->
      <!-- Contact 1 start -->
        <div class="main-title mt-5">
            <h1>Contact Us</h1>
            <p>Cyclosis Real  Estate Management.</p>
        </div>
        <div class="container mt-3">
                        <div class="row mb-3 mx-0">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  mt-3">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"  enctype="multipart/form-data">
                                  <div class="row  mx-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                       <?php echo $errormsg.$successmsg; ?>
                                    </div>
                                  </div>
                                <div class="row  mb-3 mx-0">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <div class="form-group name">
                                            <input type="text" name="name" class="form-control" placeholder="Name" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <div class="form-group email">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <div class="form-group phonenumber">
                                            <input type="tel" id="phonenumber" name="phone" class="form-control" placeholder="Phone number" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <div class="form-group subject">
                                            <input type="text" name="subject"  id="subject" class="form-control" placeholder="Subject" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                                        <div class="form-group message">
                                            <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-3">
                                        <div class="send-btn">
                                            <button type="submit" class="btn btn-color btn-md btn-message">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 mt-3 mx-0"></div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mt-3  mx-0">
                        <div class="media">
                        <i class="fa fa-map-marker"></i>
                        <span class="space"></span>
                        <div class="media-body">
                            <h5 class="mt-0">Office Address</h5>
                            <p>No. C10 Khairat Plaza Opp NYSC Secretariant,Gwarzo Road, Kano State,Nigeria</p>
                        </div>
                          </div> 
                          <div class="media">
                        <i class="fa fa-phone"></i>
                        <span class="space"></span>
                        <div class="media-body">
                            <h5 class="mt-0">Phone Number</h5>
                            <p>Line 1<a href="tel:+234 8038751819">:+234 8038751819</a> </p>
                            <p>Line 2<a href="tel:+234 8125063740">:+234 8125063740</a> </p>
                        </div>
                        </div>
                        <div class="media mrg-btn-0">
                        <i class="fa fa-envelope"></i>
                        <span class="space"></span>
                        <div class="media-body">
                            <h5 class="mt-0">Email Address</h5>
                            <p><a href="mailto:cyclosisconsultltd@gmail.com">cyclosisconsultltd@gmail.com</a></p>
                        </div>
                       </div>
                       </div>
                    </div>
                 </div>
               </div>
                                 
<!-- Contact 1 end -->

<!-- Google map start -->
<div class="section">
    <div class="map">
        <div id="contactMap" class="contact-map"></div>
    </div>
</div>
<!-- Google map end -->

<!-- Footer start -->
<?php include('include/footer.php');?>