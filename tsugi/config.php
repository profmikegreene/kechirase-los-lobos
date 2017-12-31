<?php

// Configuration file - copy from config-dist.php to config.php
// and then edit.  Since config.php has passwords and other secrets
// never check config.php into a source repository

// If we just are using Tsugi but not part of another site
$apphome = false;
$kll_tsugi_port = getenv('TSUGI_PORT');
$wwwroot = "http://localhost:{$$kll_tsugi_port}";
// $wwwroot = 'http://localhost:8888/tsugi';
// $wwwroot = "https://fb610139.ngrok.io/tsugi";

// If we embed Tsugi in a web site it has a parent folder.
// $apphome = "http://localhost/tsugi-org";
// $apphome = "http://localhost:8888/tsugi-org";
// $apphome = "https://www.tsugi.org";
// $wwwroot = $apphome . '/tsugi';
// Make sure to check for all the "Embedded Tsugi" configuration options below

$dirroot = realpath(dirname(__FILE__));

$loader = require_once($dirroot."/vendor/autoload.php");

// We store the configuration in a global object
// Additional documentation on these fields is
// available in that class or in the PHPDoc for that class
unset($CFG);
global $CFG;
$CFG = new \Tsugi\Config\ConfigInfo($dirroot, $wwwroot);
unset($wwwroot);
unset($dirroot);
$CFG->loader = $loader;
if ( $apphome ) $CFG->apphome = $apphome; // Leave unset if not embedded
unset($apphome);

// Database connection information to configure the PDO connection
// You need to point this at a database with am account and password
// that can create tables.   To make the initial tables go into Admin
// to run the upgrade.php script which auto-creates the tables.
$kll_host = getenv('MYSQL_HOST');
$kll_db = getenv('MYSQL_DATBASE');
$CFG->pdo       = "mysql:host={$kll_host};dbname={$kll_db}";
// $CFG->pdo       = 'mysql:host=127.0.0.1;port=8889;dbname=tsugi'; // MAMP
$CFG->dbuser    = getenv('MYSQL_USER');
$CFG->dbpass    = getenv('MYSQL_PASSWORD');

// You can use the CDN copy of the static content - it is the
// default unless you override it.
// $CFG->staticroot = 'https://www.dr-chuck.net/tsugi-static';

// If you check out a copy of the static content locally and do not
// want to use the CDN copy (perhaps you are on a plane or are otherwise
// not connected) use this configuration option instead of the above:
// $CFG->staticroot = 'http://localhost/tsugi-static';  // For normal
// $CFG->staticroot = 'http://localhost:8888/tsugi-static';   // For MAMP

// The dbprefix allows you to give all the tables a prefix
// in case your hosting only gives you one database.  This
// can be short like "t_" and can even be an empty string if you
// can make a separate database for each instance of TSUGI.
// This allows you to host multiple instances of TSUGI in a
// single database if your hosting choices are limited.
$CFG->dbprefix  = 'tsugi';

// This is the PW that you need to access the Administration
// features of this application. Protect it like the database
// password in this file.
$CFG->adminpw = '4fRe83#dkm@';
// $CFG->adminpw = false;

// If we are running Embedded Tsugi we need to set the
// "course title" for the course that represents
// the "local" students that log in through Google.
// $CFG->context_title = "Web Applications for Everybody";

// If we are going to use the lessons tool and/or badges, we need to
// create and point to a lessons.json file
// $CFG->lessons = $CFG->dirroot.'/../lessons.json';

// This allows you to include various tool folders.  These are scanned
// for register.php, database.php and index.php files to do automatic
// table creation as well as making lists of tools in various UI places
// such as ContentItem or LTI 2.0

// For nomal tsugi, by default we use the built-in admin tools, and
// install new tools (see /admin/install/) into mod.
$CFG->tool_folders = array("admin", "mod");
$CFG->install_folder = $CFG->dirroot.'/mod';

// For Embedded Tsugi, you probably want to ignore the mod folder
// in /tsugi and instead install new tools into "mod" in the parent folder
if ( isset($CFG->apphome) ) {
    $CFG->tool_folders = array("admin", "../tools", "../mod");
    $CFG->install_folder = $CFG->dirroot.'/../mod';
}

// You can also include tool/module folders that are outside of this folder
// using the following pattern:
// $CFG->tool_folders = array("admin", "mod",
//      "../tsugi-php-standalone", "../tsugi-php-module",
//      "../tsugi-php-samples", "../tsugi-php-exercises");

// Set to true to redirect to the upgrading.php script
// Also copy upgrading-dist.php to upgrading.php and add your message
$CFG->upgrading = false;

// This is how the system will refer to itself.
$CFG->servicename = 'TSUGI';
$CFG->servicedesc = false;

// Information on the owner of this system and whether we
// allow folks to request keys for the service
$CFG->ownername = false;  // 'Charles Severance'
$CFG->owneremail = false; // 'csev@example.com'
$CFG->providekeys = false;  // true

// Go to https://console.developers.google.com/apis/credentials
// create a new OAuth 2.0 credential for a web application,
// get the key and secret, and put them here:
$CFG->google_client_id = '96041-nljpjj8jlv4.apps.googleusercontent.com';
$CFG->google_client_secret = '6Q7w_x4ESrl29a';

// Whether or not to unify accounts between global site-wide login
// and LTI launches
$CFG->unify = true;

// Whether to record launches as activities - make sure tables exist
$CFG->launchactivity = false;

