<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/subject.class.php');

    $db = getDatabaseConnection();

    if (isset($_GET["year"])) {
        $data = Subject::getSubjectsByYearRaw($db, (int) $_GET["year"]);
        header("Content-Type: application/json");
        echo json_encode($data);
        exit();
    }
?>