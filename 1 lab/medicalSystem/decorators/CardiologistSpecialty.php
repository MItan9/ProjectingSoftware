<?php
require_once 'DoctorSpecialtyDecorator.php';
class CardiologistSpecialty extends DoctorSpecialtyDecorator
{
    public function getSpecialty()
    {
        return $this->doctor->getSpecialty() . ', Cardiologist';
    }
    public function __toString()
    {
        return $this->doctor . ", Cardiologist";
    }
}
?>