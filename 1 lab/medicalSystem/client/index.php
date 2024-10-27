<?php

require_once '../domain/ScheduleManager.php';
require_once '../domain/MedicalRecordBuilder.php';
require_once '../factory/AppointmentFactory.php';
require_once '../factory/MedicalFactory.php';
require_once '../models/Patient.php';
require_once '../models/Doctor.php';
require_once '../domain/DoctorPool.php';


$scheduleManager = ScheduleManager::getInstance();
$scheduleManager->addAppointment("Dr. Wonk", "Anne Hathaway", "2024-11-01 10:00");
print_r($scheduleManager->getSchedule());


$builder = new MedicalRecordBuilder();
$record = $builder->setDiagnosis("Flu")
    ->setTreatment("Rest and hydration")
    ->setDoctor("Dr. Wonk")
    ->build();
print_r($record);


$appointment = AppointmentFactory::createAppointment('checkup');
echo $appointment->bookAppointment();


$adultFactory = new AdultMedicalFactory();
$patient = $adultFactory->createPatient();
$doctor = $adultFactory->createDoctor();
print_r($patient);
print_r($doctor);


$doctorPool = new DoctorPool();
$doctorPool->addDoctor("Dr. Wonk");
$doctor = $doctorPool->getDoctor();
echo $doctor;
$doctorPool->releaseDoctor($doctor);
?>
