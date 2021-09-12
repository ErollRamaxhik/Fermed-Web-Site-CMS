<?php

if(isset($_GET['p_id'])){

    $post_id_update=$_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id='$post_id_update'";
    $select_posts_by_id=mysqli_query($connection,$query);

    $row=mysqli_fetch_assoc($select_posts_by_id);

    $post_id=$row['post_id'];
    $post_author=$row['post_author'];
    $post_title=$row['post_title'];
    $post_category_id=$row['post_category_id'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_date=$row['post_date'];
    $post_content=$row['post_content'];

}

if(isset($_POST['update_post'])){

    $post_title=$_POST['post_title'];
    $post_category_id=$_POST['post_category_id'];
    $post_author=$_POST['post_author'];
    $post_status=$_POST['post_status'];
    $post_image= $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];

    move_uploaded_file($post_image_temp,"../images/$post_image");

    if(empty($post_image)){
        $query="SELECT post_image FROM posts WHERE post_id=$post_id_update";

        $select_image = mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($select_image);

        $post_image=$row['post_image'];
    }

    $query="UPDATE posts SET post_title='$post_title', post_category_id=$post_category_id, post_author='$post_author', post_status='$post_status', post_date=now(), post_content='$post_content', post_image='$post_image', post_tags='$post_tags' WHERE post_id=$post_id_update";

    $update_post = mysqli_query($connection,$query);

    confirm($update_post);
    
    echo "<div class='alert alert-success' role='alert'>
    <strong>Post updated!</strong> <a href='../post.php?p_id={$post_id_update}'>View Post</a> or <a href='posts.php'>View All Posts</a>
    </div>";

}

?>
<!--Alisik hepisini hem valuelerine ekleysik ne isteysik update edelim-->
<div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="post_title" id="title" value="<?php echo $post_title; ?>">
        </div>

        <div class="form-group">
            <select class="form-select" name="post_category_id" id="">
                <?php
                $query = "SELECT * FROM categories WHERE category_id=$post_category_id";
                $select_category_name = mysqli_query($connection,$query);
                $row=mysqli_fetch_assoc($select_category_name);
                $post_category_title = $row['category_title'];
                ?>
               <option value="<?php echo $post_category_id;?>"><?php echo $post_category_title;?></option>
                <?php
                $query="SELECT * FROM categories";
                $select_category_id=mysqli_query($connection,$query);
                $category_title = $post_category_title;
                while($row=mysqli_fetch_assoc($select_category_id)){
                    
                    $category_id=$row['category_id'];
                    $post_category_title=$row['category_title'];
                    if($category_title!=$post_category_title){
                        echo "<option value='$category_id'>$post_category_title</option>";
                    }
                    
                } 
                ?>                        


            </select>
        </div>

        <div class="form-group">
           <select class="form-select" name="post_author" id="" aria-label="Default select example">
              <option value="<?php echo $post_author;?>"><?php echo $post_author;?></option>
              <?php
                
                $users_query = "SELECT * FROM users";
                $select_users=mysqli_query($connection,$users_query);
                $user=$post_author;
               
               while($row=mysqli_fetch_assoc($select_users)){
                    
                    $post_author=$row['user_fullname'];
                    if($post_author!=$user){
                        
                     echo "<option value='$post_author'>$post_author</option>";
                   }
               }
                ?>                 
            </select> 
        </div>
        
        <div class="form-group">
            <select name="post_status" class="form-select">
                <option value="<?php echo $post_status;?>"><?php echo $post_status;?></option>
                
                <?php
                if($post_status=='Published'){
                    echo "<option value='Draft'>Draft</option>";
                }else{
                    echo "<option value='Published'>Publish</option>";
                }
                
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <img width="100" src="../images/<?php echo $post_image;?>" alt="Post-Image">
            <input type="file"  name="post_image" id="post_image">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
        </div>

        <div class="form-group">
            <label for="post_content">Post Title</label>
            <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10"><?php echo $post_content; ?></textarea>

        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
        </div>
    </form>
</div>