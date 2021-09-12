<?php

include "delete_modal.php";

if(isset($_GET['delete'])){
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='Admin'){
    
    $post_id=mysqli_real_escape_string($connection,$_GET['delete']);

    $query = "DELETE FROM posts WHERE post_id='$post_id'";

    $delete_query=mysqli_query($connection,$query);

    confirm($delete_query);

    // refresh icin kullanisik ama gerek kalmadi se en uste koydum kodi ci tikladigimizda silsin sonra asardacilari yazdirsin
    //header("Location:posts.php");

    }
}
?>

<?php
if(isset($_POST['checkBoxArray'])){



    foreach($_POST['checkBoxArray'] as $checkBoxValue){

        $bulk_options = $_POST['bulk_options'];

        if($bulk_options==='Delete'){
            
            $query="DELETE FROM posts WHERE post_id={$checkBoxValue}";
            $delete_posts = mysqli_query($connection,$query);
            
            confirm($delete_posts);
        }else if($bulk_options==='Published'){
            
            $query="UPDATE posts SET post_status='Published' WHERE post_id={$checkBoxValue}";
            $update_posts = mysqli_query($connection,$query);

            confirm($update_posts);
            
        }else if($bulk_options==='Draft'){
            
            $query="UPDATE posts SET post_status='Draft' WHERE post_id={$checkBoxValue}";
            $update_posts = mysqli_query($connection,$query);

            confirm($update_posts);
            
        }else if($bulk_options==='Clone'){
            
            $query = "INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) SELECT post_category_id,post_title,post_author,now(),post_image,post_content,post_tags,post_comment_count,post_status FROM posts WHERE post_id='{$checkBoxValue}'";
            
            $clone_posts = mysqli_query($connection,$query);
            
            confirm($clone_posts);
        }
        

    }

}


?>

<form action="" method="post">
    <table class="table table-bordered table-hover">


        <div id="bulkOptionsContainer" class="row mb-2">
           <div class="col-auto">
            <select class="form-select" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="Published">Publish</option>
                <option value="Draft">Draft</option>
                <option value="Delete">Delete</option>
                <option value="Clone">Clone</option>
            </select>
            </div>
            <div class="col-auto">
            <input type="submit" name="" class="btn btn-success" value="Apply">
            </div>
            <div class="col-auto" >
            <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
            </div>
        </div>







        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>Post Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>


            <?php
            global $connection;
            $query = "SELECT * FROM posts LEFT JOIN categories ON post_category_id=category_id ORDER BY post_id DESC";
            $select_posts=mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($select_posts)){

                $post_id=$row['post_id'];
                $post_author=$row['post_author'];
                $post_title=$row['post_title'];
                $post_category_id=$row['post_category_id'];
                $post_status=$row['post_status'];
                $post_image=$row['post_image'];
                $post_tags=$row['post_tags'];
                $post_comment_count=$row['post_comment_count'];
                $post_date=$row['post_date'];
                $post_views = $row['post_views'];
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];

                echo "<tr>";
                echo "<td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='{$post_id}'></td>";
                echo "<td>{$post_id}</td>";
                
                if(!empty($post_author)){
                    echo "<td>{$post_author}</td>";    
                }else if(!empty($post_user)){
                    echo "<td>{$post_user}</td>"; 
                }
                
                echo "<td>{$post_title}</td>";

//                $query = "SELECT category_title FROM categories WHERE category_id=$post_category_id";
//                $select_categories_id = mysqli_query($connection,$query);
//                $row=mysqli_fetch_assoc($select_categories_id);
//                $post_category_title = $row['category_title'];

                echo "<td>{$category_title}</td>";
                echo "<td>{$post_status}</td>";
                echo "<td> <img width='100' src='../images/$post_image' alt='Image'></td>";
                echo "<td>{$post_tags}</td>";
                
                $query = "SELECT * FROM comments WHERE comment_post_id= $post_id";
                $send_comment_query = mysqli_query($connection,$query);
                $count_comments = mysqli_num_rows($send_comment_query);
                
                echo "<td><a href='view_all_unique_comments.php?id=$post_id'>{$count_comments}</a></td>";
                echo "<td>{$post_date}</td>";
                echo "<td>{$post_views}</td>";
                echo "<td><a class='btn btn-success' href='../post.php?p_id=$post_id'>View Post</a></td>";
                echo "<td><a class='btn btn-warning' href='posts.php?source=update_posts&p_id=$post_id'>Update</a></td>";
                /*echo "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";*/
                echo "<td><a rel='$post_id' href='javascript:void(0)' class='btn btn-danger delete_link'>Delete</a></td>";
                echo "</tr>";
            }


            ?>


        </tbody>

    </table>
</form>

<script>
    $(document).ready(function(){
       $('.delete_link').on('click',function(){
           var id= $(this).attr("rel");
           
           var delete_url = "posts.php?delete="+ id +" ";
           
           $(".modal_delete_link").attr("href",delete_url);
           
           $("#exampleModal").modal('show');
           
       });
    });
</script>
