<?php
    declare(strict_types = 1);

    class Status {
        public int $id;
        public string $status_text;

        public string $css_text;

        public function __construct(int $id, string $status_text, string $css_text)
        {
            $this->id = $id;
            $this->status_text = $status_text;
            $this->css_text = $css_text;
        }

        static function getAllStatus(PDO $db) : array {
            $stmt = $db->prepare('
              SELECT ID, STATUS_TEXT
              FROM STATUS
            ');
            $stmt->execute();
            $statussQuery = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $statuss = array();
            foreach($statussQuery as $status){
                $statuss[] = new Status(
                    (int) $status['ID'],
                    $status['STATUS_TEXT'],
                    $status['CSS_TEXT']
                );
            }
            return $statuss;
        }

        static function getStatus(PDO $db, int $id) : ?Status {
            $stmt = $db->prepare('
              SELECT *
              FROM STATUS 
              WHERE ID = ?
            ');
            $stmt->execute(array($id));
            $status = $stmt->fetch(PDO::FETCH_ASSOC);
            if($status){
                return new Status(
                    (int) $status['ID'],
                    $status['STATUS_TEXT'],
                    $status['CSS_TEXT']
                );
            }
            return null;
        }

        static function deleteStatus(PDO $db, int $id): bool {
            $stmt = $db->prepare('
              DELETE FROM STATUS
              WHERE ID = ?
            ');

            if ($stmt->execute(array($id))){
                return true;
            }
            return false;
        }

        static function createStatus(PDO $db, string $status_text): bool {
            $stmt = $db->prepare('
              INSERT INTO STATUS (STATUS_TEXT)
              VALUES (?)
            ');

            if ($stmt->execute(array($status_text))){
                return true;
            }
            return false;
        }

    }
?>