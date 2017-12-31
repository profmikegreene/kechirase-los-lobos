<?php
error_reporting(0);
ini_set('display_errors', true);

###
###  Database connection settings
###
define('DB_NAME', 'mysql:dbname={getenv('MYSQL_DATABASE')};host={getenv('MYSQL_HOST')}');  // e.g. 'mysql:dbname=MyDb;host=localhost' or 'sqlite:php-rating.sqlitedb'
define('DB_USERNAME', getenv('MYSQL_USER'));
define('DB_PASSWORD', getenv('MYSQL_PASSWORD'));
define('DB_TABLENAME_PREFIX', '');

try {
    $db = new PDO(DB_NAME, DB_USERNAME, DB_PASSWORD);
    echo 'connected';
  } catch(PDOException $e) {
    $db = FALSE;
    echo $e;
    $_SESSION['error_message'] = "Database error {$e->getCode()}: {$e->getMessage()}";
    //echo $_SESSION['error_message'];
  }



?>