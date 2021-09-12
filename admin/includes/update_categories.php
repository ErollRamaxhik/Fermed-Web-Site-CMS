<!-- UPDATE -->
<form action="" method="post">
    <div class="form-group">
        <label class="h5" for="category_title">Category Name</label>

        <?php
        if(isset($_GET['update'])){

            $category_update_id = $_GET['update'];
            $query = "SELECT * FROM categories WHERE category_id='$category_update_id'";

            $update_query = mysqli_query($connection,$query);

            while($row=mysqli_fetch_assoc($update_query)){
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
        ?>

        <input value="<?php if(isset($category_title)){echo $category_title;}?>" class="form-control" type="text" name="update">
        <?php } 
        } ?>

        <?php


        if(isset($_POST['update_category'])){

            $category_title=$_POST['update'];

            $stmt =mysqli_prepare($connection,"UPDATE categories SET category_title=? WHERE category_id=?") ;

            mysqli_stmt_bind_param($stmt,'si',$category_title,$category_id);
            
            mysqli_stmt_execute($stmt);

            if(!$stmt){
                die("QUERY FAILED". mysqli_error($connection));
            }

            redirect('categories.php');


        }

        ?>


    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>

</form>