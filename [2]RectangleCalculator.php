<?php

/*
Level 1: Absolute Basics (Classes, Objects, Properties,
Methods)
2. Rectangle Calculator
Properties: width, height
Methods: area(), perimeter()

 Goal: Encapsulation + simple logic inside class
*/

class RectangleCalculator
{
    private $width;
    private $height;

    // Constructor to initialize properties
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area()
    {
        return $this->width * $this->height;
    }

    public function perimeter()
    {
        return 2 * ($this->width + $this->height);
    }
}

$calc = new RectangleCalculator(4, 5);
echo "Area = " . $calc->area();
echo "Perimeter = " . $calc->perimeter();
