<?php
if(isset($_GET['delete'])){
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='Admin'){

     $stmt= mysqli_prepare($connection,"DELETE FROM candidates WHERE candidate_id=?");
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
            <th>Candidate Id</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Birth Date</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Location</th>
            <th>Image</th>
            <th>Education</th>
            <th>Branch</th>
        </tr>
    </thead>
    <tbody>


        <?php
        global $connection;
        $stmt=mysqli_prepare($connection,"SELECT * FROM candidates");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$candidate_id,$candidate_fullname,$candidate_gender,$candidate_birthdate,$candidate_email,$candidate_phone,$candidate_location,$candidate_image,$candidate_education,$candidate_branch,$candidate_profile);


        while(mysqli_stmt_fetch($stmt)){

            

            echo "<tr>";
            echo "<td>{$candidate_id}</td>";
            echo "<td>{$candidate_fullname}</td>";
            echo "<td>{$candidate_gender}</td>";
            echo "<td>{$candidate_birthdate}</td>";
            echo "<td>{$candidate_email}</td>";
            echo "<td>{$candidate_phone}</td>";
            echo "<td>{$candidate_location}</td>";
            echo "<td> <img width='100' src='../images/$candidate_image' alt='Image'></td>";
            echo "<td>{$candidate_education}</td>";
            echo "<td>{$candidate_branch}</td>";
            
//            $query= "SELECT post_id,post_title FROM posts WHERE post_id=$comment_post_id";
//            $select_post_id_query = mysqli_query($connection,$query);
//            
//            $row=mysqli_fetch_assoc($select_post_id_query);
            
            // Eger title bos olurse ci olma imkani yok o zaman $post_title a atanmay veri hem error custeri o yuzden eger atanmaz ise veri yapabilirsik custersin bos bu altaci if else ile
            //$post_title=isset($row['post_title']) ? $row['post_title'] : ""; 
//            $post_title=$row['post_title'];
//            $post_id =$row['post_id'];
            
            echo "<td><a class='btn btn-success' href='../candidate.php?candidate_id=$candidate_id'>View Post</a></td>";
            echo "<td><a class='btn btn-warning' href='candidates.php?source=update_candidate&update_candidate={$candidate_id}'>Update</a></td>";
            echo "<td><a class='btn btn-danger' href='candidates.php?delete={$candidate_id}'>Delete</a></td>";
            echo "</tr>";
        }

        mysqli_stmt_close($stmt);


        ?>


    </tbody>

</table>
