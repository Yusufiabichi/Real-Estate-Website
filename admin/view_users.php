<?php include('include/header.php');?>
      
      <script type="text/javascript">

function delet(id)
{
if(confirm("you want to delete ?"))
{
window.location.href='delete_user.php?x='+id;
}
}

</script>
<!-- Header -->

<section>
 
 <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
  <!-- #END# Left Sidebar -->
  <section class="content">
              <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <a class="btn btn-info" href="add_user.php">Add User</a>
                      <h2 style="text-align: center;">
                       View Users
                      </h2>
                  </div>
                  <div class="body">
                      <div class="table-responsive">
                          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                              <thead>
                                 <tr>
                                      <th>S.no</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tfoot>


                                  <tr>
                                      <th>S.no</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Action</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                  <?php
                                  $i=1;
include'include/config.php';

$query=mysqli_query($con,"select * from admin");
while($res=mysqli_fetch_array($query))
{
$id=$res['id'];
?>

                                  <tr>
                                      <td><?php echo $i++; ?></td>
                                      <td><?php echo $res['name'];?></td>
                                      <td><?php echo $res['email'];?></td>
                                      <td>
                                      <a class='btn btn-danger' onclick="delet(<?php echo $id;?>);" ><span class="glyphicon glyphicon-remove" style="color:white;"></span></a>
                                      </td>
                                </tr>
                             <?php } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</section>
      <?php include'include/footer.php';?>


                          