<?php
    require_once(__DIR__ . '/../database/admin.class.php');
    require_once(__DIR__ . '/../database/agent.class.php');
    require_once(__DIR__ . '/../database/connection.db.php');

    $db = getDatabaseConnection();

    if (isset($_POST["agent_id"]) && isset($_POST["subject"])) {
        Agent::changeSubject($db, $_POST["agent_id"], $_POST["subject"]);
        header('Location: /../pages/admin-page.php');
    }
?>