<?php include('include/header.php'); ?>

<!-- Header -->
<style>
    span {
        color: red;
        font-weight: bold;
    }
</style>

<section>
    <!-- Left Sidebar -->
    <?php 
    include('include/sidebar.php'); 
    include('include/config.php');

    // Initialize counts
    $adminCount = 0;
    $inquiryCount = 0;
    $propertiesCount = 0;
    $propertiesContact = 0;

    // Get admin count
    $sql = "SELECT COUNT(*) as total FROM admin";
    $res = $con->query($sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $adminCount = $row['total'];
    }

    // Get inquiry count
    $sql = "SELECT COUNT(*) as total FROM inquiry";
    $res = $con->query($sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $inquiryCount = $row['total'];
    }

    // Get Properties count
    $sql = "SELECT COUNT(*) as total FROM property";
    $res = $con->query($sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $propertiesCount = $row['total'];
    }

    // Get Properties Contact
    $sql = "SELECT COUNT(*) as total FROM propertiescontact";
    $res = $con->query($sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $propertiesContact = $row['total'];
    }

    // Close connection
    $con->close();
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
                            <div class="sparkline" data-type="line" data-spot-Radius="4" 
                                 data-highlight-Spot-Color="rgb(233, 30, 99)" 
                                 data-highlight-Line-Color="#fff" data-min-Spot-Color="rgb(255,255,255)" 
                                 data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                 data-offset="90" data-width="100%" data-height="92px" 
                                 data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                 data-fill-Color="rgba(0, 188, 212, 0)">
                                <h4>Welcome to Cyclosis Real Estate Management Dashboard</h4><br>
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>Data Visual Dashboard:</li>
                                <li>Admins: <span><?php echo $adminCount; ?></span></li>
                                <li>Properties: <span><?php echo $propertiesCount; ?></span></li>
                                <li>Users Message on Properties: <span><?php echo $propertiesContact; ?></span></li>
                                <li>Contact Messages: <span><?php echo $inquiryCount; ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
            </div>
        </div>
    </section>

<?php include('include/footer.php'); ?>
