<?php
class ScheduleManager
{
    private static $instance;
    private $schedule = [];

    private function __construct() {}

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addAppointment($doctor, $patient, $time)
    {
        $this->schedule[] = [
            'doctor' => $doctor,
            'patient' => $patient,
            'time' => $time
        ];
    }

    public function getSchedule()
    {
        return $this->schedule;
    }
}
?>
