<?php
    setcookie("fav_food", "pizza", time() - 0, '/');
    setcookie("fav_drink", "coffee", time() + (86400 * 3), '/');
    setcookie("fav_dessert", "ice cream", time() + (86400 * 4), '/');

    foreach($_COOKIE as $cookie => $value){
        echo "{$cookie} = {$value} <br>";
    }

    if(isset($_COOKIE['fav_food'])){
        echo "Buy Some {$_COOKIE['fav_food']} !!!";
    } else echo "I dont know your favorite food...";
?>