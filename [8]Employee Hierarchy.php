<?php
/*

7. Employee Hierarchy
Base: Employee
name, salary
Child:
Manager (bonus)
Developer (programmingLanguage)

Add method: calculateSalary()

Goal: Code reuse via inheritance

*/


// Base Class
class Employee {
    protected $name;
    protected $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function calculateSalary() {
        return $this->salary;
    }

    public function getDetails() {
        return "Name: {$this->name}, Salary: {$this->calculateSalary()}";
    }
}

// Manager Class
class Manager extends Employee {
    private $bonus;

    public function __construct($name, $salary, $bonus) {
        parent::__construct($name, $salary);
        $this->bonus = $bonus;
    }

    public function calculateSalary() {
        return $this->salary + $this->bonus;
    }
}

// Developer Class
class Developer extends Employee {
    private $programmingLanguage;

    public function __construct($name, $salary, $programmingLanguage) {
        parent::__construct($name, $salary);
        $this->programmingLanguage = $programmingLanguage;
    }

    public function getDetails() {
        return "Name: {$this->name}, Language: {$this->programmingLanguage}, Salary: {$this->calculateSalary()}";
    }
}

// Testing

$manager = new Manager("Alice", 50000, 10000);
$developer = new Developer("Bob", 40000, "PHP");

echo $manager->getDetails();
echo "\n";
echo $developer->getDetails();

?>



