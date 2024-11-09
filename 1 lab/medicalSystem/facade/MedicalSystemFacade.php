<?php
require_once '../domain/DoctorPool.php';
require_once '../domain/ScheduleManager.php';
require_once '../domain/MedicalRecordBuilder.php';
class MedicalSystemFacade
{
    private $doctorPool;
    private $scheduleManager;
    private $medicalRecordBuilder;

    public function __construct()
    {
        $this->doctorPool = DoctorPool::getInstance();
        $this->scheduleManager = ScheduleManager::getInstance();
        $this->medicalRecordBuilder = new MedicalRecordBuilder();
    }

    public function createDoctor($name, $specialty)
    {
        $doctor = new Doctor($name, $specialty);
        $this->doctorPool->addDoctor($doctor);
        return $doctor;
    }

    public function bookAppointment($doctor, $patient, $time)
    {
        $this->scheduleManager->addAppointment($doctor, $patient, $time);
    }

    public function createMedicalRecord($diagnosis, $treatment, $doctor)
    {
        return $this->medicalRecordBuilder
            ->setDiagnosis($diagnosis)
            ->setTreatment($treatment)
            ->setDoctor($doctor)
            ->build();
    }

    public function getSchedule()
    {
        return $this->scheduleManager->getSchedule();
    }
}
?>
