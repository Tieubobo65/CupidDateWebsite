<?php
    //Database params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'oot');
    define('DB_PASS', '');
    define('DB_NAME', 'cupiddate_db');

    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));

    //URLROOT (Dynamic links)
    define('URLROOT', 'http://localhost:8080/CupidDate');

    //Sitename
    define('SITENAME', 'Cupid Date');

    //country setup
    $autoload['packages'] = array();

    $autoload['libraries'] = array('session', 'database');

    $autoload['helper'] = array('url', 'file');

?>
