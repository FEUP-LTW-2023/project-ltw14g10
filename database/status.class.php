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
                    $status['STATUS_TEXT']
                );
            }
            return $statuss;
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

    }
?>