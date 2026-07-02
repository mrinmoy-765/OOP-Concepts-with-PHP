<?php

/*
12. Notification System

Abstract:
Notification

Child:
EmailNotification
SMSNotification

Add method: send($message)
*/



// 1. Abstract Class (Blueprint)
abstract class Notification {
    abstract public function send($message);
}

// 2. Concrete Implementations

class EmailNotification extends Notification {
    public function send($message) {
        return "Email sent: " . $message;
    }
}

class SMSNotification extends Notification {
    public function send($message) {
        return "SMS sent: " . $message;
    }
}

// Bonus Implementations

class PushNotification extends Notification {
    public function send($message) {
        return "Push notification sent: " . $message;
    }
}

class SlackNotification extends Notification {
    public function send($message) {
        return "Slack message sent: " . $message;
    }
}


// 3. Service Class (THIS IS THE MOST IMPORTANT PART)

class NotificationService {
    private $notification;

    // Dependency Injection
    public function __construct(Notification $notification) {
        $this->notification = $notification;
    }

    public function notify($message) {
        $result = $this->notification->send($message);
        echo $result . "\n";
    }
}


// 4. Using the System (Polymorphism in Action)

echo "=== Notification System Demo ===\n\n";

// Email
$emailService = new NotificationService(new EmailNotification());
$emailService->notify("Order placed successfully");

// SMS
$smsService = new NotificationService(new SMSNotification());
$smsService->notify("Your OTP is 123456");

// Push
$pushService = new NotificationService(new PushNotification());
$pushService->notify("You have a new follower");

// Slack
$slackService = new NotificationService(new SlackNotification());
$slackService->notify("Server is down!");

?>