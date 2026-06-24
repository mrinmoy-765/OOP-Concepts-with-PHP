<?php

/*

Level 4: Polymorphism & Interfaces

An Interface lets you define which public methods a class MUST implement, 
without defining how they should be implemented.

9. Payment System

Classes:
CreditCard
PayPal
Cash

Goal: Same method, different behavior

*/

//Define Interface
interface PaymentMethod{
    public function pay($amount);
    public function refund($amount);
}

//Implement Interface 
class CreditCard implements PaymentMethod{
    private $cardNumber;
    private $balance;

    public function __construct($cardNumber, $balance){
        $this->cardNumber = $cardNumber;
        $this->balance = $balance;
    }

    public function pay($amount){
        if($amount <= 0){
            return ["status" => false, "message" => "Invalid amount"];
        }
        if($amount > $this->balance){
            return ["status" => false, "message" => "Insufficient balance"];
        }
        $this->balance -= $amount;
        return [
            "status" => true, 
            "method" => "CreditCard",
            "amount" => $amount,
            "remaining_balance" => $this->balance,
            "transaction_id" => uniqid("CC_")
        ];
    }

    public function refund($amount){
        $this->balance += $amount;
        return ["status" => true, "message" => "Refunded: $$amount"];
    }
}

class PayPal implements PaymentMethod{
    private $email;
    private $balance;

    public function __construct($email, $balance){
        $this->email = $email;
        $this->balance = $balance;
    }

    public function pay($amount){
        if($amount <= 0){
            return ["status" => false, "message" => "Invalid amount"];
        }
        if($amount > $this->balance){
            return ["status" => false, "message" => "Insufficient funds"];
        }
        $this->balance -= $amount;
        return [
            "status" => true,
            "method" => "PayPal",
            "amount" => $amount,
            "email" => $this->email,
            "transaction_id" => uniqid("PP_")
        ];
    }

    public function refund($amount){
        $this->balance += $amount;
        return ["status" => true, "message" => "Refunded: $$amount"];
    }
}

class Cash implements PaymentMethod{
    private $cashAvailable;

    public function __construct($cashAvailable){
        $this->cashAvailable = $cashAvailable;
    }

    public function pay($amount){
        if($amount <= 0){
            return ["status" => false, "message" => "Invalid amount"];
        }
        if($amount > $this->cashAvailable){
            return ["status" => false, "message" => "Not enough cash"];
        }
        $this->cashAvailable -= $amount;
        return [
            "status" => true,
            "method" => "Cash",
            "amount" => $amount,
            "transaction_id" => uniqid("CASH_")
        ];
    }

    public function refund($amount){
        $this->cashAvailable += $amount;
        return ["status" => true, "message" => "Cash refunded"];
    }
}

// PaymentProcessor demonstrates true polymorphism
class PaymentProcessor{
    private $paymentMethod;

    /*  
    
       This means:
       “I don’t care which payment method you give me…
       as long as it follows the PaymentMethod interface.” 

       It only knows:
    ✅ “Something that can pay() and refund()”
    */
    public function __construct(PaymentMethod $method){
        $this->paymentMethod = $method;
    }

    /*
        What is $this->paymentMethod?
        new CreditCard(...)
        new PayPal(...)
        new Cash(...)
    */
    public function processPayment($amount){
        $result = $this->paymentMethod->pay($amount);
        
        if($result["status"]){
            echo "✓ Payment successful!\n";
            echo "  Method: {$result['method']}\n";
            echo "  Amount: \${$result['amount']}\n";
            echo "  Transaction ID: {$result['transaction_id']}\n";
        } else {
            echo "✗ Payment failed: {$result['message']}\n";
        }
        
        return $result;
    }
}
// Demonstrate polymorphism with PaymentProcessor
echo "=== Payment System Demo ===\n\n";

// Create different payment methods
$creditCard = new CreditCard("1234-5678-9012-3456", 5000);
$paypal = new PayPal("user@paypal.com", 2000);
$cash = new Cash(1000);

// Process payments using same processor (polymorphism!)
echo "--- Transaction 1: Credit Card ---\n";
$processor1 = new PaymentProcessor($creditCard);
$processor1->processPayment(1000);

echo "\n--- Transaction 2: PayPal ---\n";
$processor2 = new PaymentProcessor($paypal);
$processor2->processPayment(500);

echo "\n--- Transaction 3: Cash ---\n";
$processor3 = new PaymentProcessor($cash);
$processor3->processPayment(300);

echo "\n--- Transaction 4: Invalid Payment ---\n";
$processor4 = new PaymentProcessor($paypal);
$processor4->processPayment(5000);  // More than balance