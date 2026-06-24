<?php

/*

8. Shape System
Base class: Shape
Child:
Circle
Rectangle
Each has area() method

Goal: Method overriding

*/

class Shape{
    public $shape;

    public function __construct($shape){
        $this->shape = $shape;
    }

    // Base method 
    public function area(){
        return 0;
    }

    // Method to display shape info
    public function displayArea(){
        echo "Area of {$this->shape} is: " . $this->area() . "\n";
    }
}

class Circle extends Shape{
    public $radius;

    public function __construct($shape, $radius){
        parent::__construct($shape);
        $this->radius = $radius;
    }

    // Override: π × r²
    public function area(){
        return 3.1416 * pow($this->radius, 2);  
    }
}

class Rectangle extends Shape{
    public $length;
    public $width;

    public function __construct($shape, $length, $width){
        parent::__construct($shape);
        $this->length = $length;
        $this->width = $width;
    }

    // Override: length × width
    public function area(){
        return $this->length * $this->width;
    }
}

class Triangle extends Shape{
    public $base;
    public $height;

    public function __construct($shape, $base, $height){
        parent::__construct($shape);
        $this->base = $base;
        $this->height = $height;
    }

    // Override: (base × height) / 2
    public function area(){
        return ($this->base * $this->height) / 2;
    }
}

// Test the shape system
$circle = new Circle("Circle", 5);
$circle->displayArea();

$rectangle = new Rectangle("Rectangle", 10, 20);
$rectangle->displayArea();

$triangle = new Triangle("Triangle", 20, 10);
$triangle->displayArea();

// We can also store and use the values
echo "\n--- Direct calculation ---\n";
$circleArea = $circle->area();
$rectArea = $rectangle->area();
echo "Circle area value: $circleArea\n";
echo "Rectangle area value: $rectArea\n";
echo "Total: " . ($circleArea + $rectArea) . "\n";