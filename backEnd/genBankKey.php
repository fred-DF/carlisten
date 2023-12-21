<?php

include "../bootstrap.php";

use Defuse\Crypto\Key;

$key = Key::createNewRandomKey();
$safeString = $key->saveToAsciiSafeString();

echo $safeString;