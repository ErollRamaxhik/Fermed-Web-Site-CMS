
<!DOCTYPE html>
<html lang="en">
    <?php include"includes/db.php"?>
    <?php include "includes/head.php";?>

        <!-- Navigation -->
        <?php include "includes/navigation.php"?>

        <!--PAGE HEADER-->

        <header id="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto text-center">
                        <h1>Post</h1>
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

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                

                    <?php
                    if(isset($_GET['p_id'])){
                        global $connection;
                        $post_id=$_GET['p_id'];
                        
                        $query_view="UPDATE posts SET post_views = post_views + 1 WHERE post_id = $post_id";
                        $update_query = mysqli_query($connection,$query_view);
                        
                        //kontrol edeym session baslamis mi se sessioni curmeydi o yuzden lazim baslatirmak
                       /* if (session_status() == PHP_SESSION_NONE) session_start();
                        if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='Admin'){
                            $query="SELECT * FROM posts WHERE post_id=$post_id";
                        }else{
                              $query="SELECT * FROM posts WHERE post_id=$post_id";
                        }*/
                        
                         $query="SELECT * FROM posts WHERE post_id=$post_id";


                        $select_query=mysqli_query($connection,$query);

                        $row=mysqli_fetch_array($select_query);
                        
                        
                        
                        if(!empty($row)){

                        $post_id=$row['post_id'];    
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_views = $row['post_views'];


    
                    ?>
                    <!-- Title -->
                    <h1 class="text-center mt-4"><?php echo $post_title;?></h1>
                    <hr>
                    <div class="text-muted d-flex justify-content-between">
                        <!-- Author -->
                        <p class="lead">
                            <a class="text-decoration-none text-secondary" href="author.php?author=<?php echo $post_author;?>">
                                <i class="fas fa-user"></i>
                                <?php echo $post_author;?>
                            </a>
                        </p>

                        <p class="lead">
                            
                                <i class="fas fa-eye"></i>
                                <?php echo $post_views;?>
                            
                        </p>

                        <!-- Date/Time -->
                        <p class="lead"><i class="fas fa-calendar-alt"></i> <?php echo $post_date;?></p>

                    </div>
                    <hr>

                    <div class="col">

                    

                    

                    <!-- Preview Image -->
                    <img class="img-fluid rounded" src="images/<?php echo $post_image;?>" alt="">

                    

                    <!-- Post Content -->

                    <?php echo $post_content;?>

                    <!--                <p class="lead" style="word-wrap: break-word;"><?php echo $post_content;?></p>-->

                    <hr>
                    <?php
                    //session baslamamis ise baslatiri burdan se diger turli bulamay 
                    //if (session_status() === PHP_SESSION_NONE) session_start();
                    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='Admin'){


                        if(isset($_GET['p_id'])){

                            $post_id=$_GET['p_id'];
                            echo "<a href='admin/posts.php?source=update_posts&p_id={$post_id}' class='btn btn-primary'>Update Post</a>";
                        }

                    }


                    ?>


                    <?php
                    }else{
                    echo "<h1 class='p-2'>No Posts Available</h1>";
                    }
                            if(isset($_POST['create_comment'])){

                                $post_id=$_GET['p_id'];

                                $comment_author=$_POST['comment_author'];
                                $comment_email=$_POST['comment_email'];
                                $comment_content=$_POST['comment_content'];

                                if(!empty($comment_author) && !empty($comment_content) && !empty($comment_email)){
                                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($post_id, '$comment_author', '$comment_email', '$comment_content', 'Unapproved', now())";

                                    $create_comment_query = mysqli_query($connection,$query);

                                    if(!$create_comment_query){
                                        die('Query Failed' . mysqli_error($connection)); 
                                    }

                                    //$query="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$post_id";
                                    //$update_comment=mysqli_query($connection,$query);
                                    
                                    echo "<div class='alert alert-success' role='alert'>
                                    <strong>Comment Created waiting for Approval!</strong>
                                    </div>";

                                }else{
                                    echo "<div class='alert alert-danger' role='alert'>
                                    <strong>Fields cannot be empty!</strong>
                                    </div>";
                                }


                            }
                            ?>


                    <?php
                    $query = "SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status='Approved' ORDER BY comment_id DESC";

                    $select_comment_query = mysqli_query($connection,$query);

                    if(!$select_comment_query){
                        die('Query Failed' . mysqli_error($connection));
                    }else{

                        while($row=mysqli_fetch_assoc($select_comment_query)){
                            $comment_author = $row['comment_author'];
                            $comment_content = $row['comment_content'];
                            $comment_date = $row['comment_date'];
                    ?>
                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $comment_author;?>
                                <small class='text-muted'><?php echo $comment_date;?></small>
                            </h5>

                            <?php echo $comment_content;?>
                        </div>
                    </div>
                    <?php 
                        } 
                    } 
                    
                    }else{
                        header("Location: index.php");
                    }
                    ?>

                    </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

       <!--FOOTER-->

        <?php include "includes/footer.php";?>

    </body>

</html>
