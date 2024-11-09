<?php
class MedicalRecordProxy
{
    private $medicalRecord;
    private $authorizedUser;

    public function __construct(MedicalRecord $medicalRecord, $authorizedUser)
    {
        $this->medicalRecord = $medicalRecord;
        $this->authorizedUser = $authorizedUser;
    }

    public function viewRecord()
    {
        if ($this->authorizedUser->hasPermission('view_medical_record')) {
            return $this->medicalRecord;
        }
        throw new Exception("Unauthorized access to medical record");
    }

    public function updateRecord($diagnosis, $treatment)
    {
        if ($this->authorizedUser->hasPermission('edit_medical_record')) {
            $this->medicalRecord->diagnosis = $diagnosis;
            $this->medicalRecord->treatment = $treatment;
        } else {
            throw new Exception("Unauthorized access to update medical record");
        }
    }
}
?>
