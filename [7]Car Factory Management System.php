<?php

/*

Objective

Build a system that simulates a car manufacturing factory, where:

Cars are produced
Factory tracks production
Each car has its own identity
System maintains global stats

REQUIREMENTS (CORE)
1. Car Class

Each car must have:

brand
model
color
unique ID (auto-generated)
Methods:
getDetails() → returns all car info

2. Static Counter (IMPORTANT)

The system must:

Track total number of cars produced
This should be done using a static property


3. Factory Class

Create a CarFactory class:

Responsibilities:
Create cars
Store produced cars
Provide factory-level info
Methods:
produceCar($brand, $model, $color)
getAllCars()
getTotalProducedCars()

Level 2 Enhancements
Add method: findCarById($id)
Add method: getCarsByBrand($brand)

*/

// REQUIREMENT 1: Car Class
class Car {
    public $id;
    public $brand;
    public $model;
    public $color;
    private static $carCounter = 0;

    public function __construct($brand, $model, $color) {
        self::$carCounter++;
        $this->id = self::$carCounter;
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
    }

    // Required method: getDetails()
    public function getDetails() {
        return "Car ID: {$this->id} | Brand: {$this->brand} | Model: {$this->model} | Color: {$this->color}";
    }
}

// REQUIREMENT 2 & 3: Factory Class
class CarFactory {
    public static $totalCarsCreated = 0;
    public static $collection = [];

    public function produceCar($brand, $model, $color) {
        // Create a new Car object
        $car = new Car($brand, $model, $color);

        // Add the car to collection
        self::$collection[] = $car;
        self::$totalCarsCreated++;

        return $car;
    }

    public function getAllCars() {
        return self::$collection;
    }

    public function getTotalProducedCars() {
        return self::$totalCarsCreated;
    }

    // LEVEL 2: Find car by ID
    public function findCarById($id) {
        foreach (self::$collection as $car) {
            if ($car->id == $id) {
                return $car;  // Return the car object
            }
        }
        return null;  
    }

    // LEVEL 2: Find cars by brand
    public function getCarsByBrand($brand) {
        $carsByBrand = [];
        foreach (self::$collection as $car) {
            if ($car->brand === $brand) {
                $carsByBrand[] = $car;
            }
        }
        return $carsByBrand;
    }
}


$factory = new CarFactory();

$car1 = $factory->produceCar("Toyota", "Corolla", "White");
$car2 = $factory->produceCar("Honda", "Civic", "Black");
$car3 = $factory->produceCar("Toyota", "Camry", "Silver");

echo "=== All Cars ===\n";
foreach ($factory->getAllCars() as $car) {
    echo $car->getDetails() . "\n";
}

echo "\n=== Total Cars Produced ===\n";
echo $factory->getTotalProducedCars() . "\n";

echo "\n=== Find Car by ID  ===\n";
$foundCar = $factory->findCarById(2);
if ($foundCar) {
    echo $foundCar->getDetails() . "\n";
} else {
    echo "Car not found\n";
}

echo "\n=== Find Cars by Brand  ===\n";
$toyotas = $factory->getCarsByBrand("Toyota");
foreach ($toyotas as $car) {
    echo $car->getDetails() . "\n";
}
