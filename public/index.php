<?php
// global constant for website 

define('WEBROOT',dirname(__FILE__)); //web  path public folder
define('ROOT',dirname(WEBROOT));  //web  full path for folder project  
define('DS',DIRECTORY_SEPARATOR); // / or \
define('CORE',ROOT.DS.'core'); //web  path core folder
define('CONTROLLER',ROOT.DS.'controller'); //web  path controller folder
define('MODEL',ROOT.DS.'model'); //web  path model folder
define('VIEW',ROOT.DS.'view'); //web  path model folder
define('UPLOAD',ROOT.DS.'upload'); //web  path upoad folder
define('RACINE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));//web ur proj

//include import file 

require_once CORE.DS."Include.php";

//=================================================================================


echo "welcom eman";

$a =new Dispatcher();



?>