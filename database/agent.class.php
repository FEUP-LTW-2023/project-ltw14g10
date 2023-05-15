<?php
    declare(strict_types = 1);

    class Agent {
        public int $user;

        public function __construct(int $user)
        {
            $this->user = $user;
        }

        static function addAgent(PDO $db, int $id) {
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

    }
?>