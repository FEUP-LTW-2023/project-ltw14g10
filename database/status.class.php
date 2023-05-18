<?php
    declare(strict_types = 1);

    class Status {
        public int $id;
        public string $status_text;

        public function __construct(int $id, string $status_text)
        {
            $this->id = $id;
            $this->status_text = $status_text;
        }

    }
?>