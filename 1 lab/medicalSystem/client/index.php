<?php

require_once '../facade/MedicalSystemFacade.php';
require_once '../factory/AppointmentFactory.php';
require_once '../factory/MedicalFactory.php';
require_once '../decorators/DoctorSpecialtyDecorator.php';
require_once '../decorators/SurgeonSpecialty.php';
require_once '../decorators/CardiologistSpecialty.php';
require_once '../proxies/MedicalRecordProxy.php';
require_once '../models/Patient.php';
require_once '../models/Doctor.php';
require_once '../models/User.php';
require_once '../domain/DoctorPool.php';

// Используем Фасад для упрощенного взаимодействия с системой
$facade = new MedicalSystemFacade();

// Создаем врача через фасад
$doctor = $facade->createDoctor("Dr. Wonk", "Therapist");

// Добавляем дополнительные специальности с помощью Декоратора
$doctorWithSurgeonSpecialty = new SurgeonSpecialty($doctor);
$doctorWithCardiologistSpecialty = new CardiologistSpecialty($doctorWithSurgeonSpecialty);
echo "Doctor's Specialty: " . $doctorWithCardiologistSpecialty->getSpecialty() . "\n";

// Создаем пациента
$patient = new Patient("Anne Hathaway", 41, "No prior medical history");

// Запись на прием через фасад
$facade->bookAppointment($doctorWithCardiologistSpecialty, $patient, "2024-11-01 10:00");

// Получение расписания через фасад
$schedule = $facade->getSchedule();
foreach ($schedule as $appointment) {
    echo "Appointment:\n";
    echo "Doctor: " . $appointment['doctor'] . "\n"; // Использует __toString() для корректного вывода
    echo "Patient: {$appointment['patient']->name}, Age: {$appointment['patient']->age}, Medical History: {$appointment['patient']->medicalHistory}\n";
    echo "Time: {$appointment['time']}\n";
}

// Создаем медицинскую запись через фасад
$medicalRecord = $facade->createMedicalRecord("Flu", "Rest and hydration", $doctorWithCardiologistSpecialty);
echo "Medical Record:\n";
echo "Diagnosis: {$medicalRecord->diagnosis}\n";
echo "Treatment: {$medicalRecord->treatment}\n";
echo "Doctor: {$medicalRecord->doctor}\n";

// Используем Прокси для контроля доступа к медицинской записи
$authorizedUser = new User(['view_medical_record', 'edit_medical_record']); // Задаем права доступа
$proxy = new MedicalRecordProxy($medicalRecord, $authorizedUser);

try {
    // Просмотр записи через прокси
    $record = $proxy->viewRecord();
    echo "Viewed Medical Record:\n";
    echo "Diagnosis: {$record->diagnosis}\n";
    echo "Treatment: {$record->treatment}\n";
    echo "Doctor: {$record->doctor}\n";

    // Обновление записи через прокси
    $proxy->updateRecord("Severe Flu", "Hospitalization and intensive care");
    $updatedRecord = $proxy->viewRecord();
    echo "Updated Medical Record:\n";
    echo "Diagnosis: {$updatedRecord->diagnosis}\n";
    echo "Treatment: {$updatedRecord->treatment}\n";
    echo "Doctor: {$updatedRecord->doctor}\n";
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}

// Использование фабрики для создания записи на прием
$appointment = AppointmentFactory::createAppointment('checkup');
echo $appointment->bookAppointment() . "\n";

// Использование фабрики для создания пациента и врача
$adultFactory = new AdultMedicalFactory();
$patient = $adultFactory->createPatient();
$doctor = $adultFactory->createDoctor();
echo "Created Patient:\n";
echo "Name: {$patient->name}, Age: {$patient->age}, Medical History: {$patient->medicalHistory}\n";
echo "Created Doctor:\n";
echo "Name: {$doctor->name}, Specialty: {$doctor->specialty}\n";


$doctorPool = DoctorPool::getInstance();
$doctorPool->addDoctor("Dr. Wonk");
$doctorFromPool = $doctorPool->getDoctor();
echo  $doctorFromPool . "\n";
$doctorPool->releaseDoctor($doctorFromPool);

?>
