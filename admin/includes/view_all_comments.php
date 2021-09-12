<?php
if(isset($_GET['delete'])){
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='Admin'){
        
    $comment_id=mysqli_real_escape_string($connection,$_GET['delete']);

    $query = "DELETE FROM comments WHERE comment_id='$comment_id'";

    $delete_query=mysqli_query($connection,$query);

    confirm($delete_query);
    
    // refresh icin kullanisik ama gerek kalmadi se en uste koydum kodi ci tikladigimizda silsin sonra asardacilari yazdirsin
    //header("Location:comments.php");

    }
}

if(isset($_GET['unapprove'])){

    $comment_id=$_GET['unapprove'];

    $query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id=$comment_id";

    $unapprove_query=mysqli_query($connection,$query);

    confirm($unapprove_query);
    
    // refresh icin kullanisik ama gerek kalmadi se en uste koydum kodi ci tikladigimizda silsin sonra asardacilari yazdirsin
    //header("Location:comments.php");


}

if(isset($_GET['approve'])){

    $comment_id=$_GET['approve'];

    $query = "UPDATE comments SET comment_status='Approved' WHERE comment_id=$comment_id";

    $approve_query=mysqli_query($connection,$query);

    confirm($approve_query);
    
    // refresh icin kullanisik ama gerek kalmadi se en uste koydum kodi ci tikladigimizda silsin sonra asardacilari yazdirsin
    //header("Location:comments.php");


}
?>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Comment Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>


        <?php
        global $connection;
        $query = "SELECT * FROM comments";
        $select_comments=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($select_comments)){

            $comment_id=$row['comment_id'];
            $comment_post_id=$row['comment_post_id'];
            $comment_author=$row['comment_author'];
            $comment_email=$row['comment_email'];
            $comment_content=$row['comment_content'];
            $comment_status=$row['comment_status'];
            $comment_date=$row['comment_date'];

            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            
//            $query="SELECT category_title FROM categories WHERE category_id=$post_category_id";
//            $select_categories_id = mysqli_query($connection,$query);
//            $row=mysqli_fetch_assoc($select_categories_id);
//            $post_category_title = $row['category_title'];
//             
//            echo "<td>{$post_category_title}</td>";
            
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";
            
            $query= "SELECT post_id,post_title FROM posts WHERE post_id=$comment_post_id";
            $select_post_id_query = mysqli_query($connection,$query);
            
            $row=mysqli_fetch_assoc($select_post_id_query);
            
            // Eger title bos olurse ci olma imkani yok o zaman $post_title a atanmay veri hem error custeri o yuzden eger atanmaz ise veri yapabilirsik custersin bos bu altaci if else ile
            $post_title=isset($row['post_title']) ? $row['post_title'] : "";
            $post_id=isset($row['post_id']) ? $row['post_id'] : ""; 
//            $post_title=$row['post_title'];
//            $post_id =$row['post_id'];
            
            
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            
            
            echo "<td>{$comment_date}</td>";
            echo "<td><a class='btn btn-success' href='comments.php?approve=$comment_id'>Approve</a></td>";
            echo "<td><a class='btn btn-warning' href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
            echo "<td><a class='btn btn-danger' href='comments.php?delete=$comment_id'>Delete</a></td>";
            echo "</tr>";
        }


        ?>


    </tbody>

</table>


