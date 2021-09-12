<?php
if(isset($_GET['update_job'])){

    $job_id = $_GET['update_job'];
     $stmt= mysqli_prepare($connection,"SELECT job_title,job_employer,job_position,job_date,job_deadline,job_location,job_time,job_phone,job_email,job_description FROM jobs WHERE job_id=?");
     mysqli_stmt_bind_param($stmt,'i',$job_id);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_bind_result($stmt,$job_title,$job_employer,$job_position,$job_date,$job_deadline,$job_location,$job_time,$job_phone,$job_email,$job_description);
     mysqli_stmt_fetch($stmt);
     mysqli_stmt_close($stmt);

}

if(isset($_POST['update_job'])){

    $stmt= mysqli_prepare($connection,"UPDATE jobs SET job_title=?,job_employer=?,job_position=?,job_date=?,job_deadline=?,job_location=?,job_time=?,job_phone=?,job_email=?,job_description=? WHERE job_id=?");
    mysqli_stmt_bind_param($stmt,'ssssssssssi',$_POST['job_title'],$_POST['job_employer'],$_POST['job_position'],$_POST['job_date'],$_POST['job_deadline'],$_POST['job_location'],$_POST['job_time'],$_POST['job_phone'],$_POST['job_email'],$_POST['job_description'],$job_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<div class='alert alert-success' role='alert'>
    <strong>Post updated!</strong> <a href='../jobs.php?p_id={$job_id}'>View Job</a> or <a href='jobs.php'>View All Posts</a>
    </div>";

}

?>

<div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" class="form-control" name="job_title" value="<?php echo $job_title;?>">
        </div>

        <div class="form-group">
            <label for="job_employer">Employer</label>
            <input type="text" class="form-control" name="job_employer" value="<?php echo $job_employer;?>">
        </div>

        <div class="form-group">
            <label for="job_position">Position</label>
            <input type="text" class="form-control" name="job_position" value="<?php echo $job_position;?>">
        </div>

        <div class="form-group">
            <label for="job_date">Date</label>
            <input type="date" class="form-control" name="job_date" value="<?php echo $job_date;?>">
        </div>

        <div class="form-group">
            <label for="job_deadline">Deadline</label>
            <input type="date" class="form-control" name="job_deadline" value="<?php echo $job_deadline;?>">
        </div>

        <label for="job_location" class="label" >Location</label>
        <div class="form-group">
            <input type="text"  name="job_location" class="form-control" value="<?php echo $job_location;?>">
        </div>

        <div class="form-group">
            <select name="job_time" id="" class="form-select">
               <option value="<?php echo $job_time;?>"><?php echo $job_time;?></option>
                <?php
               if($job_time=='Full Time'){
                    echo '<option value="Part Time">Part Time</option>';
               }else{
                   echo '<option value="Full Time">Full Time</option>';
               }
               ?>
            </select>
        </div>

        <label for="job_phone" class="label" >Phone</label>
        <div class="form-group">
            <input type="text"  name="job_phone" class="form-control" value="<?php echo $job_phone;?>">
        </div>

        <label for="job_email" class="label" >Email</label>
        <div class="form-group">
            <input type="email"  name="job_email" class="form-control" value="<?php echo $job_email;?>">
        </div>

        <div class="form-group">
            <label for="job_description">Job Description</label>
            <textarea class="form-control" id="editor" name="job_description" cols="30" rows="10" ><?php echo $job_description;?></textarea>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_job" value="Update Job">
        </div>
    </form>
</div>