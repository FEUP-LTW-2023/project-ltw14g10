<?php
    declare(strict_types = 1);

    class Agent {
        public int $user;

        public function __construct(int $user)
        {
            $this->user = $user;
        }

        static function addAgent(PDO $db, int $id): ?Agent {
            $stmt = $db->prepare('
              INSERT INTO AGENT (USER_ID)
              VALUES (?)
            ');
        
            if ($stmt->execute(array($id))) {
                return new Agent($id);
            } else {
                return null;
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

    }
?>