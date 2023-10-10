<?php

include 'bootstrap.php';

if(json_decode(Auth::auth(), true)['response'] === "success") {
    header("Location: member/");
} else {
    header("Location: login.html");
}