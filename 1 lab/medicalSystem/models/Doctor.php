// models/Doctor.php
<?php
class Doctor
{
    public $name;
    public $specialty;

    public function __construct($name, $specialty)
    {
        $this->name = $name;
        $this->specialty = $specialty;
    }

    public function getSpecialty()
    {
        return $this->specialty;
    }

    public function __toString()
    {
        return "Doctor: {$this->name}, Specialization: {$this->getSpecialty()}";
    }
}
?>
