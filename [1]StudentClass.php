<?php

/*
Level 1: Absolute Basics (Classes, Objects, Properties,
Methods)
1. Student Class

Create a Student class with:

Properties: name, age, grade
Method: getDetails()

Goal: Understand object creation and property access.

$this-> is for object-specific data

*/

class Student
{

    //properties
    public $name;
    public $age;
    public $grade;

    //Method to set Properties
    function setDetails($name, $age, $grade)
    {
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    //Method to display properties
    public function getDetails()
    {
        echo "Name: {$this->name}, Age: {$this->age}, Grade: {$this->grade}";
    }
}

//create an object 
$anna = new Student();
$anna->setDetails("Anna", 22, "A+");
$anna->getDetails();
