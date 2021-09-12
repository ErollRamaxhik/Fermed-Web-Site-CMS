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
                    <h1>Candidates</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, eaque!</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container ">
        <div class="row mb-2">
    <?php  
        $stmt = mysqli_prepare($connection,"SELECT candidate_id,candidate_fullname,candidate_gender,candidate_birthdate,candidate_email,candidate_phone,candidate_location,candidate_image,candidate_education,candidate_branch,candidate_profile FROM candidates");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$candidate_id,$candidate_fullname,$candidate_gender,$candidate_birthdate,$candidate_email,$candidate_phone,$candidate_location,$candidate_image,$candidate_education,$candidate_branch,$candidate_profile);
        
        while(mysqli_stmt_fetch($stmt)){
    ?>
            <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-2"><i class="fas fa-user"></i> <?php echo $candidate_fullname;?></h3>
                
                <div class="text-muted"><i class="far fa-calendar-alt"></i> <?php echo $candidate_birthdate;?></div>
                <div class=" text-primary"><i class="fas fa-user-tie"></i> <?php echo $candidate_branch;?></div>
                <div><i class="fas fa-map-marker"></i> <?php echo $candidate_location;?></div>
                <div><i class="fas fa-university"></i> <?php echo $candidate_education;?></div>
                <div><i class="fas fa-envelope"></i> <?php echo $candidate_email;?></div>
                <a href="candidate.php?candidate_id=<?php echo $candidate_id;?>" class=" mt-3 text-decoration-none stretched-link">More Info...</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                <img class="cover" src="images/<?php echo $candidate_image;?>" alt="" >
                </div>
            </div>
            </div>

    <?php } ?>
        
        </div>
    </div>

  <?php include"includes/footer.php"; ?>
</body>
</html>