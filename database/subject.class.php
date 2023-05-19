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

        static function getSubjectsByYearRaw(PDO $db, int $year) {
            $stmt = $db->prepare('
              SELECT ID, CODE, SUBJECT_NAME, FULL_NAME, YEAR
              FROM SUBJECT 
              WHERE YEAR = ?
            ');
      
            $stmt->execute(array($year));

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        static function getSubjectsByYear(PDO $db, int $year) {
            $data = Subject::getSubjectsByYearRaw($db, $year);
            $subjects = array();
            foreach($data as $subject){
                $subjects[] = new Subject(
                    (int) $subject['ID'],
                    $subject['CODE'],
                    $subject['SUBJECT_NAME'],
                    $subject['FULL_NAME'],
                    (int) $subject['YEAR']
                );
            }
            return $subjects;
        }


        static function createSubject(PDO $db, string $code, string $subject_name, string $full_name, int $year): bool {
            $stmt = $db->prepare('
              INSERT INTO SUBJECT (CODE, SUBJECT_NAME, FULL_NAME, YEAR)
              VALUES (?, ?, ?, ?)
            ');
      
            if ($stmt->execute(array($code, $subject_name, $full_name, $year))){
                return true;
            }
            return false;
        }

        static function getSubject(PDO $db, int $id) : ?Subject {
            $stmt = $db->prepare('
              SELECT *
              FROM SUBJECT 
              WHERE ID = ?
            ');
            $stmt->execute(array($id));
            $subject = $stmt->fetch(PDO::FETCH_ASSOC);
            if($subject){
                return new Subject(
                    (int) $subject['ID'],
                    $subject['CODE'],
                    $subject['SUBJECT_NAME'],
                    $subject['FULL_NAME'],
                    (int) $subject['YEAR']
                );
            } else {
                return null;
            }
        }

    }
?>