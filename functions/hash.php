<?php

function encryptID($id) {
    $key = 'fdgsgsgs';

    $encryptedID = base64_encode($id ^ $key);

    return $encryptedID;
}

function decryptID($encryptedID) {
    $key = 'fdgsgsgs';

    $decryptedID = base64_decode($encryptedID) ^ $key;

    return $decryptedID;
}
?>
