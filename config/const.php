<?php
// REGEX
define('REGEX_CATEGORY', '^[A-Za-zéèëêçà\d]{2,25}(-| )?([A-Za-zéèçà\d]{2,25})?$');


// BDD
$serverName = "localhost"; // localhost
$dbname = "rent_my_ride"; // rent_my_ride
$dsn = "mysql:host=$serverName;dbname=$dbname";
$username = "Arnaud_M_rent_my_ride"; // Arnaud_M_rent_my_ride
$password = "F#N7Lc&5dd53yXsz"; // F#N7Lc&5dd53yXsz

define('DSN', $dsn);
define('USER', $username);
define('PASSWORD', $password);