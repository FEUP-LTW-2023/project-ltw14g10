<?php
    require_once(__DIR__ . '/../database/admin.class.php');
    require_once(__DIR__ . '/../database/agent.class.php');
    require_once(__DIR__ . '/../database/connection.db.php');

    $db = getDatabaseConnection();

    if (isset($_POST["id"]) && isset($_POST["role"])) {
        if ($_POST["role"] == "admin"){
            if(!Agent::isAgent($db, $_POST["id"])){
                Agent::addAgent($db, $_POST["id"]);
                Admin::addAdmin($db, $_POST["id"]);
            }
            else if (!Admin::isAdmin($db, $_POST["id"])){
                Admin::addAdmin($db, $_POST["id"]);
            }
        }
        else if ($_POST["role"] == "agent"){
            if(!Agent::isAgent($db, $_POST["id"])){
                Agent::addAgent($db, $_POST["id"]);
            }
            else if (Admin::isAdmin($db, $_POST["id"])){
                Admin::deleteAdmin($db, $_POST["id"]);
            }
        }
        else if($_POST["role"] == "client"){
            if(Admin::isAdmin($db, $_POST["id"])){
                Admin::deleteAdmin($db, $_POST["id"]);
                Agent::deleteAgent($db, $_POST["id"]);
            }
            else if (Agent::isAgent($db, $_POST["id"])){
                Agent::deleteAgent($db, $_POST["id"]);
            }
        }
        exit();
    }
?>