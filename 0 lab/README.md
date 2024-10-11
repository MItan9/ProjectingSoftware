# SOLID Principles 

## What are SOLID Principles?

The SOLID principles are a set of design principles intended to make software designs more understandable, flexible, and maintainable. The acronym SOLID stands for:

1. **S**ingle Responsibility Principle (SRP)
    - A class should have one, and only one, reason to change. This means that each class should have only one job or responsibility.

2. **O**pen/Closed Principle (OCP)
    - Software entities (classes, modules, functions, etc.) should be open for extension but closed for modification. This allows behavior to be added without altering existing code.

3. **L**iskov Substitution Principle (LSP)
    - Objects of a superclass should be replaceable with objects of a subclass without affecting the correctness of the program. This encourages using polymorphism.

4. **I**nterface Segregation Principle (ISP)
    - Clients should not be forced to depend on interfaces they do not use. Instead of one large interface, several smaller, specific ones should be created.

5. **D**ependency Inversion Principle (DIP)
    - High-level modules should not depend on low-level modules. Both should depend on abstractions. This principle also states that abstractions should not depend on details; details should depend on abstractions.

---

# Example of Single responsibility principle

Class User
The User class represents a user and is solely responsible for storing their data. It contains two private properties: $name and $email, which hold the user's name and email address, respectively. The class constructor, the __construct($name, $email) method, initializes the user object by setting its name and email. The accessor methods getName() and getEmail() allow for retrieving this data.

The primary responsibility of the User class is to manage user data. It does not include functionality related to saving or retrieving that data, which enables easy management and modification of the logic associated with user data without needing to interfere with other parts of the application. This separation of responsibilities makes the class easier to test and maintain.

```php
class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}
```

On the other hand, the UserRepository class is responsible for interacting with user data. It provides methods for saving and retrieving users. The save(User user) method takes a User object and outputs information about its saving, aligning with its responsibility for the data storage process. The getByEmail($email) method creates a new User object with a predefined name ("John Doe") based on the provided email address, demonstrating how to retrieve user data.

Thus, the UserRepository class focuses exclusively on managing the storage and retrieval of user data without mixing business logic with data storage, which also adheres to the SRP.

```php
class UserRepository {
    public function save(User $user) {
        echo "Saving user " . $user->getName() . " with email " . $user->getEmail() . "\n";
    }

    public function getByEmail($email) {
        return new User("John Doe", $email);
    }
}

```
# Example of Open/Closed principle

The code begins with an interface called Employee, which defines a contract that any employee type must fulfill by implementing the calculateSalary method. By using this interface, we allow different employee types to be added without modifying existing code. For example, any new employee type (such as Intern or Contractor) can implement the Employee interface, thereby extending functionality without altering the existing classes.

```php
interface Employee {
    public function calculateSalary();
}

```

Next, we have the Developer class, which represents a developer and includes logic to calculate their salary based on a fixed amount. If we need to add more types of employees, we don't have to modify the Developer class; instead, we can simply create new classes that implement the Employee interface. This approach adheres to the OCP by allowing extensions without modification.

```php
class Developer implements Employee {
    private $salary;

    public function __construct($salary) {
        $this->salary = $salary;
    }

    public function calculateSalary() {
        return $this->salary;
    }
}


```

Similarly, the Manager class represents a manager and calculates their salary as the sum of their base salary and a bonus. Just like the Developer class, adding a new type of employee does not require changes to the Manager class. It can coexist alongside other employee types, each with its own salary calculation logic.

```php
class Manager implements Employee {
    private $salary;
    private $bonus;

    public function __construct($salary, $bonus) {
        $this->salary = $salary;
        $this->bonus = $bonus;
    }

    public function calculateSalary() {
        return $this->salary + $this->bonus;
    }
}


```

The SalaryCalculator class is responsible for calculating the total salary of a collection of employees. The calculateTotalSalary method operates on an array of Employee objects. If we introduce new employee types, we do not need to change the SalaryCalculator class. It can handle any new classes that implement the Employee interface, which respects the OCP.

```php
class SalaryCalculator {
    public function calculateTotalSalary(array $employees) {
        $totalSalary = 0;
        foreach ($employees as $employee) {
            $totalSalary += $employee->calculateSalary();
        }
        return $totalSalary;
    }
}


```

Finally, the usage example creates instances of Developer and Manager, then utilizes the SalaryCalculator to compute the total salary. If a new type of employee needs to be added, this can be achieved by simply creating a new class that implements the Employee interface, without requiring modifications to the existing Developer, Manager, or SalaryCalculator classes.

```php
$employees = [
    new Developer(5000),
    new Manager(7000, 2000),
];

$salaryCalculator = new SalaryCalculator();
echo "Total Salary: " . $salaryCalculator->calculateTotalSalary($employees);

```

# Conclusion
By applying SRP and OCP, the code exhibits a clear structure that promotes flexibility and ease of use. These principles not only improve the organization of the codebase but also enhance collaboration among developers by providing a clear framework for extending and modifying functionality. Following these design principles results in a robust architecture that can adapt to evolving requirements, ultimately leading to higher-quality software and more efficient development processes.

