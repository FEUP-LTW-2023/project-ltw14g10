<?php
    declare(strict_types = 1);

    class Agent {
        public int $user;

        public function __construct(int $user)
        {
            $this->user = $user;
        }

    }
?>