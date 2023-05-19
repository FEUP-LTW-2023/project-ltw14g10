<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/subject.class.php');

    $db = getDatabaseConnection();

    if (isset($_POST["id"])) {
        Subject::deleteSubject($db, $_POST["id"]);
        exit();
    }
?>