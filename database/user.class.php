<?php
    declare(strict_types = 1);

    class User {
        public int $id;
        public string $username;
        public string $password;
        public string $email;
        public string $name;

        public function __construct(int $id, string $username, string $password, string $email, string $name)
        {
            $this->id = $id;
            $this->username = $password;
            $this->password = $password;
            $this->email = $email;
            $this->name = $name;
        }

        static function validateUsername(PDO $db, string $username){

            $stmt = $db->prepare('
              SELECT USERNAME
              FROM USER 
              WHERE USERNAME = ?
            ');

            $stmt->execute(array($username));

            if($stmt->fetch()) {
                return 'Username already exists';
            }
            return '';
        }

        static function validateEmail(PDO $db, string $email){

            $stmt = $db->prepare('
              SELECT EMAIL
              FROM USER 
              WHERE EMAIL = ?
            ');

            $stmt->execute(array($email));

            if($stmt->fetch()) {
                return 'Email already in use';
            }
            return '';
        }

        static function registerUser(PDO $db, string $username, string $password, string $email, string $name) : ?User {
            $stmt = $db->prepare('
              INSERT INTO USER (USERNAME, PASSWORD, EMAIL, NAME)
              VALUES (?, ?, ?, ?)
            ');

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      
            $stmt->execute(array($username, $hashedPassword, $email, $name));
        
            if ($stmt->rowCount() > 0) {
                $userId = (int) $db->lastInsertId();
        
                return new User($userId, $username, $password, $email, $name);
            } else {
                return null;
            }
          }

    }
?>