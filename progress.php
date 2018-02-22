<?php
    session_start();
    $pName = ini_get("session.upload_progress.prefix") . "postForm";
    echo json_encode(@$_SESSION[$pName] ?: []);
?>