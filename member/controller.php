<?php

require_once '../bootstrap.php';

if(isset($_GET['path'])) {
    $path = $_GET['path'];
} else {
    $path = "home";
}

if(getenv('REQUIRE_AUTHENTICATION')) {
    Auth::auth();
}

echo "tets";

include $path."/index.php";