<?php
if(isset($_POST['create_job'])){
    global $connection;

     $stmt= mysqli_prepare($connection,"INSERT INTO jobs(job_title,job_employer,job_position,job_date,job_deadline,job_location,job_time,job_phone,job_email,job_description) VALUES(?,?,?,now(),?,?,?,?,?,?)");

    mysqli_stmt_bind_param($stmt,'sssssssss',$_POST['job_title'],$_POST['job_employer'],$_POST['job_position'],$_POST['job_deadline'],$_POST['job_location'],$_POST['job_time'],$_POST['job_phone'],$_POST['job_email'],$_POST['job_description']);
    mysqli_execute($stmt);  
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
            <label for="job_title">Job Title</label>
            <input type="text" class="form-control" name="job_title">
        </div>

        <div class="form-group">
            <label for="job_employer">Employer</label>
            <input type="text" class="form-control" name="job_employer">
        </div>

        <div class="form-group">
            <label for="job_position">Position</label>
            <input type="text" class="form-control" name="job_position">
        </div>

        <div class="form-group">
            <label for="job_deadline">Deadline</label>
            <input type="date" class="form-control" name="job_deadline">
        </div>

        <label for="job_location" class="label" >Location</label>
        <div class="form-group">
            <input type="text"  name="job_location" class="form-control">
        </div>

        <div class="form-group">
            <select name="job_time" id="" class="form-select">
               <option value="">Select Work Time</option>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
            </select>
        </div>

        <label for="job_phone" class="label" >Phone</label>
        <div class="form-group">
            <input type="text"  name="job_phone" class="form-control">
        </div>

        <label for="job_email" class="label" >Email</label>
        <div class="form-group">
            <input type="email"  name="job_email" class="form-control">
        </div>

        <div class="form-group">
            <label for="job_description">Job Description</label>
            <textarea class="form-control" id="editor" name="job_description" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_job" value="Publish Job">
        </div>
    </form>
</div>