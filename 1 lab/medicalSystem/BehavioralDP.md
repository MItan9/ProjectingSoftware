# Structural Design Patterns
## Author: Mihailova Tatiana
***
## Objectives:

1. Study and understand the Behavioral Design Patterns.
2. As a continuation of the previous laboratory work, think about the functionalities that your system will need to provide to the user.
3. Implement some additional functionalities using behavioral  design patterns.
***
## Some Theory
**Behavioral** design patterns are a category of design patterns that focus on the interactions and communication between objects. They help define how objects collaborate and distribute responsibility among them, making it easier to manage complex control flow and communication in a system.[1]
Types of Behavioral Design Patterns [2]:
-  **Chain Of Responsibility Method Design Pattern**

The Chain of Responsibility design pattern allows an object to pass a request along a chain of handlers. Each handler in the chain decides either to process the request or to pass it along the chain to the next handler. (Use them when your objects need to communicate in complicated ways. Choose them when you want to easily change how things behave while the program is running.)
 
- **Command Method Design Pattern**

The Command Design Pattern turns a request into a stand-alone object called a command. With the help of this pattern, you can capture each component of a request, including the object that owns the method, the parameters for the method, and the method itself. (In order to separate the requester making the request (the sender) from the object executing it, use the Command Pattern.
If you need to support undo and redo operations in your application, the Command Pattern is a good fit.)

-  **Interpreter Method Design Pattern**

The Interpreter design pattern defines a way to interpret and evaluate language grammar or expressions. It provides a mechanism to evaluate sentences in a language by representing their grammar as a set of classes.
(If you need to interpret and execute expressions or commands in a domain-specific language (DSL). If your application frequently requires the addition of new operations or commands.)

-  **Mediator Method Design Pattern**

Mediator Design Pattern defines an object that enacapsulates how a set of objects interact. Mediator promotes loose coupling by keeping objects from referring to each other explicity, and it vary from their interaction independently. (When your system involves a set of objects that need to communicate with each other in a complex manner
When you need a centralized mechanism to coordinate and control the interactions between objects, ensuring a more organized and maintainable system.)

-  **Memento Method Design Patterns**

The Memento design pattern is used to capture and restore an object’s internal state without violating encapsulation. It allows you to save and restore the state of an object to a previous state, providing the ability to undo or roll back changes made to the object. (When you need to save the state of an object at various points in time to support features like versioning or checkpoints.
When you need to rollback changes to an object’s state in case of errors or exceptions, such as in database transactions.)

-  **Observer Method Design Pattern**

Observer method or Observer design pattern also known as dependents and publish-subscribe. It define a one to many dependency between objects so that when one objects so that when one object change state, all its dependents are notified and updated automatically. (When a change to one object requires changing others, and you don't know how many objects need to be changed.
When an object should be able to notify other objects without making assumptions about who these objects are.)

-  **State Method Design Pattern**

State method or State Design Pattern also known as objects for states, it allow an object to alter its behaviour when its internal state changes. (When conditional statements (if-else or switch-case) become extensive and complex within your object.
If your object transitions between states frequently, the State pattern provides a clear mechanism for managing these transitions and their associated actions.)

-  **Strategy Method Design Pattern**

Strategy method or Strategy Design Pattern also known as Policy, it define a family of algorithm, encapsulate each one, and make them interchangeable. Strategy lets the algorithm vary independently from clients that use it. (When you have multiple algorithms that can be used interchangeably based on different contexts, such as sorting algorithms (bubble sort, merge sort, quick sort), searching algorithms, compression algorithms, etc.
When you need to dynamically select and switch between different algorithms at runtime based on user preferences, configuration settings, or system states.)

-  **Template Method Design Pattern**

Template method or Template Design Pattern, it define the skeleton of an algorithm in an operation, deferring some steps to subclasses. Template Method lets subclasses redefine certain steps of an algorithm without changing the algorithm's structure. (If you have similar tasks or processes that need to be performed in different contexts.
It’s beneficial when you want to enforce a specific structure or sequence of steps in an algorithm while allowing for flexibility in certain parts.)

-  **Visitor Method Design Pattern**

The Visitor design pattern allows you to add new operations to a group of related classes without modifying their structures. It is particularly useful when you have a stable set of classes but need to perform various operations on them, making it easy to extend functionality without altering the existing codebase. (When you have a set of related classes and need to perform different operations on them, the Visitor pattern allows you to add new operations without changing the classes.
Use it when your object structure is unlikely to change frequently, but you anticipate needing to add new operations over time.)

***
## Used Design Patterns:
### Observer Method

1. *The Subject (DoctorPool):*

The `DoctorPool` class is responsible for managing doctors.
It acts as the subject that sends notifications whenever an event occurs (e.g., adding, assigning, or releasing a doctor).

```php
 public function notify($eventData)
    {
        foreach ($this->observers as $observer) {
            $observer->update($eventData);
        }
    }

    public function addDoctor($doctor)
    {
        // Add doctor logic
        $this->notify("Doctor added: $doctor");
    }
```

2. *The Observers (Logger and EmailNotifier):*

`LoggerObserver:` Logs every event, like adding or releasing a doctor.
`EmailNotifierObserver:` Sends notifications (e.g., emails) when an event occurs.
Both observers are registered to the DoctorPool and get notified automatically about every significant change.


The **Observer interface** ensures that all observers have an update() method. This method is called when the subject sends notifications.

```php
interface Observer
{
    public function update($eventData);
}

```

Two classes (LoggerObserver and EmailNotifierObserver) implement the Observer interface. They define specific behavior for the update() method:
```php
                           LoggerObserver logs the event
class LoggerObserver implements Observer
{
    public function update($eventData)
    {
        echo "[Logger] Event: $eventData\n";
    }
}

```

```php
                        EmailNotifierObserver sends notifications
class EmailNotifierObserver implements Observer
{
    public function update($eventData)
    {
        echo "[EmailNotifier] Notification sent: $eventData\n";
    }
}

```

The **Subject interface** ensures that the subject can add (attach()) and remove (detach()) observers and notify all registered observers using notify().

```php
interface Subject
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify($eventData);
}

```

### Expected Output:
```
[Logger] Event: Doctor added: Dr. Strange
[EmailNotifier] Email sent for event: Doctor added: Dr. Strange
[Logger] Event: Doctor assigned: Dr. Strange
[EmailNotifier] Email sent for event: Doctor assigned: Dr. Strange
[Logger] Event: Doctor released: Dr. Strange
[EmailNotifier] Email sent for event: Doctor released: Dr. Strange
```

## Conclusion
The DoctorPool manages doctors and uses the Observer Pattern to notify registered observers, like a logger or email notifier, about events such as adding, assigning, or releasing a doctor. When these events happen, the observers are automatically informed and handle their tasks, like recording the event in a log or sending an email.

This approach keeps the DoctorPool focused on its main job—managing doctors—without being tied to how notifications are handled. It also makes the system flexible, as new observers (e.g., for tracking analytics) can be added without changing the core logic. This ensures that notifications and logging happen consistently and automatically, making the system easier to maintain and extend.

## Bibliography:
- [1]https://www.geeksforgeeks.org/behavioral-design-patterns/  Thanks to this resource, I have a better understanding of the topic and have learnt Behavioral Patterns
- [2]https://refactoring.guru/design-patterns/catalog











