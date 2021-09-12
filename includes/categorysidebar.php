<?php

$stmt = mysqli_prepare($connection,"SELECT * FROM categories");
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$category_id,$category_title);
                    
while(mysqli_stmt_fetch($stmt)){

    echo"<a class='p-2 m-1 category' href='category.php?category_id=$category_id&category_title=$category_title'>$category_title</a>";
}





?>

