<?php
if(isset($_GET['delete'])){
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='Admin'){

     $stmt= mysqli_prepare($connection,"DELETE FROM jobs WHERE job_id=?");
     mysqli_stmt_bind_param($stmt,'i',$_GET['delete']);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
    
    // refresh icin kullanisik ama gerek kalmadi se en uste koydum kodi ci tikladigimizda silsin sonra asardacilari yazdirsin
    //header("Location:comments.php");
    }

}
?>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Job Id</th>
            <th>Title</th>
            <th>Employer</th>
            <th>Position</th>
            <th>Date</th>
            <th>Deadline</th>
            <th>Location</th>
            <th>Time</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>


        <?php
        global $connection;
        $stmt=mysqli_prepare($connection,"SELECT * FROM jobs");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$job_id,$job_title,$job_employer,$job_position,$job_date,$job_deadline,$job_location,$job_time,$job_phone,$job_email,$job_description);


        while(mysqli_stmt_fetch($stmt)){

            

            echo "<tr>";
            echo "<td>{$job_id}</td>";
            echo "<td>{$job_title}</td>";
            echo "<td>{$job_employer}</td>";
            echo "<td>{$job_position}</td>";
            echo "<td>{$job_date}</td>";
            echo "<td>{$job_deadline}</td>";
            echo "<td>{$job_location}</td>";
            echo "<td>{$job_time}</td>";
            echo "<td>{$job_phone}</td>";
            echo "<td>{$job_email}</td>";
            
//            $query= "SELECT post_id,post_title FROM posts WHERE post_id=$comment_post_id";
//            $select_post_id_query = mysqli_query($connection,$query);
//            
//            $row=mysqli_fetch_assoc($select_post_id_query);
            
            // Eger title bos olurse ci olma imkani yok o zaman $post_title a atanmay veri hem error custeri o yuzden eger atanmaz ise veri yapabilirsik custersin bos bu altaci if else ile
            //$post_title=isset($row['post_title']) ? $row['post_title'] : ""; 
//            $post_title=$row['post_title'];
//            $post_id =$row['post_id'];
            
            echo "<td><a class='btn btn-success' href='../job.php?job_id=$job_id'>View Post</a></td>";
            echo "<td><a class='btn btn-warning' href='jobs.php?source=update_job&update_job={$job_id}'>Update</a></td>";
            echo "<td><a class='btn btn-danger' href='jobs.php?delete={$job_id}'>Delete</a></td>";
            echo "</tr>";
        }

        mysqli_stmt_close($stmt);


        ?>


    </tbody>

</table>
