<?php
  function decrypt($data) {
    $key = $data["key"];
    $iv = $data["iv"];

    $content_key = file_get_contents("../keys/private_key.pem");

    $private_key = openssl_pkey_get_private($content_key);

    openssl_private_decrypt(base64_decode($key), $key, $private_key);
    openssl_private_decrypt(base64_decode($iv), $iv, $private_key);

    $key = trim($key, '"');
    $iv = trim($iv, '"');

    $crypto = $data["message"];

    $decrypted_message = openssl_decrypt($crypto, "aes-128-cbc", $key, OPENSSL_ZERO_PADDING, $iv);

    $decrypted_message = trim($decrypted_message);
    $decrypted_message = json_decode($decrypted_message, true);

    return $decrypted_message;
  }
?>
