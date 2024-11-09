// domain/DoctorPool.php
<?php
class DoctorPool
{
    private static $instance = null;
    private $availableDoctors = [];
    private $inUseDoctors = [];

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DoctorPool();
        }
        return self::$instance;
    }

    public function addDoctor($doctor)
    {
        $this->availableDoctors[] = $doctor;
    }

    public function getDoctor()
    {
        if (count($this->availableDoctors) == 0) {
            throw new Exception("No available doctors");
        }
        $doctor = array_pop($this->availableDoctors);
        $this->inUseDoctors[] = $doctor;
        return $doctor;
    }

    public function releaseDoctor($doctor)
    {
        $key = array_search($doctor, $this->inUseDoctors);
        if ($key !== false) {
            unset($this->inUseDoctors[$key]);
            $this->availableDoctors[] = $doctor;
        }
    }
}
?>
