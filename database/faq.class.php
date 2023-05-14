<?php
    declare(strict_types = 1);

    class FAQ {
        public int $id;
        public string $question;
        public string $answer;
        public int $department;

        public function __construct(int $id, string $question, string $answer, int $department)
        {
            $this->id = $id;
            $this->question = $question;
            $this->answer = $answer;
            $this->department = $department;
        }

    }
?>