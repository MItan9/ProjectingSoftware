<?php
class DoctorPool
{
    private $availableDoctors = [];
    private $inUseDoctors = [];

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

