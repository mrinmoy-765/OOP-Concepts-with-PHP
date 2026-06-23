<?php

/*
Level 2: Constructors, Encapsulation, Getters/Setters

Car Class with Static Members
Static property: totalCarsCreated
Increment in constructor

Goal: Static properties & methods


Key Concept: Static Property

A static property:

Belongs to the class, not individual objects
Shared across all instances
Same value for every object

self:: is used to access static members inside the class
$this-> is for object-specific data

*/
class Car{
    public $brand;
    public $model;

    public static $totalCarsCreated = 0;

    public function __construct($brand,$model){
        $this->brand = $brand;
        $this ->model = $model;

        self::$totalCarsCreated++;
        
    }
}

$car1 = new Car("Toyota", "Corolla");
$car2 = new Car("Honda", "Civic");
$car3 = new Car("Tesla", "Model 3");

echo Car::$totalCarsCreated;