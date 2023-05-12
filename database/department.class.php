<?php
    declare(strict_types = 1);

    class Department {
        public int $id;
        public string $name;

        public function __construct(int $id, string $name)
        {
            $this->id = $id;
            $this->name = $name;
        }


    }
?>