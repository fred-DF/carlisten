<?php

include_once 'auth.php';
if(json_decode(auth(), true)['response'] !== 'success') {
    exit(json_decode(auth(), true)['response']);
}

if(isset($_POST['event'])) {
    
}