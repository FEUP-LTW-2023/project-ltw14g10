<?php
    declare(strict_types = 1);

    class Client {
        public int $user;

        public function __construct(int $user)
        {
            $this->user = $user;
        }

        static function addClient(PDO $db, int $id) {
            $stmt = $db->prepare('
              INSERT INTO CLIENT (USER_ID)
              VALUES (?)
            ');
        
            if ($stmt->execute(array($id))) {
                return new Client($id);
            } else {
                return null;
            }
        }
    }
?>