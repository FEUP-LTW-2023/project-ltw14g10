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

        static function getSubjectsByYear(PDO $db, int $year) {
            $stmt = $db->prepare('
              SELECT ID, CODE, SUBJECT_NAME, FULL_NAME, YEAR
              FROM SUBJECT 
              WHERE YEAR = ?
            ');
      
            $stmt->execute(array($year));

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }
?>