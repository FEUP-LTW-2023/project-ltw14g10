<?php
    declare(strict_types = 1);

    class Agent {
        public int $user;
        public int $subject;

        public function __construct(int $user, int $subject) {
            $this->user = $user;
            $this->subject = $subject;
        }

        static function addAgent(PDO $db, int $id): bool {
            $stmt = $db->prepare('
              INSERT INTO AGENT (USER_ID)
              VALUES (?)
            ');
        
            if ($stmt->execute(array($id))) {
                return true;
            } else {
                return false;
            }
        }

        static function isAgent(PDO $db, int $id): bool {
            $stmt = $db->prepare('
              SELECT USER_ID
              FROM AGENT
              WHERE USER_ID = ?
            ');
        
            $stmt->execute(array($id));

            if($stmt->fetch()) {
                return true;
            }
            return false;
        }

        static function deleteAgent(PDO $db, int $id): bool {
            $stmt = $db->prepare('
              DELETE FROM AGENT
              WHERE USER_ID = ?
            ');

            if ($stmt->execute(array($id))){
                return true;
            }
            return false;
        }

        static function getAgent(PDO $db, int $id) {
            $stmt = $db->prepare('
              SELECT *
              FROM AGENT
              WHERE USER_ID = ?
            ');

            $stmt->execute(array($id));

            $agent = $stmt->fetch();
            return new Agent((int)$agent['USER_ID'], (int)$agent['SUBJECT_ID']);
        }

        static function changeSubject(PDO $db, int $id, int $subject): bool {
            $stmt = $db->prepare('
              UPDATE AGENT
              SET SUBJECT_ID = ?
              WHERE USER_ID = ?
            ');

            if ($stmt->execute(array($subject, $id))){
                return true;
            }
            return false;
        }

    }
?>