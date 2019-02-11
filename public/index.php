<?php
// global constant for website 

define('WEBROOT',dirname(__FILE__)); //web  path public folder
define('ROOT',dirname(WEBROOT));  //web  full path for folder project  
define('DS',DIRECTORY_SEPARATOR); // / or \
define('CORE',ROOT.DS.'core'); //web  path core folder
define('CONTROLLER',ROOT.DS.'controller'); //web  path controller folder
define('MODEL',ROOT.DS.'model'); //web  path model folder
define('VIEW',ROOT.DS.'view'); //web  path model folder
define('UPLOAD',ROOT.DS.'public'.DS.'upload'.DS); //web  path upoad folder

define('RACINE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));//web ur proj
define('CSS',RACINE_URL.DS.'public'.DS."css".DS);
define('JS',RACINE_URL.DS.'public'.DS."js".DS); //web  path upoad folder
define('IMG',RACINE_URL.DS.'public'.DS."image".DS); //web  path upoad folder
define('TEMP',RACINE_URL.DS.'public'.DS."template".DS); //web  path upoad folder
define('UPLOADIMG',RACINE_URL.DS.'public'.DS.'upload'.DS); //web  path upoad folder
//include import file 

require_once CORE.DS."Include.php";

//=================================================================================


session_start();

$a =new Dispatcher();



?>