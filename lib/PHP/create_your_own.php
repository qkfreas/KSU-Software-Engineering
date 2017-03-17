<?php
/**
 * Created by IntelliJ IDEA.
 * User: qkfre
 * Date: 3/13/2017
 * Time: 10:44 AM
 */
session_start();
header("Location:../PHP/checkout.php");
$crust_selected = $_GET['crust_type'];
$toppings_selected = $_GET['toppings'];

if(!$_SESSION['number_of_pizzas'] >= 1) {
    $_SESSION['user_selection'] = "";
    $_SESSION['number_of_pizzas'] = 1;
    $_SESSION['number_of_toppings'] = 0;
    $_SESSION['grand_total'] = 0.00;
}
else {
    $_SESSION['number_of_pizzas'] = $_SESSION['number_of_pizzas'] + 1;
}

$temp = $_SESSION['user_selection']."Pizza ".$_SESSION['number_of_pizzas'].":\n";
$temp = $temp.$crust_selected;
foreach($toppings_selected as $value) {
    $temp = $temp."\n".$value;
}
$temp = $temp."\n\n";
$_SESSION["user_selection"] = $temp;
$_SESSION['number_of_toppings'] = $_SESSION['number_of_toppings'] + sizeof($toppings_selected);
$_SESSION['grand_total'] = $_SESSION['grand_total']+ 12.95+(sizeof($toppings_selected)*.5);
unset($temp);

?>
