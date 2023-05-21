<?php
declare(strict_types=1);

class Message
{
    public $id;
    public $ticketId;
    public $senderId;
    public $messageText;
    public $createdAt;

    public function __construct(
        int $id,
        int $ticketId,
        int $senderId,
        string $messageText,
        string $createdAt
    ) {
        $this->id = $id;
        $this->ticketId = $ticketId;
        $this->senderId = $senderId;
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
                $message['MESSAGE_TEXT'],
                $message['CREATED_AT']
            );
        }
        return $messages;
    }

    public static function createMessage(PDO $db, int $ticketId, int $senderId, string $messageText): ?Message
    {
        $stmt = $db->prepare('
            INSERT INTO MESSAGE (TICKET_ID, SENDER_ID, MESSAGE_TEXT, CREATED_AT)
            VALUES (?, ?, ?, ?)
        ');

        $createdAt = date('Y-m-d H:i:s');
        $executed = $stmt->execute([$ticketId, $senderId, $messageText, $createdAt]);

        if ($executed) {
            $messageId = (int) $db->lastInsertId();

            return new Message(
                (int)$messageId,
                (int)$ticketId,
                (int)$senderId,
                $messageText,
                $createdAt
            );
        } else {
            return null;
        }
    }

}




?>