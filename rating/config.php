<?php
/**
 * rating - Rating: an example LTI tool provider
 *
 * @author  Stephen P Vickers <svickers@imsglobal.org>
 * @copyright  IMS Global Learning Consortium Inc
 * @date  2016
 * @version 2.0.0
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3.0
 */

/*
 * This page contains the configuration settings for the application.
 */


###
###  Application settings
###
  define('APP_NAME', 'Rating');
  define('SESSION_NAME', 'php-rating');
  define('VERSION', '3.0.00');

###
###  Database connection settings
###
  $db = getenv('MYSQL_DATABASE');
  $host = getenv('MYSQL_HOST');
  define('DB_NAME', "mysql:dbname={$db};host={$host}");
  define('DB_USERNAME', getenv('MYSQL_USER'));
  define('DB_PASSWORD', getenv('MYSQL_PASSWORD'));
  define('DB_TABLENAME_PREFIX', 'rating');

?>
