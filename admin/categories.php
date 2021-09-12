<?php include "includes/admin_header.php"; ?>

<!-- Navbar and Side Bar (Navigation)-->
<?php include"includes/admin_navigation.php";  ?>



<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Wellcome to Admin</h1>


            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>
            <div class="row">

                <div class="col-sm-6">
                    <!-- ADD CATEGORY -->
                    <?php addCategories(); ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label class="h5" for="category_title">Category Name</label>
                            <input class="form-control" type="text" name="category_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>
                    <!-- UPDATE AND INCLUDE CATEGORY-->
                    <?php
                    if(isset($_GET['update'])){

                        $category_id=$_GET['update'];

                        include "includes/update_categories.php";
                    }    
                    ?>
                </div>

                <div class="col-sm-6">


                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Category Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--FIND ALL CATEGORIES AND DISPLAY-->
                            <?php findAllCategories() ?> 
                            <!--DELETE CATEGORIES AND REFRESH PAGE-->
                            <?php deleteCategories(); ?>

                        </tbody>
                    </table>

                </div>

            </div>


        </div>
    </main>
    <?php
    include "includes/admin_footer.php";
    ?>