<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/faq.class.php');

    $db = getDatabaseConnection();

    if (isset($_GET["subject"])) {
        $data = FAQ::getSubjectFAQsRaw($db, (int) $_GET["subject"]);
        header("Content-Type: application/json");
        echo json_encode($data);
        exit();
    }
?>