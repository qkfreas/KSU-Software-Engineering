<?php
/**
 * Created by IntelliJ IDEA.
 * User: qkfre
 * Date: 3/20/2017
 * Time: 10:20 AM
 */
session_start();
include ("../PHP/server.php");
include("../HTML/header.html");
$conn = sqlsrv_connect($servername,$connectionInfo);
$stm = sqlsrv_query($conn,"SELECT * FROM orders");
$row = sqlsrv_fetch_array($stm);
if (!$row)
    die(print_r(sqlsrv_errors(), true));

foreach($row as $value) {
    echo "\n".$value;
}
sqlsrv_close();

