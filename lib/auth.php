<?php
if(!empty($_POST['password'])) {
    if(md5('blah@#$'.sha1('3NhNj8&'.$_POST['password']) ) =='MD5 value of your password' ) {
        header("Location: deals.html"); /* Redirect here if the password is correct */
    }
    else {
        header("Location: "); /* Return here if the password ain't correct */
    }
}
else {
    header("Location: "); /* Return here if the field is empty */
}
?>