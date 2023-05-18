<?php
    declare(strict_types = 1);

    class Subject {
        public int $id;
        public string $code;
        public string $subject_name;
        public string $full_name;
        public int $year;

        public function __construct(int $id, string $code, string $subject_name, string $full_name, int $year)
        {
            $this->id = $id;
            $this->code = $code;
            $this->subject_name = $subject_name;
            $this->full_name = $full_name;
            $this->year = $year;
        }

    }
?>