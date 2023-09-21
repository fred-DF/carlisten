<?php
$message = "Hallo Welt!";
$key = "Carlisten";

// Verschlüsseln
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext = openssl_encrypt($message, $cipher, $key, $options=0, $iv);

// Entschlüsseln
$original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv); // Entschlüsseln Sie den verschlüsselten Text

echo "Original-Nachricht: " . $message . "\n";
echo "Verschlüsselter Text: " . base64_encode($ciphertext) . "\n";
echo "Entschlüsselter Text: " . $original_plaintext . "\n";
