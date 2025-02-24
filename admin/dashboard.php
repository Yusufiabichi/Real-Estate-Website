<?php include('include/header.php');
?>
    <!-- Header -->
	
    <section>
       
	   <!-- Left Sidebar -->
<?php include('include/sidebar.php');
?>
        <!-- #END# Left Sidebar --> 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <div class="row clearfix">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body">
                            <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                 data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                 data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                 data-fill-Color="rgba(0, 188, 212, 0)">
                                Welcome to Cyclosis Real Estate Management Dashboard<br>
                                

                            </div>
                            <ul class="dashboard-stat-list">
                               <li>You can choose actions in the option menu: </li>
                                <li>
                                    Profile
                                </li>
                                <li>
                                    Users
                                </li>
                                <li>
                                    Users Message on Properties 
                                </li>
                                <li>
                                    Contact Messages
                                </li>
                                <li>
                                    Signout
                                </li>
                            
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
            </div>
        </div>
    </section>
<?php include'include/footer.php';?>
	
    