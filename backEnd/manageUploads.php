<?php

require_once __DIR__.'/../bootstrap.php';
Auth::checkAdmin();

if(isset($_GET['deleteFile']) && isset($_GET['path'])) {
    $file_path = $_GET['path'];
    echo __DIR__."/../" . $file_path;
    if(file_exists(__DIR__."/../" . $file_path)) {
        $unlink = unlink('../' . $file_path);
    } else {
        echo "File doesn't exists";
    }
    include_once 'pdo.php';
    $path = $_GET['path'];
    $res = execute("DELETE FROM `uploads` WHERE `path`='$file_path'");
    if($unlink && $res) {
        echo "success";
    }
} 