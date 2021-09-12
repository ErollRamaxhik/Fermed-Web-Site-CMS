<?php include "includes/admin_header.php"; ?>

<!-- Navbar and Side Bar (Navigation)-->
<?php include"includes/admin_navigation.php";  ?>

<?php
if(isset($_SESSION['user_name'])){
    
    $user_name= $_SESSION['user_name'];
    
    $query = "SELECT * FROM users WHERE user_name='{$user_name}'";
    
    $user_profile_query = mysqli_query($connection,$query);
    
    $row=mysqli_fetch_array($user_profile_query);
    
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_password=$row['user_password'];
    $user_fullname=$row['user_fullname'];
    $user_email=$row['user_email'];
    $user_image=$row['user_image'];
    $user_role=$row['user_role'];
}

?>

<?php
    $success=0;
if(isset($_POST['update_profile'])){
    
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
        $success=1;
        confirm($update_user);
    }else if(empty($user_password)){
        $query="UPDATE users SET user_fullname='$user_fullname', user_role='$user_role', user_name='$user_name', user_email='$user_email' WHERE user_id=$user_id";

        $update_user = mysqli_query($connection,$query);
        $success=1;
    }


}

?>



<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid">
            <h1 class="mt-4">Wellcome to Admin</h1>


            <hr>

            
        </div>
        <div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" name="user_fullname" id="fullname" value="<?php echo $user_fullname; ?>">
        </div>

        <div class="form-group">
            <select class="form-select" name="user_role" id="">
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
            <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
        </div>
        <?php if($success==1):?>
         <div class="alert alert-success" role="alert">
          Profile Updated Successfully!
        </div>
        <?php endif;?>
    </form>
</div>

    </main>
    <?php
    include "includes/admin_footer.php";
    ?>