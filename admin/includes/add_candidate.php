<?php
if(isset($_POST['create_candidate'])){
    global $connection;

     $stmt= mysqli_prepare($connection,"INSERT INTO candidates(candidate_fullname,candidate_gender,candidate_birthdate,candidate_email,candidate_phone,candidate_location,candidate_image,candidate_education,candidate_branch,candidate_profile) VALUES(?,?,?,?,?,?,?,?,?,?)");
     $candidate_image=($_FILES['candidate_image']['name']);
     $candidate_image_temp=$_FILES['candidate_image']['tmp_name'];

    mysqli_stmt_bind_param($stmt,'ssssssssss',$_POST['candidate_fullname'],$_POST['candidate_gender'],$_POST['candidate_birthdate'],$_POST['candidate_email'],$_POST['candidate_phone'],$_POST['candidate_location'],$candidate_image,$_POST['candidate_education'],$_POST['candidate_branch'],$_POST['candidate_profile']);
    mysqli_execute($stmt);  
    move_uploaded_file($candidate_image_temp,"../images/$candidate_image");
    mysqli_stmt_close($stmt);

    //Userin pc den ali hem atay bizim servere resimi
    
    
    echo "<div class='alert alert-success' role='alert'>
    <strong>Post created!</strong> <a href='#'>View Candidate</a> or 
    <a href='posts.php'>View All Posts</a>
    </div>";



}

?>

<div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="candidate_fullname">Full Name</label>
            <input type="text" class="form-control" name="candidate_fullname">
        </div>

        <div class="form-group">
            <select name="candidate_gender" id="" class="form-select">
               <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="candidate_birthdate">Birth Date</label>
            <input type="date" class="form-control" name="candidate_birthdate">
        </div>

        <div class="form-group">
            <label for="candidate_email">Email</label>
            <input type="email" class="form-control" name="candidate_email">
        </div>

        <div class="form-group">
            <label for="candidate_phone">Phone</label>
            <input type="text" class="form-control" name="candidate_phone">
        </div>

        <div class="form-group">
            <label for="candidate_location">Location</label>
            <input type="text" class="form-control" name="candidate_location">
        </div>

        <label for="candidate_image" class="label" >Profile Image</label>
        <div class="form-group">
            <input type="file"  name="candidate_image" id="post_image" class="form-control">
        </div>

        <div class="form-group">
            <label for="candidate_education">Education</label>
            <input type="text" class="form-control" name="candidate_education">
        </div>
        
        <div class="form-group">
            <label for="candidate_branch">Profession</label>
            <input type="text" class="form-control" name="candidate_branch">
        </div>

        <div class="form-group">
            <label for="candidate_profile">Candidate Background</label>
            <textarea class="form-control" id="editor" name="candidate_profile" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_candidate" value="Publish Candidate">
        </div>
    </form>
</div>