<?php
/**
 * Created by IntelliJ IDEA.
 * User: qkfre
 * Date: 3/2/2017
 * Time: 9:58 AM
 */
include "server.php";
    $conn = sqlsrv_connect($servername,$connectionInfo);
    if(!$conn) {
        die(print_r(sqlsrv_errors(), true));
    }
if ($_REQUEST["password"] && $_REQUEST["username"]) {

    $temp_password = md5('blah@#$' . sha1('3NhNj8&' . $_REQUEST["password"]));
    $temp_username = $_REQUEST["username"];
    $temp_user_level = 0;

//    $stm = sqlsrv_query($conn,"SELECT * FROM users WHERE user_name='$temp_username' AND user_pass='$temp_password' AND user_level='$temp_user_level'");
    $stm = sqlsrv_query($conn,"SELECT * FROM users WHERE user_name='$temp_username' AND user_pass='$temp_password'");
    $row = sqlsrv_fetch_array($stm);
    if (!$row)
        die(print_r(sqlsrv_errors(), true));

    if (count($row) !== 0) {
        $id = $temp_username;
        session_start();
        $_SESSION['username'] = $temp_username;
        $_SESSION['id'] = true;
        $_SESSION['user_level'];
        header('Location: index.php');
        exit();
    }
else {
        echo "didn't work";
        header('Location: login.php');
    }

}

sqlsrv_close($conn);
?>