// Controlling the event FIFO
// If eventcheck is false, no events will be logged and no cleanup will be done.
$CFG->eventcheck = 1000;       // How many launches between FIFO truncation (probabilistic)
$CFG->eventtime = 7*24*60*60;  // Length in seconds of the FIFO

// Set eventpushtime to zero to suppress auto-push from the FIFO
$CFG->eventpushtime = 2;      // Maximum number of seconds to push during heartbeat
$CFG->eventpushcount = 50;    // Maximum number of events to push during heartbeat

// Go to https://console.developers.google.com/apis/credentials
// Create and configure an API key and enter it here
$CFG->google_map_api_key = false; // 'Ve8eH490843cIA9IGl8';

// Badge generation settings - once you set these values to something
// other than false and start issuing badges - don't change these or
// existing badge images that have been downloaded from the system
// will be invalidated.
$CFG->badge_encrypt_password = false; // "somethinglongwithhex387438758974987";
$CFG->badge_assert_salt = false; // "mediumlengthhexstring";

// This folder contains the badge images - This example
// is for Embedded Tsugi and the badge images are in the
// parent folder.
// $CFG->badge_path = $CFG->dirroot . '/../badges';

// From LTI 2.0 spec: A globally unique identifier for the service provider.
// As a best practice, this value should match an Internet domain name
// assigned by ICANN, but any globally unique identifier is acceptable.
$CFG->product_instance_guid = parse_url($CFG->wwwroot)['host'];
// $CFG->product_instance_guid = 'lti2.example.com';

// From the CASA spec: originator_id a UUID picked by a publisher
// and used for all apps it publishes
$CFG->casa_originator_id = md5($CFG->product_instance_guid);

// When this is true it enables a Developer test harness that can launch
// tools using LTI.  It allows quick testing without setting up an LMS
// course, etc.
$CFG->DEVELOPER = true;

// These values configure the cookie used to record the overall
// login in a long-lived encrypted cookie.   Look at the library
// code createSecureCookie() for more detail on how these operate.
$CFG->cookiesecret = 'warning:please-change-cookie-secret-s83F4V49';
$CFG->cookiename = 'TSUGIAUTO';
$CFG->cookiepad = '390b246ea9';

// Where the bulk mail comes from - should be a real address with a wildcard box you check
$CFG->maildomain = false; // 'mail.example.com';
$CFG->mailsecret = 'warning:please-change-mailsecret-cJ4f52';
$CFG->maileol = "\n";  // Depends on your mailer - may need to be \r\n

// Set the nonce clearing factor and expiry time
$CFG->noncecheck = 100;
$CFG->noncetime = 1800;

// This is used to make sure that our constructed session ids
// based on resource_link_id, oauth_consumer_key, etc are not
// predictable or guessable.   Just make this a long random string.
// See LTIX::getCompositeKey() for detail on how this operates.
$CFG->sessionsalt = "warning:please-change-sessionsalt-3dFc5GH";

// Timezone
$CFG->timezone = 'America/New_York'; // Nice for due dates

// Universal Analytics
$CFG->universal_analytics = false; // "UA-57880800-1";

// Effectively an "airplane mode" for the appliction.
// Setting this to true makes it so that when you are completely
// disconnected, various tools will not access network resources
// like Google's map library and hang.  Also the Google login will
// be faked.  Don't run this in production.

$CFG->OFFLINE = false;

// IMS says that resource_link_id, lti_message_type, and lti_version are required fields,
// and IMS certification fails if we allow a valid launch when either
// of these are not sent (even though in many instances, an application
// can happily do what it needs to do without them).
// Set these to true to make launches fail when either/both are not sent.
$CFG->require_conformance_parameters = true;

// Since IMS certification is capricious at times and has bugs or bad assumptions,
// set this when running certification
$CFG->certification = false;

// A consumer may pass both the LTI 1 lis_outcome_service_url
// and the LTI 2 custom_result_url; in this case we have to decide which
// to use for the gradeSend service.  The LTI 1 method is more established...
$CFG->prefer_lti1_for_grade_send = true;

// In order to run git from the a PHP script, we may need a setuid version
// of git - example commands if you are not root:
//
//    cd /home/csev
//    cp /usr/bin/git .
//    chmod a+s git
//
// If you are root, your web area and git must belong to the user that owns
// the web process.  You can check this using:
//
// apache2ctl -S
//  ..
//  User: name="www-data" id=33
//  Group: name="www-data" id=33
//
// cd /var/www/html
// chown -R 33:33 site-folder
// chown 33:33 /home/csev/git
//
// This of course is something to consider carefully.
// $CFG->git_command = '/home/csev/git';

// Should we record launch activity - multi-bucket lossy historgram
$CFG->launchactivity = true;

// how many launches between event cleanups (probabilistic)
$CFG->eventcheck = 200;        // Set to false to suspend event recording
$CFG->eventtime = 7*24*60*60;  // Length in seconds of the event buffer

// Maximum events to push in a batch
$CFG->eventpushcount = 50;     // Set to zero to suspend event push
$CFG->eventpushtime = 2;       // Maximum length in seconds to push events

// The vendor include and root - generally leave these alone
// unless you have a very custom checkout
$CFG->vendorroot = $CFG->wwwroot."/vendor/tsugi/lib/util";
$CFG->vendorinclude = $CFG->dirroot."/vendor/tsugi/lib/include";
$CFG->vendorstatic = $CFG->wwwroot."/vendor/tsugi/lib/static";

// Leave these here
require_once $CFG->vendorinclude."/setup.php";
require_once $CFG->vendorinclude."/lms_lib.php";
// No trailing tag to avoid inadvertent white space
