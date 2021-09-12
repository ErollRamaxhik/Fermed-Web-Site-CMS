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
                    <h1>Job</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, eaque!</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container ">
        <div class="row mb-2">
        <?php  
        if(isset($_GET['job_id'])){

        $job_id = $_GET['job_id'];
        $stmt = mysqli_prepare($connection,"SELECT job_title,job_employer,job_position,job_date,job_deadline,job_location,job_time,job_phone,job_email,job_description FROM jobs WHERE job_id=$job_id");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$job_title,$job_employer,$job_position,$job_date,$job_deadline,$job_location,$job_time,$job_phone,$job_email,$job_description);
        
        mysqli_stmt_fetch($stmt)
    ?>    
        <div class="col-12 mx-auto ">
            <h3 class="text-center text-uppercase"><i class="fas fa-briefcase"></i> <?php echo $job_title;?></h3>
            <hr>
            <h5 ><i class="fas fa-building"></i> <?php echo $job_employer;?></h5>
            <h5 class="text-muted" ><i class="far fa-calendar-alt"></i> <?php echo $job_date;?> / <?php echo $job_deadline;?></h5>
            <h5 ><i class="fas fa-phone"></i> <?php echo $job_phone;?></h5>
            <h5 ><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $job_email;?>"><?php echo $job_email;?></a></h5>
            <h5 ><i class="fas fa-map-marker"></i> <?php echo $job_location;?></h5>
            <h5 ><i class="fas fa-user-clock"></i> <?php echo $job_time;?></h5>
            <hr>
            <p><?php echo  $job_description;?></p>
         </div>
            
            <?php }?>
        </div>
  </div>

  <?php include"includes/footer.php"; ?>
</body>
</html>