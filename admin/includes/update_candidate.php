<?php
if(isset($_GET['update_candidate'])){

    $candidate_id = $_GET['update_candidate'];
     $stmt= mysqli_prepare($connection,"SELECT candidate_fullname,candidate_gender,candidate_birthdate,candidate_email,candidate_phone,candidate_location,candidate_image,candidate_education,candidate_branch,candidate_profile FROM candidates WHERE candidate_id=?");
     mysqli_stmt_bind_param($stmt,'i',$candidate_id);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_bind_result($stmt,$candidate_fullname,$candidate_gender,$candidate_birthdate,$candidate_email,$candidate_phone,$candidate_location,$candidate_image,$candidate_education,$candidate_branch,$candidate_profile);
     mysqli_stmt_fetch($stmt);
     mysqli_stmt_close($stmt);

}

if(isset($_POST['update_candidate'])){

    $candidate_fullname = $_POST['candidate_fullname'];
    $candidate_gender = $_POST['candidate_gender'];
    $candidate_birthdate = $_POST['candidate_birthdate'];
    $candidate_email = $_POST['candidate_email'];
    $candidate_phone = $_POST['candidate_phone'];
    $candidate_location = $_POST['candidate_location'];
    $candidate_image= $_FILES['candidate_image']['name'];
    $candidate_image_temp = $_FILES['candidate_image']['tmp_name'];
    $candidate_education = $_POST['candidate_education'];
    $candidate_branch = $_POST['candidate_branch'];
    $candidate_profile = $_POST['candidate_profile'];

    if(empty($candidate_image)){
    $stmt2 = mysqli_prepare($connection,"SELECT candidate_image FROM candidates WHERE candidate_id=?");
    mysqli_stmt_bind_param($stmt2,'i',$candidate_id);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_bind_result($stmt2,$candidate_image);
    mysqli_stmt_fetch($stmt2);
    mysqli_stmt_close($stmt2);

    }

    $stmt= mysqli_prepare($connection,"UPDATE candidates SET candidate_fullname=?, candidate_gender=?, candidate_birthdate=?,candidate_email=?,candidate_phone=?,candidate_location=?, candidate_image=?,candidate_education=?, candidate_branch=?, candidate_profile=? WHERE candidate_id=?");
    mysqli_stmt_bind_param($stmt,'ssssssssssi',$candidate_fullname,$candidate_gender,$candidate_birthdate,$candidate_email,$candidate_phone,$candidate_location,$candidate_image,$candidate_education,$candidate_branch,$candidate_profile,$candidate_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<div class='alert alert-success' role='alert'>
    <strong>Post updated!</strong> <a href='../candidates.php?p_id={$candidate_id}'>View Post</a> or <a href='posts.php'>View All Posts</a>
    </div>";

}

?>

<div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="candidate_fullname">Full Name</label>
            <input type="text" class="form-control" name="candidate_fullname" value="<?php echo $candidate_fullname;?>">
        </div>

        <div class="form-group">
            <select name="candidate_gender" id="" class="form-select">
               <option value="<?php echo $candidate_gender;?>"><?php echo $candidate_gender;?></option>
               <?php
               if($candidate_gender=='Male'){
                    echo '<option value="Female">Female</option>';
               }else{
                   echo '<option value="Male">Male</option>';
               }
               ?>
                
                
            </select>
        </div>

        <div class="form-group">
            <label for="candidate_birthdate">Birth Date</label>
            <input type="date" class="form-control" name="candidate_birthdate" value="<?php echo $candidate_birthdate;?>">
        </div>

        <div class="form-group">
            <label for="candidate_email">Email</label>
            <input type="email" class="form-control" name="candidate_email" value="<?php echo $candidate_email;?>">
        </div>

        <div class="form-group">
            <label for="candidate_phone">Phone</label>
            <input type="text" class="form-control" name="candidate_phone" value="<?php echo $candidate_phone;?>">
        </div>

        <div class="form-group">
            <label for="candidate_location">Location</label>
            <input type="text" class="form-control" name="candidate_location" value="<?php echo $candidate_location;?>">
        </div>

        <div class="form-group">
            <img width="100" src="../images/<?php echo $candidate_image;?>" alt="Candidate-Image">
            <input type="file"  name="candidate_image">
        </div>

        <div class="form-group">
            <label for="candidate_education">Education</label>
            <input type="text" class="form-control" name="candidate_education" value="<?php echo $candidate_education;?>">
        </div>
        
        <div class="form-group">
            <label for="candidate_branch">Profession</label>
            <input type="text" class="form-control" name="candidate_branch" value="<?php echo $candidate_branch;?>">
        </div>

        <div class="form-group">
            <label for="candidate_profile">Candidate Background</label>
            <textarea class="form-control" id="editor" name="candidate_profile" cols="30" rows="10"><?php echo $candidate_profile;?></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_candidate" value="Update Candidate">
        </div>
    </form>
</div>