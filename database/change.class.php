<?php
declare(strict_types=1);

class Change
{
    public $id;
    public $ticketId;
    public $whatChanged;
    public $toWhat;
    public $changedAt;

    public function __construct(int $id, int $ticketId, string $whatChanged, string $toWhat, string $changedAt)
    {
        $this->id = $id;
        $this->ticketId = $ticketId;
        $this->whatChanged = $whatChanged;
        $this->toWhat = $toWhat;
        $this->changedAt = $changedAt;
    }

    static function createChange(PDO $db, int $ticketId, string $whatChanged, string $toWhat): ?Change {
        $stmt = $db->prepare('
            INSERT INTO CHANGE (TICKET_ID, WHAT_CHANGED, TO_WHAT, CHANGED_AT)
            VALUES (?, ?, ?, ?)
        ');
    
        $changedAt = date('Y-m-d H:i:s');
        $executed = $stmt->execute(array($ticketId, $whatChanged, $toWhat, $changedAt));

    
        if ($executed) {
            $changeId = (int) $db->lastInsertId();
    
            return new Change($changeId, $ticketId, $whatChanged, $toWhat, $changedAt);
        } else {
            return null;
        }
    }

    static function getChangesByTicket(PDO $db, int $ticketId): array
    {
        $stmt = $db->prepare('
            SELECT *
            FROM CHANGE
            WHERE TICKET_ID = ?
        ');
        $stmt->execute(array($ticketId));
        $changesQuery = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $changes = array();
        foreach ($changesQuery as $change) {
            $changes[] = new Change(
                (int) $change['ID'],
                (int) $change['TICKET_ID'],
                $change['WHAT_CHANGED'],
                $change['TO_WHAT'],
                $change['CHANGED_AT']
            );
        }
        return $changes;
    }
    
    
    
    
}
?>
