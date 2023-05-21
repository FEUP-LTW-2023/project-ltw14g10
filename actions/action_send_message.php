<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/message.class.php');
require_once(__DIR__ . '/../database/faq.class.php');
require_once(__DIR__ . '/../utils/session.php');

$db = getDatabaseConnection();
$session = new Session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketId = (int) $_POST['ticket_id'];
    $messageText = $_POST['message'];
    $selectedFaqId = $_POST['faq_id'];

    if (!empty($selectedFaqId)) {
        $faq = FAQ::getFAQ($db, (int) $selectedFaqId);
        if ($faq) {
            $messageText = 'FAQ: ' . $faq->question . ' - ' . $faq->answer;
        }
    }

    $message = Message::createMessage($db, $ticketId, $session->getId(), $messageText);
    
    // Redirect back to chat.php with the preserved ticket ID
    header('Location: ../pages/chat.php');
    exit();
}
?>
