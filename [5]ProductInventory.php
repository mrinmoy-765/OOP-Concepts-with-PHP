<?php

/*

Level 2: Constructors, Encapsulation, Getters/Setters
5. Product Inventory
Properties: name, price, quantity
Methods:
updateStock($qty)
getTotalValue()

Goal: Business logic inside class

*/

class Inventory {
    private $name;
    private $price;
    private $quantity;

    function __construct($name, $price, $quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName(){
        echo "Product Name : $this->name\n"; 
    }

    public function updateStock($qty){
        $this->quantity =$qty;
    }

    public function getTotalValue(){
       echo "Total Price : ". $this->price * $this->quantity;
       echo "\n";
    }
}

$product = new Inventory("Soap", 25,1);
echo $product->getName();
$product->updateStock(7);
$product->getTotalValue();

$product2 = new Inventory("Face wash", 250,1);
echo $product2->getName();
$product2->updateStock(5);
$product2->getTotalValue();
