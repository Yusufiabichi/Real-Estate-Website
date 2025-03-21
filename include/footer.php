<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>Contact Us</h4>

                    <ul class="contact-info">
                        <li>
                            Address:  No. C10 Khairat Plaza Opp NYSC Secretariant,Gwarzo Road, Kano State, Nigeria 
                        </li>
                        <li>
                            Email: <a href="mailto:cyclosisconsultltd@gmail.com">cyclosisconsultltd@gmail.com</a>
                        </li>
                        <li>
                            Phone: <a href="tel:+2348038751819">08038751819,08125063740</a>
                        </li>
                    </ul>

                    <ul class="social-list clearfix">
                        <li><a href="https://www.facebook.com/abbanation" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.twitter/BichiMahmoud" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" id ="recent-posts">
                <div class="recent-posts footer-item">
                    <h4>Recent Properties</h4>
                   <?php  include'include/config.php';
                    $query=mysqli_query($con,"select * from property  LIMIT 3");
                    while($res=mysqli_fetch_array($query))
                    {
                    $id=$res['id'];
                    $img=$res['image'];
                            ?> 
                            <div class="media mb-4">
                        <a href="properties-details.php?id=<?php echo $id;?>">
                            <img src="admin/images/property_image/<?php echo $img;?>" alt="sub-property">
                        </a>
                        <div class="media-body align-self-center">
                            <h5>
                                <a href="properties-details.php?id=<?php echo $id;?>"><?php echo $res['title'];?></a>
                            </h5>
                             <p><?php echo $res['address'];?></p>
                            <p> <strong>&#8358;<?php echo $res['price'];?></strong></p>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
            
                </div> 
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                        Useful Links
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="about.php"><i class="fa fa-angle-right"></i>About us</a>
                        </li>
                        <li>
                            <a href="index.php#featured-properties"><i class="fa fa-angle-right"></i>Feautured Properties</a>
                        </li>
                        <li>
                            <a href="properties.php"><i class="fa fa-angle-right"></i>Properties Listing</a>
                        </li>
                        <li>
                            <a href="contact.php"><i class="fa fa-angle-right"></i>Contact Us</a>
                        </li>
                        <li>
                            <a href="admin/index.php" target="_blank"><i class="fa fa-angle-right"></i>Login</a>
                        </li>
            
                    </ul>
                </div>
            </div>
             </div>
        <div class="row mx-0">
            <div class="col-xl-12">
                <p class="copy">
                <a href="https://yusufia-portfolio.vercel.app/" target="_blank">Developed by  Yusufia Bichi</a>
                <a href="tel:+2347068538000">+2347068538000</a><br>
                &copy; <?php echo date("Y");?>Cyclosis Real Estate Management Agent
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->



<!-- External JS libraries -->
<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.selectBox.js"></script>
<script src="assets/js/rangeslider.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.filterizr.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/backstretch.js"></script>
<script src="assets/js/jquery.countdown.js"></script>
<script src="assets/js/jquery.scrollUp.js"></script>
<script src="assets/js/particles.min.js"></script>
<script src="assets/js/typed.min.js"></script>
<script src="assets/js/dropzone.js"></script>
<script src="assets/js/jquery.mb.YTPlayer.js"></script>
<script src="assets/js/leaflet.js"></script>
<script src="assets/js/leaflet-providers.js"></script>
<script src="assets/js/leaflet.markercluster.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/ie-emulation-modes-warning.js"></script>
<!-- Custom JS Script -->
<script  src="assets/js/app.js"></script>

</body>
</html>