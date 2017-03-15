<?php
/**
 * Created by IntelliJ IDEA.
 * User: qkfre
 * Date: 3/13/2017
 * Time: 10:44 AM
 */
header("Location:../PHP/checkout.php");
$crust_selected = $_GET['crust_type'];
$toppings_selected = $_GET['toppings'];

$pizza = array($crust_selected, $toppings_selected);

$temp = $_SESSION['user_selection'];
reset($_SESSION['user_selection']);
array_push($temp, $pizza);

$_SESSION['user_selection'] = $temp;
unset($temp);
?>