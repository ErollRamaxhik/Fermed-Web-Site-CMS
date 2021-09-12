<?php
if(isset($_POST['create_post'])){

    $post_title=escape($_POST['post_title']);
    $post_category_id =escape($_POST['post_category_id']);
    $post_author=escape($_POST['post_author']);
    $post_status=escape($_POST['post_status']);

    $post_image=escape($_FILES['post_image']['name']);
    $post_image_temp=escape($_FILES['post_image']['tmp_name']);

    $post_tags=escape($_POST['post_tags']);
    $post_content =escape($_POST['post_content']);
    $post_date =escape(date('d-m-y'));
    //  $post_comment_count = 4;
    $post_content =escape($_POST['post_content']);

    //Userin pc den ali hem atay bizim servere resimi
    move_uploaded_file($post_image_temp,"../images/$post_image");


    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) VALUES($post_category_id,'$post_title','$post_author',now(),'$post_image','$post_content','$post_tags',0,'$post_status')";

    //post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status
    $create_post_query=mysqli_query($connection,$query);

    confirm($create_post_query);
    
    $post_id=mysqli_insert_id($connection);
    
    echo "<div class='alert alert-success' role='alert'>
    <strong>Post created!</strong> <a href='../post.php?p_id={$post_id}'>View Post</a> or 
    <a href='posts.php'>View All Posts</a>
    </div>";



}

?>

<div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" name="post_title" id="title">
        </div>

<!--        <label for="post_category" class="label">Post Category</label>-->
        <div class="form-group">
            <select class="form-select" name="post_category_id" id="">
               <option value="">Select Category</option>
                <?php
                $query="SELECT * FROM categories";
                $select_category_id=mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($select_category_id)){

                    $category_id=$row['category_id'];
                    $category_title=$row['category_title'];

                    echo "<option value='$category_id'>$category_title</option>";

                } 
                ?>                        
            </select>
        </div>
        
        <div class="form-group">
            <select class="form-select" name="post_author" id="">
               <option value="">Select Author</option>
                <?php
                $query="SELECT * FROM users";
                $select_users=mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($select_users)){

                    $user_fullname=$row['user_fullname'];

                    echo "<option value='$user_fullname'>$user_fullname</option>";

                } 
                ?>                        
            </select>
        </div>

<!--
        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" class="form-control" name="post_author">
        </div>
-->

<!--        <label for="post_status" class="label">Post Status</label>-->
        <div class="form-group">
            <select name="post_status" id="" class="form-select">
               <option value="">Select Status</option>
                <option value="Published">Publish</option>
                <option value="Draft">Draft</option>
            </select>
        </div>

        <label for="post_image" class="label" >Post Image</label>
        <div class="form-group">
            <input type="file"  name="post_image" id="post_image" class="form-control">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>

        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
        </div>
    </form>
</div>