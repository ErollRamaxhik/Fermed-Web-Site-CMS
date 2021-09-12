<?php
    $stmt = mysqli_prepare($connection,"SELECT product_id,product_title,product_price FROM products");
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$product_id,$product_title,$product_price);
        while(mysqli_stmt_fetch($stmt)){
            
  //HTML PART
            $stmt2 = mysqli_prepare($connection,"SELECT image_id,image_product_title,image_name FROM images");
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_bind_result($stmt2,$image_id,$image_product_title,$image_name);
                while(mysqli_stmt_fetch($stmt2)){
                echo $image_name;
                } 
  
    //HTML PART
  
            echo $product_id; 
            echo $product_title;
            echo $product_price;
  

//HTML PART
        } 
?>