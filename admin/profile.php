<?php 
include('include/header.php');
include'include/config.php';
include('include/sidebar.php');
extract($_REQUEST);
$query=mysqli_query($con,"select * from admin where email='$email'");
$res=mysqli_fetch_array($query);
$id=$res['id'];
$name=$res['name'];
$password=$res['password'];

if(isset($submit))
{  
  $query="update admin set name = '$name', password = '$password' where email = '$email'";  
  $r=mysqli_query($con,$query);

if($r)
{
  $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> You  successful updated your profile.
  </div>';    
}
else
{
$msg='<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Sorry!</strong>Your profile was NOT updated something went wrong.
  </div>';

}        
}

?>  
    <!-- Header -->
    
    <section>
       
       <!-- Left Sidebar -->

        <!-- #END# Left Sidebar -->
        <section class="content">
        <div class="container-fluid">
            <?php echo @$msg;?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Profile  
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="name" class="form-control" value="<?php echo $name;?>">
                                                <label class="form-label">Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="email" name="email" class="form-control" value="<?php echo $email;?>">
                                                <label class="form-label">Email</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="password" name="password" class="form-control" value="<?php echo $password;?>">
                                                <label class="form-label">Password</label>
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