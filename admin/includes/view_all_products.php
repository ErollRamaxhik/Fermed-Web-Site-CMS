<?php

include "delete_modal.php";

if(isset($_GET['delete'])){
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='Admin'){
    
    $product_title=mysqli_real_escape_string($connection,$_GET['delete']);
    
    $query = "DELETE FROM products WHERE product_title='$product_title'";

    $delete_query=mysqli_query($connection,$query);
    
    $query = "DELETE FROM images WHERE image_product_title='$product_title'";

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

        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Price</th>
            </tr>
        </thead>
        <tbody>


            <?php
            global $connection;
            $query = "SELECT * FROM products";
            $select_posts=mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($select_posts)){

                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_price=$row['product_price'];
                

                echo "<tr>";
                echo "<td>{$product_id}</td>";
                
                if(!empty($post_author)){
                    echo "<td>{$post_author}</td>";    
                }else if(!empty($post_user)){
                    echo "<td>{$post_user}</td>"; 
                }
                
                echo "<td>{$product_title}</td>";

//                $query = "SELECT category_title FROM categories WHERE category_id=$post_category_id";
//                $select_categories_id = mysqli_query($connection,$query);
//                $row=mysqli_fetch_assoc($select_categories_id);
//                $post_category_title = $row['category_title'];

                echo "<td>{$product_price}</td>";
                
                echo "<td><a class='btn btn-success' href='../products.php?product_id=$product_id'>View Post</a></td>";
                echo "<td><a class='btn btn-warning' href='products.php?source=update_candidate&update_candidate={$product_id}'>Update</a></td>";
                echo "<td><a class='btn btn-danger' href='products.php?delete={$product_title}'>Delete</a></td>";
                echo "</tr>";
            }


            ?>


        </tbody>

    </table>
</form>

