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
              VALUES (?, ?, 2, ?, ?, ?)
            ');
      
            $executed = $stmt->execute(array($client, $subject, $title, $description, $time));

            if ($executed) {
                $ticketId = (int) $db->lastInsertId();
        
                return new Ticket($ticketId, $client, null, $subject, 2, $title, $description, $time);
            } else {
                return null;
            }
        }

        static function getTicket(PDO $db, int $ticketId) : ?Ticket {
            $stmt = $db->prepare('
              SELECT *
              FROM TICKET 
              WHERE ID = ?
            ');
            $stmt->execute(array($ticketId));
            $ticketQuery = $stmt->fetch(PDO::FETCH_ASSOC);
            if($ticketQuery == null){
                return null;
            }
            return new Ticket(
                (int) $ticketQuery['ID'],
                (int) $ticketQuery['CLIENT_ID'],
                $ticketQuery['AGENT_ID']==null ? null : (int) $ticketQuery['AGENT_ID'],
                (int) $ticketQuery['SUBJECT_ID'],
                (int) $ticketQuery['STATUS_ID'],
                $ticketQuery['TITLE'],
                $ticketQuery['DESCRIPTION'],
                $ticketQuery['CREATED_AT']
            );
        }

        static function getUserTickets(PDO $db, int $userId) : array {
            $stmt = $db->prepare('
              SELECT *
              FROM TICKET 
              WHERE CLIENT_ID = ?
            ');
            $stmt->execute(array($userId));
            $ticketsQuery = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tickets = array();
            foreach($ticketsQuery as $ticket){
                $tickets[] = new Ticket(
                    (int) $ticket['ID'],
                    (int) $ticket['CLIENT_ID'],
                    $ticket['AGENT_ID']==null ? null : (int) $ticket['AGENT_ID'],
                    (int) $ticket['SUBJECT_ID'],
                    (int) $ticket['STATUS_ID'],
                    $ticket['TITLE'],
                    $ticket['DESCRIPTION'],
                    $ticket['CREATED_AT']
                );
            }
            return $tickets;
        }

        static function getSubjectTickets(PDO $db, int $subjectId) : array {
            $stmt = $db->prepare('
              SELECT *
              FROM TICKET 
              WHERE SUBJECT_ID = ?
            ');
            $stmt->execute(array($subjectId));
            $ticketsQuery = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tickets = array();
            foreach($ticketsQuery as $ticket){
                $tickets[] = new Ticket(
                    (int) $ticket['ID'],
                    (int) $ticket['CLIENT_ID'],
                    $ticket['AGENT_ID']==null ? null : (int) $ticket['AGENT_ID'],
                    (int) $ticket['SUBJECT_ID'],
                    (int) $ticket['STATUS_ID'],
                    $ticket['TITLE'],
                    $ticket['DESCRIPTION'],
                    $ticket['CREATED_AT']
                );
            }
            return $tickets;
        }

        static function changeTicketAgent(PDO $db, int $ticketId, int $agentId) : bool {
            $stmt = $db->prepare('
              UPDATE TICKET
              SET AGENT_ID = ?
              WHERE ID = ?
            ');
            return $stmt->execute(array($agentId, $ticketId));
        }

        static function changeTicketSubject(PDO $db, int $ticketId, int $subjectId) : bool {
            $stmt = $db->prepare('
              UPDATE TICKET
              SET SUBJECT_ID = ?, AGENT_ID = NULL
              WHERE ID = ?
            ');
            return $stmt->execute(array($subjectId, $ticketId));
        }

    }
?>