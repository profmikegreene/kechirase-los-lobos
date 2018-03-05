<?php

// allow programmatic access to upgrade scripts
$path = '/var/www/html';
$fullpath = get_include_path() . PATH_SEPARATOR . $path;
ini_set('include_path', $fullpath);


// Grab the config-dist to clean up this file and only show the stuff we've changed
require_once($dirroot."/config-dist.php");

$kll_tsugi_port = getenv('TSUGI_PORT');
$wwwroot = "http://localhost:{$kll_tsugi_port}";

$kll_host = getenv('MYSQL_HOST');
$kll_db = getenv('MYSQL_DATABASE');
$CFG->pdo       = "mysql:host={$kll_host};dbname={$kll_db}";
$CFG->dbuser    = getenv('MYSQL_USER');
$CFG->dbpass    = getenv('MYSQL_PASSWORD');

$CFG->adminpw = false;

$CFG->install_folder = $CFG->dirroot.'/mod';


// Set to true to redirect to the upgrading.php script
// Also copy upgrading-dist.php to upgrading.php and add your message
$CFG->upgrading = false;

$CFG->google_client_id = getenv('GOOGLE_CLIENT_ID');
$CFG->google_client_secret = getenv('GOOGLE_CLIENT_SECRET');
$CFG->DEVELOPER = true;

$CFG->cookiesecret = 'jTuURh36Fr4sRPnUsHKP4G968H8r3xkzpMsk';
$CFG->cookiename = 'TSUGIAUTO';
$CFG->cookiepad = 'B77trww5PQ';

$CFG->maildomain = false;
$CFG->mailsecret = 'XaWPZvESnNV84FvHpqQ69yhHAkyrNEVjkcF7';
$CFG->maileol = "\n";


$CFG->sessionsalt = "fpmqZWBcp993Ca8RNWtVJfeM82Xf2fwK8uwD";

$CFG->timezone = 'America/New_York';
