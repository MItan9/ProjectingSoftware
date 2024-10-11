<?php

interface Employee {
    public function calculateSalary();
}

class Developer implements Employee {
    private $salary;

    public function __construct($salary) {
        $this->salary = $salary;
    }

    public function calculateSalary() {
        return $this->salary;
    }
}

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

class SalaryCalculator {
    public function calculateTotalSalary(array $employees) {
        $totalSalary = 0;
        foreach ($employees as $employee) {
            $totalSalary += $employee->calculateSalary();
        }
        return $totalSalary;
    }
}

$employees = [
    new Developer(5000),
    new Manager(7000, 2000),
];

$salaryCalculator = new SalaryCalculator();
echo "Total Salary: " . $salaryCalculator->calculateTotalSalary($employees);
