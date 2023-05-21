<?php
declare(strict_types=1);

class Message
{
    public $id;
    public $ticketId;
    public $senderId;
    public $receiverId;
    public $messageText;
    public $createdAt;

    public function __construct(
        int $id,
        int $ticketId,
        int $senderId,
        int $receiverId,
        string $messageText,
        string $createdAt
    ) {
        $this->id = $id;
        $this->ticketId = $ticketId;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->messageText = $messageText;
        $this->createdAt = $createdAt;
    }

    static function getMessagesByTicket(PDO $db, int $ticketId): array
    {
        $stmt = $db->prepare('
        SELECT *
        FROM MESSAGE
        WHERE TICKET_ID = ?
    ');
        $stmt->execute(array($ticketId));
        $messagesQuery = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $messages = array();
        foreach ($messagesQuery as $message) {
            $messages[] = new Message(
                (int) $message['ID'],
                (int) $message['TICKET_ID'],
                (int) $message['SENDER_ID'],
                (int) $message['RECEIVER_ID'],
                $message['MESSAGE_TEXT'],
                $message['CREATED_AT']
            );
        }
        return $messages;
    }



}
?>