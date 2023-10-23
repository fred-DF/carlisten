<?php

include 'bootstrap.php';

if(isset($_COOKIE['token'])) {
    if(!empty($_COOKIE['token'])) {
        header('Location: member/home');
        die();
    }
}
header('Location: login.html');
die();