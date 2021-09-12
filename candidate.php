<!DOCTYPE html>
<html lang="en">

<?php include "includes/db.php";?>
<?php include "includes/head.php";?>

<body>
<?php $page="candidates.php";?>
<?php include "includes/navigation.php";?>

    <header class="mb-5" id="page-header">
        <div class="container mb-2">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <h1>Candidate Information</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container ">
        <div class="row mb-2">
    <?php  
        if(isset($_GET['candidate_id'])){

        $candidate_id = $_GET['candidate_id'];
        $stmt = mysqli_prepare($connection,"SELECT candidate_fullname,candidate_gender,candidate_birthdate,candidate_email,candidate_phone,candidate_location,candidate_image,candidate_education,candidate_branch,candidate_profile FROM candidates WHERE candidate_id=$candidate_id");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$candidate_fullname,$candidate_gender,$candidate_birthdate,$candidate_email,$candidate_phone,$candidate_location,$candidate_image,$candidate_education,$candidate_branch,$candidate_profile);
        
        mysqli_stmt_fetch($stmt)
    ?>      
    <div class="col-12">
        <img class="cover float-start rounded me-3" src="images/<?php echo $candidate_image;?>" alt="" >
        
        <h5><i class="fas fa-user"></i> <?php echo $candidate_fullname;?></h5>
        <h5 ><i class="fas fa-venus-mars"></i> <?php echo $candidate_gender;?></h5>
        <h5 class="text-muted" ><i class="far fa-calendar-alt"></i> <?php echo $candidate_birthdate;?></h5>
        <h5 ><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $candidate_email;?>"><?php echo $candidate_email;?></a></h5>
        <h5 ><i class="fas fa-phone"></i> <?php echo $candidate_phone;?></h5>
        <h5 ><i class="fas fa-map-marker"></i> <?php echo $candidate_location;?></h5>
        <h5 ><i class="fas fa-university"></i> <?php echo $candidate_education;?></h5>
        <h5 class="text-primary" ><i class="fas fa-user-tie"></i> <?php echo $candidate_branch;?></h5>
        
    </div>
    <div class="col-12"> 
    <hr>
    <p><?php echo $candidate_profile;?></p>
    </div>

    <?php  }?>
        
        </div>
    </div>

  <?php include"includes/footer.php"; ?>
</body>
</html>