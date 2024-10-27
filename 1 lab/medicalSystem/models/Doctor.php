<?php
class Doctor
{
    public $name;
    public $specialty;

    public function __construct($name, $specialty)
    {
        $this->name = $name;
        $this->specialty = $specialty;
    }
}
?>
