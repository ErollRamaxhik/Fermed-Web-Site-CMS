<?php
/*$db['db_host'] = "db.fermed.erolramacik.com";
$db['db_user'] = "exwave";
$db['db_password'] = "Roglwl9!";
$db['db_name'] = "fermed_db";*/

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_password'] = "";
$db['db_name'] = "cms";

foreach($db as $key=>$value){

    define(strtoupper($key),$value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

/*
    if($connection){
        echo" We are connected";
    }else{
        echo('We are not connected');
    }
*/
?>