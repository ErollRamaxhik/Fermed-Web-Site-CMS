<?php
if(isset($_POST['create_user'])){

    $user_fullname = $_POST['user_fullname'];
    $user_name=$_POST['user_name'];

//    $post_image=$_FILES['post_image']['name'];
//    $post_image_temp=$_FILES['post_image']['tmp_name'];

    $user_role=$_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //  $post_comment_count = 4;
    
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('count' => 12));
    //Userin pc den ali hem atay bizim servere resimi
    //move_uploaded_file($post_image_temp,"../images/$post_image");

    
    $query = "INSERT INTO users(user_name,user_password,user_fullname,user_email,user_role) VALUES('$user_name','$user_password','$user_fullname','$user_email','$user_role')";

    //post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status
    $create_user_query=mysqli_query($connection,$query);

    confirm($create_user_query);
    
    echo "<div class='alert alert-success' role='alert'>
    <strong>User created!</strong> <a href='users.php'>View Users</a>
    </div>";



}

?>

<div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" name="user_fullname" id="fullname">
        </div>

        <div class="form-group">
            <select class="form-select" name="user_role" id="">
               <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="Subscriber">Subscriber</option>                       
            </select>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="user_name" id="username" >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="user_email" id="email" >
        </div>

        <div class="form-group">
            <label for="password" class="label" >Password</label>
            <input type="password" class="form-control"  name="user_password" id="password">
        </div>


        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
        </div>
    </form>
</div>