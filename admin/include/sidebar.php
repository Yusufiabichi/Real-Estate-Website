     <style>
		i{
			color:indigo;
		}
		
	 </style>

     <?php
     require 'config.php';
     require 'authentication.php';
$email = $_SESSION["Email"];
$query=mysqli_query($con,"select * from admin where email='$email'");
$res1=mysqli_fetch_array($query);
  $name=$res1['name'];
     ?>

		<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $name;?></div>
                    <div class="email"><?php echo $email;?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" id="admin-dropdown" aria-haspopup="true" aria-expanded="true">
                            <h4 style="color: white; !important"> Options</h4>
                        </i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile.php"><i class="material-icons"></i>Profile</a></li>
                            <li><a href="view_users.php"><i class="material-icons"></i>Agents</a></li>
                            <li><a href="users_message.php"><i class="material-icons"></i>Users Message on Properties</a></li>
                            <li><a href="contact_message.php"><i class="material-icons"></i>Messages from clients</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons"></i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li>
                        <a href="dashboard.php" class="menu-toggle">
                            <i class="material-icons"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="add_property.php" class="menu-toggle">
                            <i class="material-icons"></i>
                            <span>Add Property</span>
                        </a>
                    </li>

                     <li>
                        <a href="view_property_image.php" class="menu-toggle">
                            <i class="material-icons"></i>
                            <span>Add Property Images</span>
                        </a>
                    </li>


                    <li>
                        <a href="view_property.php" class="menu-toggle">
                            <i class="material-icons"></i>
                            <span>View Property</span>
                        </a>
                    </li>
									                    
                    <li>
                        <a href="add_user.php" class="menu-toggle">
                            <i class="material-icons"></i>
                            <span>Add Admin</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            
			<!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy;<?php echo date("Y");?>Cyclosis Real Estate Management
                </div>
            </div>
            <!-- #Footer -->
        </aside>