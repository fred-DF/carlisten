<?php

class bootstrap
{
    public static function loadEnv () {
        require_once '../vendor/autoload.php';

        // Lade dotenv
        $dotenv = Dotenv\Dotenv::createImmutable("../");
        $dotenv->load();
    }
}