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

class MedicalRecordBuilder
{
    private $diagnosis;
    private $treatment;
    private $doctor;

    public function setDiagnosis($diagnosis)
    {
        $this->diagnosis = $diagnosis;
        return $this;
    }

    public function setTreatment($treatment)
    {
        $this->treatment = $treatment;
        return $this;
    }

    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;
        return $this;
    }

    public function build()
    {
        return new MedicalRecord($this->diagnosis, $this->treatment, $this->doctor);
    }
}
?>

