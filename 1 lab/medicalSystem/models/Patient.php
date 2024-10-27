<?php
class Patient
{
    public $name;
    public $age;
    public $medicalHistory;

    public function __construct($name, $age, $medicalHistory)
    {
        $this->name = $name;
        $this->age = $age;
        $this->medicalHistory = $medicalHistory;
    }

    public function __clone()
    {
        $this->medicalHistory = clone $this->medicalHistory;
    }
}
?>

