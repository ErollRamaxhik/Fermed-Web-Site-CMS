<!DOCTYPE html>
<html lang="en">

<?php include "includes/db.php";?>
<?php include "includes/head.php";?>

<body>
   

    <!--NAVBAR SECTION-->

    <?php $page="blog.php";?>
    <?php include "includes/navigation.php";?>

    <!--PAGE HEADER-->

    <header id="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <h1>Read Our Blog</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, eaque!</p>
                </div>
            </div>
        </div>
    </header>
    
    <!--CATEGORY SIDEBAR-->
    <div class="container">
        <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
        <?php include "includes/categorysidebar.php";?>
        </nav>
        </div>
    </div>
    <hr>

    <!--BLOG SECTION-->

    <section id="blog" class="py-5">
        <div class="container" >
            <div id="row" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 " data-masonry='{"percentPosition": true }'>

            <?php
                $query = "SELECT * FROM posts LEFT JOIN categories ON post_category_id=category_id ORDER BY post_id DESC";
                $all_posts=mysqli_query($connection,$query);
                
                while($row=mysqli_fetch_assoc($all_posts)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_image = $row['post_image'];
                    $post_date = $row['post_date'];
                    $post_author = $row['post_author'];
                    $post_views = $row['post_views'];
                    $category_title = $row['category_title'];
                    
                
            ?>

                <div class="col">
                    
                        <div class="card" style="overflow:hidden;">
                            <a class="text-decoration-none text-dark shadow-none" href="post.php?p_id=<?php echo $post_id?>">
                            <div class="category_name"><?php echo $category_title;?></div>
                            <div class="post_views text-muted"><i class="fas fa-eye"></i> <?php echo $post_views;?></div>
                            <img src="images/<?php echo $post_image;?>" class="card-img-top image-strech" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $post_title;?></h5>
                                
                            </div>
                            </a>
                            <div class="card-footer text-muted d-flex justify-content-between">
                                <div><i class="fas fa-calendar-alt"> </i><?php echo " ". $post_date;?></div>
                                <div>
                                    <i class="fas fa-user"></i> 
                                    <a class="text-decoration-none text-secondary" href="author.php?author=<?php echo $post_author;?>"><?php echo " ". $post_author;?></a>
                                </div>
                            </div>
                            
                        </div>
                </div>

          <?php } ?>
  
            </div>
        </div>
    </section>


    <!--FOOTER-->

    <?php include"includes/footer.php"; ?>

</body>

</html>