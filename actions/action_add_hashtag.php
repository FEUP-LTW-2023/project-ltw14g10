<?php
    require_once(__DIR__ . '/../database/admin.class.php');
    require_once(__DIR__ . '/../database/change.class.php');
    require_once(__DIR__ . '/../database/hashtag.class.php');
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    $db = getDatabaseConnection();

    if (isset($_POST["ticket_id"]) && isset($_POST["hashtag"])) {



        if(Hashtag::verifyIfHashtagExists($db, (int)$_POST["hashtag"], (int)$_POST["ticket_id"])) {
            $session->addMessage('error', 'Hashtag already exists for this ticket.');
            header('Location: /../pages/my-tickets.php');
            die();
        }
        $hashtag_id= (int)$_POST["hashtag"];
        $hashtag = Hashtag::getHashtag($db, $hashtag_id);
        

        Change::createChange($db, (int) $_POST["ticket_id"], "hashtag", $hashtag->tag);

        Hashtag::associateTicket($db, (int)$_POST["ticket_id"], (int)$_POST["hashtag"]);
        $session->addMessage('success', 'Hashtag added successfully.');
        header('Location: /../pages/my-tickets.php');
    }
?>