<?php
 /*

 10. Logger System
Interface: Logger
FileLogger
DatabaseLogger
EmailLogger

Goal: Real-world abstraction

Step-by-Step Implementation Plan 

✅ Step 1: Define Interface
Create a Logger interface
Add method: log(message)

✅ Step 2: Create Implementations

Create separate classes:

FileLogger
DatabaseLogger
EmailLogger

Each should:
Implement Logger
Handle logging in its own way

✅ Step 3: Create a Service That Uses Logger

Example:

AuthService
PaymentService
OrderService

👉 This class should:

Accept a Logger in constructor
Call logger when events happen

✅ Step 4: Inject Logger (VERY IMPORTANT)

Instead of creating logger inside class:

❌ Wrong:

new FileLogger inside AuthService

✅ Correct:

Pass Logger from outside (Dependency Injection)

✅ Step 5: Test Polymorphism

Try:

Pass FileLogger → logs to file
Pass EmailLogger → sends email

👉 No change in main logic

 */

interface Logger{
    public function log($message);
}

class FileLogger implements Logger{
    public function log($message){
        return "[File] Logs Written: " . $message . "\n";
    }
}

class DatabaseLogger implements Logger{
    public function log($message){
        return "[Database] Logs Saved: " . $message . "\n";
    }
}

class EmailLogger implements Logger{
    public function log($message){
        return "[Email] Logs Sent: " . $message . "\n";
    }
}

class LoggerService{
    private $loggerMethod;

    public function __construct(Logger $method){
        $this->loggerMethod = $method;
    }

    public function processLogger($message){
        $result = $this->loggerMethod->log($message);
        echo $result;
        return $result;
    }
}

echo "=== Logger System  ===\n\n";
$fileLogger = new FileLogger();
$databaseLogger = new DatabaseLogger();
$emailLogger = new EmailLogger();

echo "___ File Logger ___ \n";
$logger1 = new LoggerService($fileLogger);
$logger1->processLogger("User Logged in");

echo "___ Database Logger ___ \n";
$logger2 = new LoggerService($databaseLogger);
$logger2->processLogger("Payment Failed");

echo "___ Email Logger ___ \n";
$logger3 = new LoggerService($emailLogger);
$logger3->processLogger("Unauthorized User");