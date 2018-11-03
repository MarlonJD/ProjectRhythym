<div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>Zero Day<h3>Music Portal</h3></h1>
                
            </div>

            <ul class="list-unstyled components">
                <p>Welcome, <?php echo $_SESSION['username']; ?></p>
                <li>
                    <a href="<?php echo base_url('main/'); ?>"><i class="fas fa-chart-line"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo base_url('main/Distribution'); ?>"><i class="fas fa-layer-group"></i> Distribution</a>
                </li>
                <li>
                    <a href="<?php echo base_url('main/ContentID'); ?>"><i class="fab fa-youtube"></i> Youtube Content ID</a>
                </li>
                <li>
                    <a href="<?php echo base_url('main/Earning'); ?>"><i class="fas fa-hand-holding-usd"></i> Earnings</a>
                </li>
                <li>
                    <a href="<?php echo base_url('user/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
            <div class="sidebar-footer text-center">
                <h6><span>&copy;</span> 2018 Zero Day Music Portal</h6>
                <ul class="list-unstyled CTAs">
                    <li class="list-inline-item"><a href="<?php echo base_url('main/Privacy'); ?>"">Privacy</a></li>
                    <li class="list-inline-item"><a href="mailto:support@zerodaymusicgroup.com" target="_top">Support</a></li>
                </ul>
            </div>
        </nav>


        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <?php foreach($links as $row) { ?>
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo "//".$row->link; ?>"><?php echo $row->title; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
            
