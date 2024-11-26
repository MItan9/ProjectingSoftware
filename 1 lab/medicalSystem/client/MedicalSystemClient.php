<?php
require_once '../domain/DoctorPool.php';
require_once '../utilities/LoggerObserver.php';
require_once '../utilities/EmailNotifierObserver.php';

$doctorPool = DoctorPool::getInstance();
$logger = new LoggerObserver();
$emailNotifier = new EmailNotifierObserver();

// Attach observers to DoctorPool
$doctorPool->attach($logger);
$doctorPool->attach($emailNotifier);

// Add and assign doctors
$doctorPool->addDoctor("Dr. Strange");
$doctor = $doctorPool->getDoctor();
$doctorPool->releaseDoctor($doctor);
