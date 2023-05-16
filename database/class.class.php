<?php
declare(strict_types = 1);

class Class_ {
    public int $id;
    public string $code;
    public string $name;
    public string $fullName;
    public string $year;

    public function __construct(int $id, string $code, string $name, string $fullName, string $year)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->fullName = $fullName;
        $this->year = $year;
    }
}
?>
