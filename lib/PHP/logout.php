<?php
/**
 * Created by IntelliJ IDEA.
 * User: qkfre
 * Date: 3/7/2017
 * Time: 8:41 PM
 */
session_start();
session_destroy();
header('Location: index.php');
exit;
?>