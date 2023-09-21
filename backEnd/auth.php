<?php

include_once 'pdo.php';
session_start();

function auth () {
    if(isset($_SESSION['uID']) && isset($_SESSION['token'])) {
        $uID = $_SESSION['uID'];
        $token = $_SESSION['token'];
        $res = select("SELECT `last_update` FROM `session_tokens` WHERE `uID`='$uID' && `token`='$token' LIMIT 1");
        if(empty($res)) {            
            return json_encode(['response' => 'fail', 'error' => 'no matching par of token and uid', 'variant' => 'session']);
        } else {            
            return json_encode(['response' => 'success']);
        }
    } elseif(isset($_COOKIE['token']) && isset($_COOKIE['uID'])) {
        $uID = $_COOKIE['uID'];
        list($token, $signature) = explode(':', $_COOKIE['token'], 2);
        if (hash_hmac('sha256', $token, '1c985d6299b008c4630d30dc44a1ef6f9b3294f17b6661e1f30a02d2b7407fec') === $signature) {            
            $res = select("SELECT `last_update` FROM `session_tokens` WHERE `uID`='$uID' && `token`='$token' LIMIT 1");
            if(empty($res)) {
                return json_encode(['response' => 'fail', 'error' => 'no matching paiir of token and uid', 'variant' => 'cookies']);
            } else {
                $_SESSION['token'] = $token;
                $_SESSION['uID'] = $uID;
                if(select("SELECT `authLevel` FROM `user` WHERE `ID`='$uID' LIMIT 1")[0]['authLevel'] == 2 || select("SELECT `authLevel` FROM `user` WHERE `ID`='$uID' LIMIT 1") == 3) {                    
                    $_SESSION['auth'] = select("SELECT `authLevel` FROM `user` WHERE `ID`='$uID' LIMIT 1")[0]['authLevel'];
                }
                return json_encode(['response' => 'success']);
            }
        } else {
            return json_encode(['response' => 'fail', 'error' => "FATAL: signature is'nt real", 'variant' => 'cookies']);
        }
    } else {        
        return json_encode(['response' => 'fail', 'error' => 'no data found']);
    }
}

function authLevle () {
    if(isset($_SESSION['uID'])) {
        if(json_decode(auth())['response'] === 'success') {  
            return json_encode(["success"=>true,"level"=>$_SESSION['auth']]); 
        } else {
            return json_encode(["success"=>false,"error"=>"Keine gültigen Anmeldedaten gefunden"]); 
        }
    } else {
        return json_encode(["success"=>false,"error"=>"Keine Anmeldedaten gefunden"]); 
    }
}

function checkAdmin () {
    if(json_decode(auth(), true)['response'] !== "success") {
        return false;
    }
    if(isset($_SESSION['auth'])) {
        $auth = $_SESSION['auth'];
        if((int) $auth == 2 || (int) $auth == 3) {
            return true;
        }
    }
    return false;
}
