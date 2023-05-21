<?php
    declare(strict_types = 1);

    class Hashtag {
        public int $id;
        public string $tag;

        public function __construct(int $id, string $tag)
        {
            $this->id = $id;
            $this->tag = $tag;
        }

        static function drawAllHashtags(PDO $db): array {
            $stmt = $db->prepare('
            SELECT *
            FROM HASHTAG');
            $stmt->execute();
            $hashtags = $stmt->fetchAll();
            $hashtagArray = array();
            foreach($hashtags as $hashtag) {
                $hashtagArray[] = new Hashtag(
                    (int) $hashtag['id'],
                    $hashtag['tag']
                );
            }
            return $hashtagArray;
        }

        static function getHashtagsFromTicket(PDO $db, int $ticket_id): array {
            $stmt = $db->prepare('
            SELECT HASHTAG.ID, HASHTAG.TAG
            FROM HASHTAG, TICKET_HASHTAG
            WHERE HASHTAG.ID = TICKET_HASHTAG.TAG
            AND TICKET_HASHTAG.TICKET_ID = ?');
            $stmt->execute(array($ticket_id));
            $hashtags = $stmt->fetchAll();
            $hashtagArray = array();
            foreach($hashtags as $hashtag) {
                $hashtagArray[] = new Hashtag(
                    (int) $hashtag['ID'],
                    $hashtag['TAG']
                );
            }
            return $hashtagArray;
        }

        static function associateTicket(PDO $db, int $ticket_id, int $hashtag_id): void {
            $stmt = $db->prepare('
            INSERT INTO TICKET_HASHTAG (TICKET_ID, TAG)
            VALUES (?, ?)');
            $stmt->execute(array($ticket_id, $hashtag_id));
        }

    }
?>