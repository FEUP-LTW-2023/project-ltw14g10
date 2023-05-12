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

    }
?>