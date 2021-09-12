<?php include "includes/admin_header.php"; ?>

<!-- Navbar and Side Bar (Navigation)-->
<?php include"includes/admin_navigation.php";  ?>



<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid">
            <h1 class="mt-4">Wellcome to Admin</h1>


            <h1 class="page-header">
                Jobs
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

                        case 'add_product':
                            include "includes/add_product.php";
                            break;
                        case 'update_product':
                            include "includes/update_product.php";
                            break;
                        default:
                            include "includes/view_all_products.php";
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