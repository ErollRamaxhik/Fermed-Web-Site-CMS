<?php
if(isset($_GET['delete'])){
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='Admin'){
        
    $user_id=mysqli_real_escape_string($connection,$_GET['delete']);

    $query = "DELETE FROM users WHERE user_id='$user_id'";

    $delete_query=mysqli_query($connection,$query);

    confirm($delete_query);
    
    // refresh icin kullanisik ama gerek kalmadi se en uste koydum kodi ci tikladigimizda silsin sonra asardacilari yazdirsin
    //header("Location:comments.php");
    }

}

if(isset($_GET['change_to_admin'])){

    $user_id=$_GET['change_to_admin'];

    $query = "UPDATE users SET user_role='Admin' WHERE user_id=$user_id";

    $admin_query=mysqli_query($connection,$query);

    confirm($admin_query);
    
    // refresh icin kullanisik ama gerek kalmadi se en uste koydum kodi ci tikladigimizda silsin sonra asardacilari yazdirsin
    //header("Location:comments.php");


}

if(isset($_GET['change_to_subscriber'])){

    $user_id=$_GET['change_to_subscriber'];

    $query = "UPDATE users SET user_role='Subscriber' WHERE user_id=$user_id";

    $subscriber_query=mysqli_query($connection,$query);

    confirm($subscriber_query);
    
    // refresh icin kullanisik ama gerek kalmadi se en uste koydum kodi ci tikladigimizda silsin sonra asardacilari yazdirsin
    //header("Location:comments.php");


}
?>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>User Id</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>


        <?php
        global $connection;
        $query = "SELECT * FROM users";
        $select_users=mysqli_query($connection,$query);

        while($row=mysqli_fetch_assoc($select_users)){

            $user_id=$row['user_id'];
            $user_name=$row['user_name'];
            $user_password=$row['user_password'];
            $user_fullname=$row['user_fullname'];
            $user_email=$row['user_email'];
            $user_image=$row['user_image'];
            $user_role=$row['user_role'];

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$user_name}</td>";
//            echo "<td>{$user_password}</td>";
            
//            $query="SELECT category_title FROM categories WHERE category_id=$post_category_id";
//            $select_categories_id = mysqli_query($connection,$query);
//            $row=mysqli_fetch_assoc($select_categories_id);
//            $post_category_title = $row['category_title'];
//             
//            echo "<td>{$post_category_title}</td>";
            
            echo "<td>{$user_fullname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";
            
//            $query= "SELECT post_id,post_title FROM posts WHERE post_id=$comment_post_id";
//            $select_post_id_query = mysqli_query($connection,$query);
//            
//            $row=mysqli_fetch_assoc($select_post_id_query);
            
            // Eger title bos olurse ci olma imkani yok o zaman $post_title a atanmay veri hem error custeri o yuzden eger atanmaz ise veri yapabilirsik custersin bos bu altaci if else ile
            //$post_title=isset($row['post_title']) ? $row['post_title'] : ""; 
//            $post_title=$row['post_title'];
//            $post_id =$row['post_id'];
            
            
            echo "<td><a class='btn btn-primary' href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a class='btn btn-secondary' href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
            echo "<td><a class='btn btn-warning' href='users.php?source=update_users&update_user={$user_id}'>Update</a></td>";
            echo "<td><a class='btn btn-danger' href='users.php?delete={$user_id}'>Delete</a></td>";
            echo "</tr>";
        }


        ?>


    </tbody>

</table>
