<?php

if(isset($_GET['pass'])) {
    echo $hash = hash('sha256', $_GET['pass']);
}