<?php include "includes/admin_header.php"; ?>

<!-- Navbar and Side Bar (Navigation)-->
<?php include"includes/admin_navigation.php";  ?>



<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid">
            <h1 class="mt-4">Wellcome to Admin</h1>


            <h1 class="page-header">
                Posts
                <small>Subheading</small>
            </h1>

            <div class="row">
                <div class="col-lg-12">

                    <?php
                    if(isset($_GET['source'])){

                        $source = $_GET['source'];

                    }else{
                        $source="";

                    }


                    switch($source){

                        case 'add_post':
                            include "includes/add_post.php";
                            break;
                        case 'update_posts':
                            include "includes/update_posts.php";
                            break;
                        default:
                            include "includes/view_all_posts.php";
                            break;
                    }

                    ?>

                </div>
            </div>
        </div>

    </main>
    <?php
    include "includes/admin_footer.php";
    ?>