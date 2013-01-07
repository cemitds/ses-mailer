Simple send mail function to use with Amazon SES

example usage:
```php
require 'ses-mailer.php';
$body = "Hello,<br/>";
$body .= "This is my message to you.";
sendMail("postino@cemitds.it", array("address-1@example.com", "address-2@example.it"), "Message Subject", $emailBody);
```
   