<?php


define('DB_HOST', 'localhost');
define('DB_USER', 'nshahrad');     // your scweb username
define('DB_PASSWORD', 'bpt3cbpt3c7hwg77hwg7');  // See blackboard for 20-char password
define('DB_NAME', 'nshahraddb');   // username followed by lowercase db

// Add your name below
define("CONFIG_ADMIN", "NAZANIN SHAHRAD");
define("CONFIG_ADMINEMAIL", "NS165@myscc.ca");
// ADD the location of your foroums below
define("CONFIG_URL", "http://nshahrad.scweb.ca/auction");
// ADD your blog name below
define("CONFIG_AUCTIONNAME", "Web Guys Online Auction");
// The currency used on the auction
define("CONFIG_CURRENCY", "$");


//Set timezone
date_default_timezone_set("America/Toronto");
// Log Location
define("LOG_LOCATION", "../Logs/add.log");
