<?php
if(isset($_GET['update_user'])){
    
    $user_id=$_GET['update_user'];

    $query = "SELECT * FROM users WHERE user_id=$user_id";
    $select_user=mysqli_query($connection,$query);

    $row=mysqli_fetch_assoc($select_user);

    $user_fullname=$row['user_fullname'];
    $user_role=$row['user_role'];
    $user_name=$row['user_name'];
    $user_password=$row['user_password'];
    $user_email=$row['user_email'];
    
    
}



if(isset($_POST['update_user'])){
    
    $user_fullname=$_POST['user_fullname'];
    $user_role=$_POST['user_role'];
    $user_name=$_POST['user_name'];
    $user_password=$_POST['user_password'];
    $user_email=$_POST['user_email'];
    
    
     
//    move_uploaded_file($post_image_temp,"../images/$post_image");
    
//    if(empty($post_image)){
//        $query="SELECT post_image FROM posts WHERE post_id=$post_id_update";
//        
//        $select_image = mysqli_query($connection,$query);
//        $row=mysqli_fetch_assoc($select_image);
//        
//        $post_image=$row['post_image'];
//    }
    if(!empty($user_password)){
        
        $user_password = password_hash($user_password,PASSWORD_BCRYPT, array('cost' => 12));
        
        $query="UPDATE users SET user_fullname='$user_fullname', user_role='$user_role', user_name='$user_name', user_password='$user_password', user_email='$user_email' WHERE user_id=$user_id";

        $update_user = mysqli_query($connection,$query);

        confirm($update_user);
    }else if(empty($user_password)){
        $query="UPDATE users SET user_fullname='$user_fullname', user_role='$user_role', user_name='$user_name', user_email='$user_email' WHERE user_id=$user_id";

        $update_user = mysqli_query($connection,$query);
    }
    
    
    echo "<div class='alert alert-success' role='alert'>
    <strong>User updated!</strong> <a href='users.php'>View Users</a>
    </div>";

}

?>

<div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" name="user_fullname" id="fullname" value="<?php echo $user_fullname; ?>">
        </div>
        <div class="form-group">
            <select name="user_role" id="">
              <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
              <?php
                
                if($user_role=='Admin'){
                    echo "<option value='Subscriber'>Subscriber</option> ";
                }else{
                    echo "<option value='Admin'>Admin</option>";
                }
                
                ?>
               
                
                                      
            </select>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="user_name" id="username" value="<?php echo $user_name; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="user_email" id="email" value="<?php echo $user_email; ?>">
        </div>

        <div class="form-group">
            <label for="password" class="label" >Password</label>
            <input type="password" class="form-control"  name="user_password" id="password" value="">
        </div>


        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
        </div>
    </form>
</div>