<?php
if(!empty($_POST['password']) && !empty($_POST['username'])) {
    if(md5('blah@#$'.sha1('3NhNj8&'.$_POST['password']) ) =='MD5 value of your password' ) {
        header("Location: deals.html"); /* Redirect here if the password is correct */
    }
    else {
        header("Location: https://www.google.com/"); /* Return here if the password isn't correct */
    }
}
else {
    header("Location: https://www.google.com/"); /* Return here if the field is empty */
}
?>