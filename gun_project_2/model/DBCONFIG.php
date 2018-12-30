<?php

    define('DBHOST', 'localhost');
    define('DBNAME', 'guns');
    define('DBUSER', 'grant');
    define('DBPASS', 'mypassword');
    
    $connection = "mysql:host=localhost;dbname=guns";
    $db = new PDO($connection, DBUSER, DBPASS);
?>