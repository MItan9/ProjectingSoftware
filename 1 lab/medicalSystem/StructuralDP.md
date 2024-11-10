# Structural Design Patterns
## Author: Mihailova Tatiana
***
## Objectives:

1. Study and understand the Structural Design Patterns.
2. As a continuation of the previous laboratory work, think about the functionalities that your system will need to provide to the user.
3. Implement some additional functionalities using structural design patterns.
***
## Some Theory
**Structural** Design Patterns are solutions in software design that focus on how classes and objects are organized to form larger, functional structures. These patterns help developers simplify relationships between objects, making code more efficient, flexible, and easy to maintain. By using structural patterns, you can better manage complex class hierarchies, reuse existing code, and create scalable architectures.[1]

Types of Structural Design Patterns [2]:
-  Adapter
-  Bridge 
-  Composite    
-  Decorator
-  Facade
-  Flyweigh
-  Proxy
***
## Used Design Patterns:
1. The **Proxy Pattern** is used to control access to the medical records. `MedicalRecordProxy` acts as an intermediary that checks if a user has the necessary permissions to view or update a medical record. If the user lacks the required permissions, an exception is thrown to prevent unauthorized access.

To control access to a medical record, the proxy checks if the user has the required permissions. If not, an exception is thrown.
```php
$authorizedUser = new User(['view_medical_record', 'edit_medical_record']);
$proxy = new MedicalRecordProxy($medicalRecord, $authorizedUser);

try {
    $record = $proxy->viewRecord();
    echo "Viewed Medical Record:\n";
    echo "Diagnosis: {$record->diagnosis}\n";
    echo "Treatment: {$record->treatment}\n";
    echo "Doctor: {$record->doctor}\n";
    
    // Attempt to update the record
    $proxy->updateRecord("Severe Flu", "Hospitalization and intensive care");
    $updatedRecord = $proxy->viewRecord();
    echo "Updated Medical Record:\n";
    echo "Diagnosis: {$updatedRecord->diagnosis}\n";
    echo "Treatment: {$updatedRecord->treatment}\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

Expected output:
```php
Viewed Medical Record:
Diagnosis: Flu
Treatment: Rest and hydration
Doctor: Doctor: Dr. Wonk, Specialization: Therapist, Surgeon, Cardiologist
Updated Medical Record:
Diagnosis: Severe Flu
Treatment: Hospitalization and intensive care
Doctor: Doctor: Dr. Wonk, Specialization: Therapist, Surgeon, Cardiologist
```

2. The **Decorator Pattern** allows dynamically adding multiple specialties to a doctor object. The `DoctorSpecialtyDecorator` base class is extended by `SurgeonSpecialty` and `CardiologistSpecialty`, allowing a doctor to have more than one specialty. Each decorator adds additional behavior to the original `Doctor` object without modifying its structure.

A doctor can be created with a base specialty and then decorated with additional specialties using the `Decorator Pattern`.

```php
$doctor = new Doctor("Dr. Wonk", "Therapist");
$doctorWithSurgeonSpecialty = new SurgeonSpecialty($doctor);
$doctorWithCardiologistSpecialty = new CardiologistSpecialty($doctorWithSurgeonSpecialty);

echo "Doctor's Specialties: " . $doctorWithCardiologistSpecialty->getSpecialty();
```

Expected output:

```php
Doctor's Specialty: Therapist, Surgeon, Cardiologist
```


3. The **Facade Pattern**  is implemented through the `MedicalSystemFacade` class, which simplifies interactions with complex subsystems involved in managing medical records, doctors, and appointments.

*Creating Doctors and Patients:* creates doctors with specific specializations or patients with specific details, hiding the details of object creation or any logic that might be involved.

*Booking Appointments:* simplifies the process of scheduling an appointment. Instead of interacting with multiple classes or methods, the client can call a single method in the facade to book an appointment with a specific doctor and patient at a specified time.

*Creating Medical Records:* creates  medical record with details about the diagnosis, treatment, and the doctor assigned. This hides any additional complexities involved in creating and managing records.

```php
$facade = new MedicalSystemFacade();

$doctor = $facade->createDoctor("Dr. Wonk", "Therapist");

$patient = new Patient("Anne Hathaway", 41, "No prior medical history");

$facade->bookAppointment($doctor, $patient, "2024-11-01 10:00");
$medicalRecord = $facade->createMedicalRecord("Flu", "Rest and hydration", $doctor);
echo "Medical Record Created:\n";
echo "Diagnosis: {$medicalRecord->diagnosis}\n";
echo "Treatment: {$medicalRecord->treatment}\n";
echo "Doctor: {$medicalRecord->doctor}\n";
```

Expected Output:
```php
Medical Record:
Diagnosis: Flu
Treatment: Rest and hydration
Doctor: Doctor: Dr. Wonk, Specialization: Therapist, Surgeon, Cardiologist

Booking a checkup appointment.
Created Patient:
Name: Anne Hathaway, Age: 41, Medical History: No prior medical history
Created Doctor:
Name: Dr. Wonk, Specialty: General Practitioner
```

## Conclusion
In this medical system, three structural design patterns — Proxy, Decorator, and Facade — work together to make the system secure, flexible, and user-friendly. The `Proxy Pattern` adds security by ensuring only authorized users can view or edit sensitive records. The `Decorator Pattern` allows us to add multiple specialties to a doctor dynamically, enhancing flexibility. Finally, the `Facade Pattern` simplifies complex interactions, providing an easy, unified way to manage doctors, patients, and appointments.

## Bibliography:
- [1]https://www.geeksforgeeks.org/structural-design-patterns/  Thanks to this resource, I have a better understanding of the topic and have learnt Structural Patterns
- [2]https://refactoring.guru/design-patterns/catalog











