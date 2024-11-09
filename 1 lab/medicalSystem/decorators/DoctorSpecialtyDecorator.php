<?php
require_once '../models/Doctor.php';

class DoctorSpecialtyDecorator extends Doctor
{
    protected $doctor;

    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
    }

    public function getSpecialty()
    {
        return $this->doctor->getSpecialty();
    }

    public function __toString()
    {
        return (string) $this->doctor; // Делегируем базовому объекту
    }
}

?>
