<?php
    declare(strict_types = 1);

    class FAQ {
        public int $id;
        public string $question;
        public string $answer;
        public int $subject;

        public function __construct(int $id, string $question, string $answer, int $subject)
        {
            $this->id = $id;
            $this->question = $question;
            $this->answer = $answer;
            $this->subject = $subject;
        }

        static function getSubjectFAQsRaw(PDO $db, int $subject_id): array
        {
            $stmt = $db->prepare('
            SELECT *
            FROM FAQ 
            WHERE SUBJECT_ID = ?');
            $stmt->execute(array($subject_id));
            return $stmt->fetchAll();
        }

        static function getSubjectFAQs(PDO $db, int $subject_id): array
        {
            $data = FAQ::getSubjectFAQsRaw($db, $subject_id);
            $faqs = array();
            foreach ($data as $faq) {
                $faqs[] = new FAQ(
                    (int) $faq['ID'],
                    $faq['QUESTION'],
                    $faq['ANSWER'],
                    (int) $faq['SUBJECT_ID']
                );
            }
            return $faqs;
        }
    }
?>