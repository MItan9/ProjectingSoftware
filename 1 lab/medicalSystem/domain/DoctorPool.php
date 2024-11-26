<?php
require_once '../utilities/Subject.php';

class DoctorPool implements Subject
{
    private static $instance = null;
    private $availableDoctors = [];
    private $inUseDoctors = [];
    private $observers = []; // Observers list

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DoctorPool();
        }
        return self::$instance;
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notify($eventData)
    {
        foreach ($this->observers as $observer) {
            $observer->update($eventData);
        }
    }

    public function addDoctor($doctor)
    {
        $this->availableDoctors[] = $doctor;
        $this->notify("Doctor added: {$doctor}");
    }

    public function getDoctor()
    {
        if (count($this->availableDoctors) == 0) {
            throw new Exception("No available doctors");
        }
        $doctor = array_pop($this->availableDoctors);
        $this->inUseDoctors[] = $doctor;
        $this->notify("Doctor assigned: {$doctor}");
        return $doctor;
    }

    public function releaseDoctor($doctor)
    {
        $key = array_search($doctor, $this->inUseDoctors);
        if ($key !== false) {
            unset($this->inUseDoctors[$key]);
            $this->availableDoctors[] = $doctor;
            $this->notify("Doctor released: {$doctor}");
        }
    }
}

?>
