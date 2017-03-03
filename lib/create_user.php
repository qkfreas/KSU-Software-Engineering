<?php
$servername="localhost";
$username = "qkfreas";
$password = "password";
$dbname = "user_info";

mssql_connect($servername,$username,$password,$dbname);
if (!empty($_POST['new_password']) && !empty($_POST['new_username'])) {
    $temp_password = md5('blah@#$'.sha1('3NhNj8&'.$_POST['password']));
    $temp_username = $_POST['new_username'];
    mssql_query("INSERT into users(user_name,user_pass) VALUES ($temp_username,$temp_password)" );
}
?>