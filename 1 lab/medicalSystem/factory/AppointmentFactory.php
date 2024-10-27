<?php
abstract class Appointment
{
    abstract public function bookAppointment();
}

class CheckupAppointment extends Appointment
{
    public function bookAppointment()
    {
        return "Booking a checkup appointment.";
    }
}

class SurgeryAppointment extends Appointment
{
    public function bookAppointment()
    {
        return "Booking a surgery appointment.";
    }
}

class AppointmentFactory
{
    public static function createAppointment($type)
    {
        switch ($type) {
            case 'checkup':
                return new CheckupAppointment();
            case 'surgery':
                return new SurgeryAppointment();
            default:
                throw new Exception("Unknown appointment type.");
        }
    }
}
?>
