<?php
    declare(strict_types = 1);

    class Admin {
        public int $user;

        public function __construct(int $user)
        {
            $this->user = $user;
        }

        static function addAdmin(PDO $db, int $id): ?Admin {
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

        static function isAdmin(PDO $db, int $id): bool {
            $stmt = $db->prepare('
              SELECT USER_ID
              FROM ADMIN
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