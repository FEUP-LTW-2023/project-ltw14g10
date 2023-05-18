<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/status.class.php');

    $db = getDatabaseConnection();

    if (isset($_POST["id"])) {
        Status::deleteStatus($db, $_POST["id"]);
        exit();
    }
?>