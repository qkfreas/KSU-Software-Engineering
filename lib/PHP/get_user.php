<?php
/**
 * Created by IntelliJ IDEA.
 * User: qkfre
 * Date: 3/2/2017
 * Time: 9:58 AM
 */
header('Location: index.php');
//    $servername="DESKTOP-PAU76IG";
    $servername="LENOVO-QF";
    $username = "qkfreas";
    $password = "password";
    $dbname = "user_info";

    $connectionInfo = array("Database"=>$dbname,"UID" =>$username, "PWD"=>$password, "MultipleActiveResultSets"=>true);

    $conn = sqlsrv_connect($servername,$connectionInfo);

    if($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

if ($_REQUEST["password"] && $_REQUEST["username"]) {
    $temp_password = md5('blah@#$' . sha1('3NhNj8&' . $_REQUEST["password"]));
    $temp_username = $_REQUEST["username"];


    /*$sql = 'SELECT user_name,user_pass FROM users';
    $retval = sqlsrv_query($conn, $sql);

    if (!$retval) {
        die(print_r(sqlsrv_errors(), true));
    }

    $fetched_user_pass = NULL;*/

    $getit = sqlsrv_query("SELECT COUNT(*) FROM users WHERE user_name='$temp_username' AND user_pass='$temp_password'", $conn);
    $row = sqlsrv_fetch_array($getit);
    if (!$row)
        die(print_r(sqlsrv_errors(), true));


    if (count($row) == 100) {
        $_SESSION['id'] = true;
        session_start('id');
        header('Location: index.php');
    }
    else
        header('Location: login.php');

}

   sqlsrv_close($conn);
?>