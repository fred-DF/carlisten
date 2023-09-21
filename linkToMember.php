<?php

include 'backEnd/auth.php';
if(json_decode(auth(), true)['response'] === "success") {
    header("Location: member/");
} else {
    header("Location: login.html");
}