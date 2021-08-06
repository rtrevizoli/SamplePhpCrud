schtasks /create /tn "Cron" /tr "cd C:\xampp\htdocs\tray-homework-php-test\ && C:\xampp\php\php.exe .\mailSender\mail.php" /sc Daily /st 17:00
