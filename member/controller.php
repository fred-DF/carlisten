<?php

require_once __DIR__.'/../bootstrap.php';

$path = $_GET['path'] ?? "home";

if(getenv('REQUIRE_AUTHENTICATION')) {
    Auth::auth();
}

require_once $path."/index.php";