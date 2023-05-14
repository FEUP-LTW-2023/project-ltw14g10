<?php
    declare(strict_types = 1);

    class Ticket {
        public int $id;
        public int $client;
        public int $agent;
        public int $department;
        public string $title;
        public string $description;
        public string $status;

        public function __construct(int $id, int $client, int $agent, int $department, string $title, string $description, string $status)
        {
            $this->id = $id;
            $this->client = $client;
            $this->agent = $agent;
            $this->department = $department;
            $this->title = $title;
            $this->description = $description;
            $this->status = $status;
        }

    }
?>