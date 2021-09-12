<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Fermed Admin</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Home Page</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
                <?php
                if(isset($_SESSION['user_name'])){
                    echo $_SESSION['user_name'];
                }
                ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../includes/logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>

<!-- SideBar -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">


                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-globe-europe"></i></div>
                        Users Online: <?php echo users_online();?>
                    </a>
                    
                    <!--
                     <a class="nav-link usersonline" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-globe-europe"></i></div>
                        Users Online: <span class="usersonline"></span>
                    </a>-->

                    <div class="sb-sidenav-menu-heading">Blog</div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posts_dropdown" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        Posts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="posts_dropdown" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="posts.php">View All Posts</a>
                            <a class="nav-link" href="posts.php?source=add_post">Add Post</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users_dropdown" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                        Users
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="users_dropdown" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="users.php">View All Users</a>
                            <a class="nav-link" href="users.php?source=add_user">Add User</a>
                        </nav>
                    </div>

                    <a class="nav-link" href="comments.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                        Comments
                    </a>
                    <a class="nav-link" href="categories.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Categories
                    </a>

                    <div class="sb-sidenav-menu-heading">Career</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#candidates_dropdown" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        Candidates
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="candidates_dropdown" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="candidates.php">View All Candidates</a>
                            <a class="nav-link" href="candidates.php?source=add_candidate">Add Candidate</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jobs_dropdown" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                        Jobs
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="jobs_dropdown" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="jobs.php">View All Jobs</a>
                            <a class="nav-link" href="jobs.php?source=add_job">Add Job</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products_dropdown" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-pen"></i></div>
                        Products
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="products_dropdown" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="products.php">View All Products</a>
                            <a class="nav-link" href="products.php?source=add_product">Add Product</a>
                        </nav>
                    </div>

                    <a class="nav-link" href="profile.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                        Profile
                    </a>


                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $_SESSION['user_name']; ?>
            </div>
        </nav>
    </div>
