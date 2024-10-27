<?php
class MedicalRecord
{
    public $diagnosis;
    public $treatment;
    public $doctor;

    public function __construct($diagnosis, $treatment, $doctor)
    {
        $this->diagnosis = $diagnosis;
        $this->treatment = $treatment;
        $this->doctor = $doctor;
    }
}
?>
