
<?php include('include/header.php');
include ('include/config.php');
?>
<!-- main header end -->

<!-- Banner start -->
<div class="banner banner-bg" id="particles-banner-wrapper">
    <div id="particles-banner"></div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item item-bg active">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-left">
                    <div class="carousel-content container">
                        <div class="t-center">
                            <h2 data-animation="animated fadeInDown delay-05s">Cyclosis Real Estate Management</h2>
                            <p class="text-p" data-animation="animated fadeInUp delay-10s">
                                This is the best place for you to buy any type of house.
                            </p>
                            <a data-animation="animated fadeInUp delay-10s" href="about.php" class="btn btn-lg btn-theme">About Us</a>
                            <a data-animation="animated fadeInUp delay-10s" href="contact.php" class="btn btn-lg btn-white-lg-outline">Contact  Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item-bg">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-left">
                    <div class="carousel-content container">
                        <div class="t-right">
                            <h2 data-animation="animated fadeInDown delay-05s">Find Your Dream Estate Here</h2>
                            <p class="text-p" data-animation="animated fadeInUp delay-10s">
                                This the is the best place for your dream property.
                            </p>
                            <a href="#featured-properties" data-animation="animated fadeInUp delay-10s"  class="btn btn-lg btn-round btn-theme">Featuered Properties</a>
                            <a href="#recent-posts" data-animation="animated fadeInUp delay-10s"  class="btn btn-lg btn-round btn-white-lg-outline">Recent Properties</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item-bg">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-left">
                    <div class="carousel-content container">
                        <div class="t-left">
                            <h2 data-animation="animated fadeInUp delay-05s">Best Place For Buying your Dream House</h2>
                            <p class="text-p" data-animation="animated fadeInUp delay-10s">
                                Explore various houses from diffrent estate.
                            </p>
                            <a data-animation="animated fadeInUp delay-10s" href="properties.php" class="btn btn-lg btn-round btn-theme">Explore</a>
                            <a data-animation="animated fadeInUp delay-10s" href="properties.php" class="btn btn-lg btn-round btn-white-lg-outline">Exclusives</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- banner end -->


<!-- Featured properties start -->
<div class="featured-properties content-area-19" id="featured-properties">
    <div class="container">
        <div class="main-title">
            <h1>Featured Properties</h1>
            <p>These are best featured properties.</p>
        </div>
        <div class="row">
               <?php 
                     include'include/config.php';
                    $query=mysqli_query($con,"select * from property  LIMIT 4");
                    while($res=mysqli_fetch_array($query))
                     {
                            $id=$res['id'];
                            $img=$res['image'];
                   ?>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="card property-box-2">
                
                    <!-- property img -->
                    <div class="property-thumbnail">
                        <a href="properties-details.php?id=<?php echo $id;?>" class="property-img">
                            <img src="admin/images/property_image/<?php echo $img;?>" alt="property-3" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.php?id=<?php echo $id;?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <div class="property-magnify-gallery">
                            <?php 
                                $query1=mysqli_query($con,"select * from images where property_id= $id");
                                 while($row=mysqli_fetch_array($query1))
                               {                                                    
                                ?>
                                <a href="admin/images/property_image/<?php echo $row['image1'];?>" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="admin/images/property_image/<?php echo  $row['image2'];?>" class="hidden"></a>
                                <a href="admin/images/property_image/<?php echo  $row['image3'];?>" class="hidden"></a>
                                <a href="admin/images/property_image/<?php echo $row['image4'];?>" class="hidden"></a>            
                                <?php }?>
                            </div>   
                        </div>
                    </div>
                    <!-- detail -->
                    <div class="detail">
                        <h5 class="title"><a href="properties-details.php?id=<?php echo $id;?>"><?php echo $res['title'];?></a></h5>
                        <h4 class="price">
                            <?php echo $res['price']?>
                        </h4>
                        <p><?php echo $res['description'] ?></p>
                        </div>
                        
                </div>
            </div>
            <?php }?> 
        </div>
    </div>
</div>
<!-- Featured properties end -->

<!-- New Featured properties -->
<div class="articles">
        <article>
            <figure>
                <a href="">
                    <img src="assets/cards-img/lavender-field.jpg" alt="Lavender Fields">
                </a>
                <!-- <div class="property-overlay">
                                new overlay here
                </div> -->
            </figure>
            <div class="article-preview">
                <h2>Lavender Fields</h2>
                <p>
                    1 bedroom bungalow full detache with 1 parlow and two 
                    toilets with BQ.
                </p>
            </div>
        </article>
    </div>
    <!-- New Featured properties end  -->


<!-- Recent Properties start -->
<div class="recent-properties content-area-2" id="recentproperties">
    <div class="container">
        <div class="main-title">
            <h1>Recent Properties</h1>
            <p>These are our recent properties added.</p>
        </div>
        <div class="row">
        <?php 
                    $query=mysqli_query($con,"select * from property  LIMIT 4");
                    while($res=mysqli_fetch_array($query))
                     {
                            $id=$res['id'];
                            $img=$res['image'];
                   ?>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="property-box-8">
                    <div class="property-photo">
                        <img src="admin/images/property_image/<?php echo $res['image'];?>" alt="property-6" class="img-fluid">
                        <div class="date-box">For Sale</div>
                    </div>
                    <div class="detail">
                        <div class="heading">
                            <h3>
                                <a href="properties-details.php?id=<?php echo $res['id'];?>"><?php echo $res['title'];?></a>
                            </h3>
                            <div class="location">
                                <a href="properties-details.php?id=<?php echo $res['id'];?>">
                                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i><?php echo $res['address'];?>                      </a>
                                </a>
                            </div>
                        </div>
                        <div class="properties-listing">
                            
                            <span><?php echo $res['hall'];?> Hall</span>
                            <span><?php echo $res['bathroom'];?>Bathroom</span>
                            <span><?php echo $res['land_area'];?>sqft</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?> 
        </div>
    </div>
</div>
<!-- Recent Properties end -->


<!-- Footer start -->
<?php include('include/footer.php');?>
