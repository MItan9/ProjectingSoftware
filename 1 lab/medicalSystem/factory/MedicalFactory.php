<?php

require_once '../models/Patient.php';
interface MedicalFactory
{
    public function createPatient();
    public function createDoctor();
}

class AdultMedicalFactory implements MedicalFactory
{
    public function createPatient()
    {
        return new Patient("Anne Hathaway", 41, "No prior medical history");
    }

    public function createDoctor()
    {
        return new Doctor("Dr. Wonk", "General Practitioner");
    }
}

class PediatricMedicalFactory implements MedicalFactory
{
    public function createPatient()
    {
        return new Patient("Jane Doe", 12, "Asthma");
    }

    public function createDoctor()
    {
        return new Doctor("Dr. Green", "Pediatrician");
    }
}
?>
