<?php
/**
 * Created by IntelliJ IDEA.
 * User: qkfre
 * Date: 3/8/2017
 * Time: 10:21 AM
 */
session_start();
include "server.php";

if(isset($_SESSION['id']) && $_SESSION['id'] === true) {


    $street1Err = $cityErr = $stateErr = $zip_codeErr = $phone_numberErr = "";
    $street1 = $street2 = $city = $state = $zip_code = $phone_number = "";
    $delivery_type = $_REQUEST['order_type'];

    $credit_number = $cvv_code = $exp_date = "";

    if (empty($_REQUEST["street1"])) {
        $street1Err = "Street address required";
    } else {
        $street1 = $_REQUEST["street1"];
    }

        $street2 = $_REQUEST["street2"];

    if (empty($_REQUEST["city"])) {
        $cityErr = "City required";
    } else {
        $city = $_REQUEST["city"];
    }

    if (empty($_REQUEST["state"])) {
        $stateErr = "State required.";
    } else {
        $state = $_REQUEST["state"];
    }

    if (empty($_REQUEST["zip_code"])) {
        $zip_codeErr = "Zip code required.";
    } else {
        $zip_code = $_REQUEST["zip_code"];
    }

    if (empty($_REQUEST["phone_number"])) {
        $phone_numberErr = "Phone number required.";
    } else {
        $phone_number = $_REQUEST["phone_number"];
    }

    $credit_number = md5('blah@#$' . sha1('3NhNj8&'.$_REQUEST["credit_number"]));
    $exp_date = $_REQUEST["exp_date"];
    $cvv_code = $_REQUEST["cvv_code"];

    $conn = sqlsrv_connect($servername, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $temp_name = $_SESSION['username'];
    $temp_selection = $_SESSION['user_selection'];
    $temp_total = $_SESSION['grand_total'];
    $sql = "UPDATE users SET street_1='".$street1."', street_2='".$street2."', city='".$city."', state_re='".$state."', zip_code='".$zip_code."', phone_number='".$phone_number."', credit_number ='".$credit_number."', exp_date='".$exp_date."', cvv_code='".$cvv_code."'  WHERE user_name='".$_SESSION['username']."';
    INSERT INTO orders (user_name,order_summary,total,order_type) VALUES ('$temp_name','$temp_selection','$temp_total','$delivery_type');
    ";

    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header('Location: confirm.php');
    }
    sqlsrv_close();
}
?>