<?php
    $password = "12345678";
    $hash = password_hash($password, PASSWORD_DEFAULT);
    echo $hash;
    if(password_verify("12345678", $hash)){
        echo "<br>Logged in";
    } else echo "<br>Incorect Password";
?>