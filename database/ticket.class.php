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


CREATE TABLE TICKET (
    ID INTEGER PRIMARY KEY,
    CLIENT_ID INTEGER NOT NULL,
    AGENT_ID INTEGER NOT NULL,
    DEPARTMENT_ID INTEGER NOT NULL,
    TITLE TEXT NOT NULL,
    [DESCRIPTION] TEXT NOT NULL,
    [STATUS] TEXT NOT NULL,
    FOREIGN KEY (CLIENT_ID) REFERENCES CLIENT(USER_ID),
    FOREIGN KEY (AGENT_ID) REFERENCES AGENT(USER_ID),
    FOREIGN KEY (DEPARTMENT_ID) REFERENCES DEPARTMENT(ID)
);