<?php

/*
Level 1: Absolute Basics (Classes, Objects, Properties,
Methods)
3. Bank Account (Basic)
Properties: accountNumber, balance
Methods: deposit($amount), withdraw($amount)

 Add validation (no negative balance)

 Goal: State management inside object

*/

class BankAccount
{
    private $accountNumber;
    private $balance = 1000;

    public function __construct($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += (int)$amount;
            echo "Deposit Successful. New Balance: " . $this->balance . "\n";
        } else {
            echo "Invalid Amount\n";
        }
    }

    public function withdraw($amount)
    {
        if ($amount > 0) {
            if ($amount <= $this->balance) {
                $this->balance -= (int)$amount;
                echo "Withdraw Successful. New Balance: " . $this->balance . "\n";
            } else {
                echo "Insufficient Balance\n";
            }
        } else {
            echo "Invalid Amount\n";
        }
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getAccountNumber()
    {
        return $this->accountNumber;
    }
}

$Transaction = new BankAccount("1234567");
$Transaction->deposit(1000);
$Transaction->withdraw(100);

$Transaction22 = new BankAccount("123456789");
$Transaction22->deposit(500);
$Transaction22->withdraw(100);
