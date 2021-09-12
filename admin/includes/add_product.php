<?php
if(isset($_POST['create_product'])){ 

    global $connection;

    $stmt= mysqli_prepare($connection,"INSERT INTO products(product_title,product_date,product_phone,product_email,product_content,product_location,product_price) VALUES(?,now(),?,?,?,?,?)");

    mysqli_stmt_bind_param($stmt,'ssssss',$_POST['product_title'],$_POST['product_phone'],$_POST['product_email'],$_POST['product_content'],$_POST['product_location'],$_POST['product_price']);
    mysqli_execute($stmt);  
    mysqli_stmt_close($stmt);

    

    
    //Userin pc den ali hem atay bizim servere resimi
    
    
   $product_image_title = $_POST['product_title'];


    $uploadFolder = '../products/';
    foreach ($_FILES['product_image']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['product_image']['tmp_name'][$key];
        $imageName = $_FILES['product_image']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        // save to database
        $query = "INSERT INTO images (image_product_title,image_name) VALUES ('$product_image_title','$imageName')";
        $run = $connection->query($query) or die("Error in saving image".$connection->error);
    }
    if ($result) {
        echo '<script>window.location.href="index.php";</script>';
    }
} 
?>


<div class="col-sm-6">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_title">Product Title</label>
            <input type="text" class="form-control" name="product_title" >
        </div>

        <div class="form-group">
            <label for="product_price">Price</label>
            <input type="text" class="form-control" name="product_price" >
        </div>

        <div class="form-group">
            <label for="product_phone">Phone</label>
            <input type="text" class="form-control" name="product_phone" >
        </div>

        <div class="form-group">
            <label for="product_email">Email</label>
            <input type="email" class="form-control" name="product_email" >
        </div>

        <div class="form-group">
            <label for="product_location">Location</label>
            <input type="text" class="form-control" name="product_location" >
        </div>

        <div class="form-group">
            <label for="product_content">Content</label>
            <input type="text" class="form-control" name="product_content" >
        </div>
      
        <label for="post_image" class="label" >Post Image</label>
        <div class="form-group">
            <input type="file"  name="product_image[]" id="post_image" class="form-control" multiple>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_product" value="Publish Product">
        </div>
    </form>
</div>