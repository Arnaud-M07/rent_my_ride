<?php
// REGEX
define('REGEX_CATEGORY', '^[A-Za-zéèëêçàï\d\s]{1,25}(-|\s)?[A-Za-zéèçàï\d\s]{1,25}$');
define('REGEX_REGISTRATION','^[A-Z]{2}[-][0-9]{3}[-][A-Z]{2}$');
define('REGEX_MILEAGE', '^[0-9]{0,6}$');
define('ARRAY_TYPES', ['image/jpeg', 'image/png']);
define('UPLOAD_MAX_SIZE', 2*1024*1024);


// BDD
$serverName = "localhost"; // localhost
$dbname = "rent_my_ride"; // rent_my_ride
$dsn = "mysql:host=$serverName;dbname=$dbname";
$username = "Arnaud_M_rent_my_ride"; // Arnaud_M_rent_my_ride
$password = "F#N7Lc&5dd53yXsz"; // F#N7Lc&5dd53yXsz

define('DSN', $dsn);
define('USER', $username);
define('PASSWORD', $password);