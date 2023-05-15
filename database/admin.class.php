<?php
    declare(strict_types = 1);

    class Admin {
        public int $user;

        public function __construct(int $user)
        {
            $this->user = $user;
        }

        static function addAdmin(PDO $db, int $id) {
            $stmt = $db->prepare('
              INSERT INTO ADMIN (USER_ID)
              VALUES (?)
            ');
        
            if ($stmt->execute(array($id))) {
                return new Admin($id);
            } else {
                return null;
            }
        }

    }
?>