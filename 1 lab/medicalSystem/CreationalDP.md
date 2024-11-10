# Creational Design Patterns
## Author: Mihailova Tatiana
***
## Objectives:


1. Study and understand the Creational Design Patterns.
2. Choose a domain area, define its main classes/models/entities and choose the appropriate instantiation mechanisms.
3. Implement 3 creational design patterns for object instantiation in a sample project.
***

## Some Theory
Design patterns are typical solutions to commonly occurring problems in software design. They are like pre-made blueprints that you can customize to solve a recurring design problem in your code.[1]
All patterns can be categorized by their intent, or purpose. This book covers three main groups of patterns:

- **Creational patterns** provide object creation mechanisms that increase flexibility and reuse of existing code.

- **Structural patterns** explain how to assemble objects and classes into larger structures, while keeping these structures flexible and efficient.

- **Behavioral patterns** take care of effective communication and the assignment of responsibilities between objects.[1]

***

## Used Design Patterns:
- Singleton
- Builder
- Factory Method
- Abstract Factory
- Object Pooling

# Medical System Project

My project implements a simple medical system using PHP, demonstrating various **creational design patterns**. The system consists of classes such as `Patient`, `Doctor`, `Appointment`, and `MedicalRecord`.

1. *Singleton* (Class: ScheduleManager)

The Singleton pattern ensures that there is only one instance of the ScheduleManager class, which manages the appointments schedule. The getInstance() method is used to obtain the single instance of this class.
```php
$scheduleManager = ScheduleManager::getInstance();
$scheduleManager->addAppointment("Dr. Wonk", "Anne Hathaway", "2024-11-01 10:00");
print_r($scheduleManager->getSchedule());
```

Expected Output:
```php
Array
(
    [0] => Array
        (
            [doctor] => Dr. Wonk
            [patient] => Anne Hathaway
            [time] => 2024-11-01 10:00
        )
)
```

2. *Builder* (Class: MedicalRecordBuilder)

The Builder pattern is used to create complex objects step by step. In this case, we use it to build a MedicalRecord object, which contains a diagnosis, treatment, and the doctor who made the diagnosis.
```php
$builder = new MedicalRecordBuilder();
$record = $builder->setDiagnosis("Flu")
    ->setTreatment("Rest and hydration")
    ->setDoctor("Dr. Wonk")
    ->build();
print_r($record);
```

Expected Output:
```php
MedicalRecord Object
(
    [diagnosis] => Flu
    [treatment] => Rest and hydration
    [doctor] => Dr. Wonk
)
```

3. *Factory Method* (Class: AppointmentFactory)

The Factory Method pattern is used to create objects without specifying the exact class of object that will be created. In this case, we use it to create different types of appointments (CheckupAppointment and SurgeryAppointment).
```php
$appointment = AppointmentFactory::createAppointment('checkup');
echo $appointment->bookAppointment();
```

Expected Output:
```php
Booking a checkup appointment.
```


4. *Abstract Factory* (Classes: AdultMedicalFactory, PediatricMedicalFactory)

The Abstract Factory pattern provides an interface for creating related objects (like Patient and Doctor) without specifying their concrete classes. We have two factories here: one for adult patients and another for pediatric patients.

```php
$adultFactory = new AdultMedicalFactory();
$patient = $adultFactory->createPatient();
$doctor = $adultFactory->createDoctor();
print_r($patient);
print_r($doctor);
```

Expected Output:

```php
Patient Object
(
    [name] => Anne Hathaway
    [age] => 41
    [medicalHistory] => No prior medical history
)
Doctor Object
(
    [name] => Dr. Wonk
    [specialty] => General Practitioner
)
```

5. *Object Pooling* (Class: DoctorPool)

The Object Pooling pattern is used to manage reusable objects efficiently. Here, it manages a pool of doctors. Doctors can be fetched from the pool when needed and released back after use.
```php
$doctorPool = new DoctorPool();
$doctorPool->addDoctor("Dr. Wonk");
$doctor = $doctorPool->getDoctor();
echo $doctor;
$doctorPool->releaseDoctor($doctor);
```

Expected Output:
```php
Dr. Wonk
```

## Conclusion 
My project demonstrated the effective use of creational design patterns in building a flexible and maintainable medical system. We applied Singleton for centralized appointment management, Builder for constructing complex MedicalRecord objects, and Factory Method for creating different appointment types. Abstract Factory helped generate related objects like patients and doctors, while Object Pooling optimized resource usage by reusing doctor objects.

By leveraging these patterns, we improved code structure, scalability, and maintainability, showcasing how creational patterns solve common object creation challenges in real-world applications.

***
## Bibliography:
- [1]https://refactoring.guru/design-patterns/classification  Thanks to this resource, I have a better understanding of the topic and have learnt Design Patterns