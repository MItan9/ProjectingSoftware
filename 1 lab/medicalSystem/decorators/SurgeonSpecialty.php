<?php
require_once 'DoctorSpecialtyDecorator.php';
class SurgeonSpecialty extends DoctorSpecialtyDecorator
{
    public function getSpecialty()
    {
        return $this->doctor->getSpecialty() . ', Surgeon';
    }
    public function __toString()
    {
        return $this->doctor . ", Surgeon";
    }
}