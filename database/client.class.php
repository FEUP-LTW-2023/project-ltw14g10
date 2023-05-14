<?php
    declare(strict_types = 1);

    class Client {
        public int $user;

        public function __construct(int $user)
        {
            $this->user = $user;
        }

    }
?>