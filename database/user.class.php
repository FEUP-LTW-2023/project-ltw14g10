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
            $this->username = $username;
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
      
            $executed = $stmt->execute(array($username, $hashedPassword, $email, $name));
        
            if ($executed) {
                $userId = (int) $db->lastInsertId();
        
                return new User($userId, $username, $password, $email, $name);
            } else {
                return null;
            }
        }

        static function getUserWithPassword(PDO $db, string $username, string $password) : ?User {
            $stmt = $db->prepare('
              SELECT *
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
                    $user['PASSWORD'],
                    $user['EMAIL'],
                    $user['NAME']
                );
            } else return null;
        }

        static function getUser(PDO $db, int $id) : User {
            $stmt = $db->prepare('
              SELECT *
              FROM USER 
              WHERE ID = ?
            ');
      
            $stmt->execute(array($id));

            $user = $stmt->fetch();
            return new User(
                (int) $user['ID'],
                $user['USERNAME'],
                $user['PASSWORD'],
                $user['EMAIL'],
                $user['NAME']
            );
        }

        public function updateName(PDO $db, string $new_name){
            $stmt = $db->prepare('
                UPDATE USER
                SET NAME = ?
                WHERE ID = ?
            ');
            $stmt->execute(array($new_name, $this->id));
        }

        public function updateUsername(PDO $db, string $new_username){
            $stmt = $db->prepare('
                UPDATE USER
                SET USERNAME = ?
                WHERE ID = ?
            ');
            $stmt->execute(array($new_username, $this->id));
        }

        public function updateEmail(PDO $db, string $new_email){
            $stmt = $db->prepare('
                UPDATE USER
                SET EMAIL = ?
                WHERE ID = ?
            ');
            $stmt->execute(array($new_email, $this->id));
        }

        public function updatePassword(PDO $db, string $new_password){
            $stmt = $db->prepare('
                UPDATE USER
                SET PASSWORD = ?
                WHERE ID = ?
            ');
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt->execute(array($hashedPassword, $this->id));
        }

        public function verifyPassword(PDO $db, string $old_password){
            $stmt = $db->prepare('
              SELECT PASSWORD
              FROM USER 
              WHERE ID = ?
            ');
      
            $stmt->execute(array($this->id));

            $user = $stmt->fetch();
            $hashedPassword = $user['PASSWORD'];
            if(password_verify($old_password, $hashedPassword)){
                return true;
            } else return false;
        }

        static function getAllUsers(PDO $db) : array {
            $stmt = $db->prepare('
              SELECT *
              FROM USER
            ');
            $stmt->execute();
            $usersQuery = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $users = array();
            foreach($usersQuery as $user){
                $users[] = new User(
                    (int) $user['ID'],
                    $user['USERNAME'],
                    $user['PASSWORD'],
                    $user['EMAIL'],
                    $user['NAME']
                );
            }
            return $users;
        }

        static function getName(PDO $db, int $id) : string{
            $stmt = $db->prepare('
              SELECT NAME FROM USER WHERE ID = ?
            ');
            $stmt->execute(array($id));
            $name = $stmt->fetch();
            
            return $name['NAME'];
        }

        static function getAllAgents(PDO $db){
            $stmt = $db->prepare('
              SELECT *
              FROM USER
              WHERE ID IN (SELECT USER_ID FROM AGENT)
            ');
            $stmt->execute();
            $usersQuery = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $users = array();
            foreach($usersQuery as $user){
                $users[] = new User(
                    (int) $user['ID'],
                    $user['USERNAME'],
                    $user['PASSWORD'],
                    $user['EMAIL'],
                    $user['NAME']
                );
            }
            return $users;
        }
    }
?>