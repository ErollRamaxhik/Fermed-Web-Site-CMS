<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="index.php" class="navbar-brand">Fermed</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php echo ($page == "index.php" ? "active" : "")?>">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a href="blog.php" class="nav-link <?php echo ($page == "blog.php" ? "active" : "")?>">Blog</a>
                    </li>
                    <li class="nav-item ">
                        <a href="products.php" class="nav-link <?php echo ($page == "products.php" ? "active" : "")?>">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  <?php echo ($page == "candidates.php" ? "active" : "")?> <?php echo ($page == "jobpostings.php" ? "active" : "")?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Career
                        </a>
                        <ul class="mt-2 dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item nav-link bg-dark <?php echo ($page == "candidates.php" ? "active" : "")?>" href="candidates.php">Candidates</a></li>
                            <li><a class="dropdown-item nav-link bg-dark <?php echo ($page == "jobs.php" ? "active" : "")?>" href="jobs.php">Job Postings</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="contactus.php" class="nav-link <?php echo ($page == "contactus.php" ? "active" : "")?>">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>