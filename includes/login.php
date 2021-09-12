<?php ob_start();?>
<?php include "db.php"; ?>
<?php include "../admin/functions.php"; ?>
<?php session_start();?>


<?php 
if(isset($_POST['login'])){

    $user_name=escape($_POST['username']);
    $user_password=escape($_POST['password']);

    //Against SQL Injection cleaning data
    $user_name=mysqli_real_escape_string($connection,$user_name);
    $user_password=mysqli_real_escape_string($connection,$user_password);


    $query="SELECT * FROM users WHERE user_name='{$user_name}'";

    $select_user_query = mysqli_query($connection,$query);

    if(!$select_user_query){
        die('QUERY FAILED' . mysqli_error($connection));
    }


    while($row=mysqli_fetch_array($select_user_query)){

        $db_user_id = $row['user_id'];
        $db_user_name = $row['user_name'];
        $db_user_password = $row['user_password'];
        $db_user_fullname = $row['user_fullname'];
        $db_user_role = $row['user_role'];
    }
    
    $user_password = crypt($user_password,$db_user_password);


    if($user_name === $db_user_name && $user_password === $db_user_password){
        
        $_SESSION['user_name']=$db_user_name;
        $_SESSION['user_fullname']=$db_user_fullname;
        $_SESSION['user_role']=$db_user_role;
        
        header("Location: ../admin/index.php");


    }else{
        
        header("Location: ../index.php");
    }


}
?>