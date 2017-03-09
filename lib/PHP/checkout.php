<?php
/**
 * Created by IntelliJ IDEA.
 * User: qkfre
 * Date: 3/8/2017
 * Time: 10:21 AM
 */
session_start();
include "../HTML/header.html";
include ('../HTML/checkout.html');
include "server.php";

$street1Err = $cityErr = $stateErr = $zip_codeErr = $phone_numberErr = "";
$street1 = $street2 = $city = $state = $zip_code = $phone_number = "";

        if (empty($_REQUEST["street1"])) {
            $street1Err = "Street address required";
        }
        else {
            $street1 = $_REQUEST["street1"];
        }

        $street2 = $_REQUEST["street2"];

        if (empty($_REQUEST["city"])) {
            $cityErr = "City required";
        }
        else {
            $city = $_REQUEST["city"];
        }

        if (empty($_REQUEST["state"])) {
            $stateErr = "State required.";
        }
        else {
            $state = $_REQUEST["state"];
        }

        if (empty($_REQUEST["zip_code"])) {
            $zip_codeErr = "Zip code required.";
        }
        else {
            $zip_codeErr = $_REQUEST["zip_code"];
        }

    $conn = sqlsrv_connect($servername,$connectionInfo);
    if($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $sql = "INSERT INTO users(street_1, street_2, city, state_re, zip_code, phone_number) VALUES(?, ?, ?, ?, ?, ?)";
    $params = array($street1, $street2, $city, $state, $zip_code, $phone_number);

    $stmt = sqlsrv_query($conn, $sql, $params);
    if($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    else {
        echo "Record add successful";
        header('Location: login.php');
    }
    sqlsrv_close();
?>