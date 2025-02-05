<?php include('include/header.php');?>
      
      <script type="text/javascript">

function delet(id)
{
if(confirm("you want to delete ?"))
{
window.location.href='delete_user_message.php?x='+id;
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
                  <div class="header mt-4">
                      <h2 style="text-align: center;">
                       Users Messages on Properties
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
                                      <th>Phonenumber</th>
                                      <th>Message</th>
                                      <th>PropertyName</th>
                                      <th>PropertyAddress</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tfoot>


                                  <tr>
                                      <th>S.no</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Phonenumber</th>
                                      <th>Message</th>
                                      <th>PropertyName</th>
                                      <th>PropertyAddress</th>
                                      <th>Action</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                  <?php
                                  $i=1;
include'include/config.php';

$query=mysqli_query($con,"select * from propertiescontact");
while($res=mysqli_fetch_array($query))
{
$id=$res['Id'];
?>

                                  <tr>
                                      <td><?php echo $i++; ?></td>
                                      <td><?php echo $res['Name'];?></td>
                                      <td><?php echo $res['Email'];?></td>
                                      <td><?php echo $res['Phonenumber'];?></td>
                                      <td><?php echo $res['Message'];?></td>
                                      <td><?php echo $res['PropertyName'];?></td>
                                      <td><?php echo $res['PropertyAddress'];?></td>
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


                          