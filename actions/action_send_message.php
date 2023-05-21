<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/message.class.php');
require_once(__DIR__ . '/../database/faq.class.php');
require_once(__DIR__ . '/../utils/session.php');

$db = getDatabaseConnection();
$session = new Session();

if($session->getCSRF() !== $_POST['csrf']) {
    $validRegister = false;
    $session->addMessage('error', 'Invalid CSRF token');
    header('Location: /../pages/main-page.php');
  }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $ticketId = (int) $_POST['ticket_id'];
    $messageText = $_POST['message'];
    $selectedFaqId = $_POST['faq_id'];

    

    $message = Message::createMessage($db, $ticketId, $session->getId(), $messageText);
    
    if (!empty($selectedFaqId)) {
        $faq = FAQ::getFAQ($db, (int) $selectedFaqId);
        $message = Message::createMessage($db, $ticketId, $session->getId(), 'FAQ: ' . $faq->question . ' - ' . $faq->answer);
    }
    
    
    // Redirect back to chat.php with the preserved ticket ID
    header('Location: ../pages/chat.php');
    exit();
}
?>
