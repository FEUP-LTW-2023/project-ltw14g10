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

        static function usernameExists(PDO $db, string $username): bool{
            $stmt = $db->prepare('
              SELECT USERNAME
              FROM USER 
              WHERE USERNAME = ?
            ');

            $stmt->execute(array($username));

            if($stmt->fetch()) {
                return true;
            }
            return false;
        }

        static function emailExists(PDO $db, string $email): bool{
            $stmt = $db->prepare('
              SELECT EMAIL
              FROM USER 
              WHERE EMAIL = ?
            ');

            $stmt->execute(array($email));

            if($stmt->fetch()) {
                return true;
            }
            return false;
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

        static function getUserWithPassword(PDO $db, string $username, string $password) : ?User {
            $stmt = $db->prepare('
              SELECT ID, USERNAME, PASSWORD, EMAIL, NAME
              FROM USER 
              WHERE USERNAME = ?
            ');
      
            $stmt->execute(array($username));

            $user = $stmt->fetch();
            if(!$user){
                return null;
            }

            $hashedPassword = $user['PASSWORD'];
            if(password_verify($password, $hashedPassword)){
                return new User(
                    (int) $user['ID'],
                    $user['USERNAME'],
                    $password,
                    $user['EMAIL'],
                    $user['NAME']
                );
            } else return null;
        }
    }
?>