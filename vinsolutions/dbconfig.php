<?php

    define('DBHOST', 'localhost');
    define('DBNAME', 'guns');
    define('DBUSER', 'grant');
    define('DBPASS', 'mypassword');
    
    $connection = "mysql:host=localhost;dbname=vehicles";
    $db = new PDO($connection, DBUSER, DBPASS);

?>