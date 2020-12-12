<?php

if(!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }

defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'.DS.'xampp'.DS.'htdocs'.DS.'statusweb2');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

require_once LIB_PATH.DS.'configuration.php';
require_once LIB_PATH.DS.'session.php';
require_once LIB_PATH.DS.'functions.php';
require_once LIB_PATH.DS.'database.php';
require_once LIB_PATH.DS.'databaseobject.php';

require_once LIB_PATH.DS.'user.php';
require_once LIB_PATH.DS.'post.php';
require_once LIB_PATH.DS.'comment.php';


?>
