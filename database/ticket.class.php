<?php
    declare(strict_types = 1);

    class Ticket {
        public int $id;
        public int $client;
        public ?int $agent;
        public int $subject;
        public int $status;
        public string $title;
        public string $description;
        public string $time;

        public function __construct(int $id, int $client, ?int $agent, int $subject, int $status, string $title, string $description, string $time)
        {
            $this->id = $id;
            $this->client = $client;
            $this->agent = $agent;
            $this->subject = $subject;
            $this->status = $status;
            $this->title = $title;
            $this->description = $description;
            $this->time = $time;
        }

        static function createTicket(PDO $db, int $client, int $subject, string $title, string $description, string $time): ?Ticket {
            $stmt = $db->prepare('
              INSERT INTO TICKET (CLIENT_ID, SUBJECT_ID, STATUS_ID, TITLE, DESCRIPTION, CREATED_AT)
              VALUES (?, ?, 1, ?, ?, ?)
            ');
      
            $executed = $stmt->execute(array($client, $subject, $title, $description, $time));

            if ($executed) {
                $ticketId = (int) $db->lastInsertId();
        
                return new Ticket($ticketId, $client, null, $subject, 1, $title, $description, $time);
            } else {
                return null;
            }
        }

    }
?>