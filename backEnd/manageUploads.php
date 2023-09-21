<?php

include_once 'auth.php';
if(!checkAdmin()) {
    exit("Admin Rechte erforderlich");
}

if(isset($_GET['deleteFile']) && isset($_GET['path'])) {
    $file_path = $_GET['path'];
    if(file_exists("../" . $file_path)) {
        $unlink = unlink('../' . $file_path);
    } else {
        echo "File dosent exists";
    }
    include_once 'pdo.php';
    $path = $_GET['path'];
    $res = execute("DELETE FROM `uploads` WHERE `path`='$file_path'");
    if($unlink && $res) {
        echo "success";
    }
} 