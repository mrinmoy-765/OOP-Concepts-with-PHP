<?php
/*
_______________________________________________________________________________________________________________
An abstract class is a class that contains at least one abstract method.
An abstract method is a method that is declared, 
but not implemented in the abstract class. The implementation must be done in the child class(es).

The purpose of an abstract class is to enforce all derived classes (child classes) 
to implement the abstract method(s) declared in the parent class.

PHP - Interfaces vs. Abstract Classes
Interface are similar to abstract classes. The difference between interfaces and abstract classes are:

1.Interfaces cannot have properties, while abstract classes can
2.All interface methods must be public, while abstract methods can be public or protected
3.All methods in an interface are abstract, so they cannot be implemented in code and 
the abstract keyword is not necessary
4.Classes can implement an interface while inheriting from another class at the same time
5.Interfaces make it easy to use a variety of different classes in the same way. 
When one or more classes use the same interface, it is referred to as "polymorphism". 

________________________________________________________________________________________________________________
Level 5: Abstract Classes & Design Thinking
11. Online Store Discount System

Abstract class: Discount

Method: calculate($price)

Children:

PercentageDiscount
FixedDiscount

Goal: Partial implementation + forcing structure
*/

abstract class Discount{
    protected $discount;
    //non-abstruct method
    public function __construct($discount){
        $this->discount = $discount;
    }
    //Abstract method with an argument
    abstract public function calculate($price);
}


class PercentageDiscount extends Discount{
    public function calculate($price){
        $discountAmount = $price * ($this->discount / 100);
        return $price - $discountAmount;
    }
}

class FixedDiscount extends Discount {
    public function calculate($price) {
        return max(0, $price - $this->discount);
    }
}

//creating object of child class
$PD = new PercentageDiscount(30);
echo $PD->calculate(2000);

echo "\n";

$FD = new FixedDiscount(50);
echo $FD->calculate(7000);