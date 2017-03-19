<?php
include "server.php";

$conn = sqlsrv_connect($servername,$connectionInfo);
if($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


if ($_REQUEST["new_password"] && $_REQUEST["new_username"]) {
    $temp_password = md5('blah@#$'.sha1('3NhNj8&'.$_REQUEST["new_password"]));
    $temp_username = $_REQUEST["new_username"];

    $sql = "INSERT INTO users(user_name, user_pass, user_level) VALUES(?,?,?)";
    $params = array($temp_username, $temp_password, 0);

    $stmt = sqlsrv_query($conn, $sql, $params);
    if($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    else {
        echo "Record add successful";
        header('Location: login.php');
    }
}
sqlsrv_close($conn);
?>