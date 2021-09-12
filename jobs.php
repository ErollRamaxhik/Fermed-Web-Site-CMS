<!DOCTYPE html>
<html lang="en">

<?php include "includes/db.php";?>
<?php include "includes/head.php";?>

<body>
<?php $page="jobs.php";?>
<?php include "includes/navigation.php";?>

    <header class="mb-5" id="page-header">
        <div class="container mb-2">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <h1>Job Opportunities</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, eaque!</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container ">
        <div class="row mb-2">
        <?php
        $stmt = mysqli_prepare($connection,"SELECT job_id,job_title,job_employer,job_position,job_date,job_deadline,job_location,job_time FROM jobs");

        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$job_id,$job_title,$job_employer,$job_position,$job_date,$job_deadline,$job_location,$job_time);
        
        while(mysqli_stmt_fetch($stmt)){
        
        ?>
            <div class="col-md-10 mx-auto">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0"><i class="fas fa-briefcase"></i> <?php echo $job_title;?></h3>
                    <hr>
                    <strong class="d-inline-block mb-2 text-primary"><i class="fas fa-building"></i> <?php echo $job_employer;?></strong>
                    <div class="mb-1 text-muted"><i class="far fa-calendar-alt"></i> <?php echo $job_date;?> / <?php echo $job_deadline;?></div>
                    <div class="mb-1"><i class="fas fa-map-marker"></i> <?php echo $job_location;?></div>
                    <div class="mb-1"><i class="fas fa-user-clock"></i> <?php echo $job_time;?></div>
                    
                    <a href="job.php?job_id=<?php echo $job_id;?>" class="text-decoration-none stretched-link">More Info...</a>
                    </div>
                </div>
            </div>
            
            <?php }?>
        </div>
  </div>

  <?php include"includes/footer.php"; ?>
</body>
</html>