<?php
//SECURITY FUNCTION
function escape($string){
    
    global $connection;
    
   return mysqli_real_escape_string($connection,trim($string));
}


//FUNCTION CONFIRM QUERY

function confirm($result){
    global $connection;
     if(!$result){
        die("QUERY FAILED". mysqli_error($connection));
    }
}

// ADD CATEGORY FUNCTION
function addCategories(){

    global $connection;

    if(isset($_POST['submit'])){

        $category_title=$_POST['category_title'];

        if($category_title=="" || empty($category_title)){

            echo "This field should not be empty";
        }else{
            
            $stmt = mysqli_prepare($connection,"INSERT INTO categories (category_title) VALUES (?)");
            
            mysqli_stmt_bind_param($stmt,'s',$category_title);
            
            mysqli_stmt_execute($stmt);

            if(!$stmt){
                die("Query FAILED". mysqli_error($connection));
            }
        }
        //kapatisik statementi database i
    mysqli_stmt_close($stmt);
    }
    
}


// FIND ALL CATEGORIES QUERY
function findAllCategories(){

    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_categories)){

        $category_id = $row['category_id'];
        $category_title = $row['category_title'];

        echo "<tr>";
        echo "<td>$category_id</td>";
        echo "<td>$category_title</td>";
        echo "<td> <a class='btn btn-danger' href='categories.php?delete=$category_id'>Delete</a> </td>";
        echo "<td> <a class='btn btn-warning' href='categories.php?update=$category_id'>Update</a> </td>";
        echo "</tr>";
    }
}

//DELETE SELECTED QUERY
function deleteCategories(){
    global $connection;
    
    if(isset($_GET['delete'])){

        $category_delete_id=$_GET['delete'];

        $query = "DELETE FROM categories WHERE category_id='$category_delete_id'";

        $delete_query=mysqli_query($connection,$query);
        // super global ile ilc tiklamamizda vec alisik degeri hem sileysik ama sayfa refresh olmadigi icin hicibse olmay, o yuzden degeri aldigimiz cibi koyaysik refresh olsun
        header("Location:categories.php");
    }
}
?>


<?php
    function users_online(){
            
    global $connection;
        
        $session = session_id();
        $time = time();
        $time_out_value = 30;
        $time_out = $time - $time_out_value;

        $query = "SELECT * FROM users_online WHERE users_online_session='$session'";
        $send_query = mysqli_query($connection,$query);
        $count = mysqli_num_rows($send_query);

        if($count == NULL){
            mysqli_query($connection, "INSERT INTO users_online (users_online_session,users_online_time) VALUES ('$session','$time')");
        }else{
            mysqli_query($connection, "UPDATE users_online SET users_online_time='$time' WHERE users_online_session ='$session'");

        }

        $users_online = mysqli_query($connection, "SELECT * FROM users_online WHERE users_online_time > '$time_out'");
        return mysqli_num_rows($users_online);
        
    }
    /* INDEX COUNT FUNCTION*/
    function recordCount($table_name){
        global $connection;
        
        $query = "SELECT * FROM " . $table_name;
        $select_all_posts = mysqli_query($connection,$query);
        $result = mysqli_num_rows($select_all_posts); 
        
        confirm($result);
        
        return $result;
    }
    /*INDEX GRAPHIC COUNT FUNCTION*/
    function graphCount($table_name,$field_name,$status){
        
        global $connection;
        $query = "SELECT * FROM $table_name WHERE $field_name='$status'";
        $select_all_published_posts = mysqli_query($connection,$query);
        $result=mysqli_num_rows($select_all_published_posts);
        
        return $result; 
        
        
    }

    /*CHECK ADMIN*/
    function is_admin(){
        
    }

    function redirect($location){
        header("Location:" . $location);
        exit;
    }
    
    // Method mi yani post veya get methodi mi  diye bakaysik
    function isItMethod($method=null){
        
        if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
            
            return true;
        }else{
            
            return false;
        }
    }
    //Logged in oldimi kontrol edeysik
    function isLoggedIn(){
        
        if(isset($_SESSION['user_name'])){
            
            return true;
        }else{
            
            return false;
        }
    }

    function checkLoggedInRedirect(){
        
        if(isLoggedIn()){
            
            redirect($redirectLocation);
        }
    }

    function email_check($email){
        
        global $connection;
        
        $stmt=mysqli_prepare($connection,"SELECT user_email FROM users WHERE user_email= ?");
        
        mysqli_stmt_bind_param($stmt,'s',$email);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt)>0){
            return true;
        }else{
            return false;
        }
    }
    
?>
