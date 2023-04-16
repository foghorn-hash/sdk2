<?php 

require('es/config.inc.php');
require_once 'Zend/Loader.php';
require_once 'Zend/Config.php';
$config = new Zend_Config($configArray);
$url_prefix = $config->wwwprefix;
$sef_suffix = $config->sefsuffix;	

define($config->security->secretkey, null);

if (!isset($my)) {$my=0;}

function redirect ($redirecturl) {

global $url_prefix;

header ("Location: ".$url_prefix.$redirecturl."");

}

require_once 'Zend/Db.php';

$params = array ('host'     => $config->database->dbhost,
                 'username' => $config->database->dbuser,
                 'password' => $config->database->dbpasswd,
                 'dbname'   => $config->database->database);

$db = Zend_Db::factory($config->database->type, $params); 

require_once 'Zend/Config/Ini.php';
$ini = new Zend_Config_Ini($config->security->inipath.'www.ini', $config->security->inistatus);
require_once 'Zend/Session.php';
Zend_Session::setOptions($ini->toArray());
require_once 'Zend/Session/Namespace.php';

if ( ! Zend_Session::sessionExists() ) {
Zend_Session::start(); 
Zend_Session::regenerateId(); 
}

$idName = new Zend_Session_Namespace('id');
$idName->hash = $config->security->id;
$idName->lock();
$idSID = new Zend_Session_Namespace('sid');
$idSID->hash = Zend_Session::getId(); 
$idSID->lock();

/**
* Session checks!
*/ 
if ($idSID->hash != Zend_Session::getId() || $idName->hash != $config->security->id) 
{ 
Zend_Session::destroy(); 
Zend_Session::expireSessionCookie();
ob_clean();
exit();
}
 
if (!isset($_SESSION['lang']['value'])) {
$_SESSION['lang']['value'] = $config->defaultlang;}

if (!isset($_GET['lang'])) {$_GET['lang']
= $_SESSION['lang']['value'];}
 
$seslang = new Zend_Session_Namespace('lang');
$seslang->value = $_GET['lang'];

if (!isset($_SESSION['lay']['value'])) {
$_SESSION['lay']['value'] = $config->defaulttemplate;}

if (!isset($_GET['template'])) {$_GET['template']
= $_SESSION['lay']['value'];}
 
$seslay = new Zend_Session_Namespace('lay');
$seslay->value = $_GET['template'];

require_once("Zend/Translate.php");


if (file_exists($config->apppath.'www/languages/'.$seslang->value.'.php')) 
{ include ($config->apppath.'www/languages/'.$seslang->value.'.php'); }
else { $_GET['lang'] = $config->defaultlang;
include ($config->apppath.'www/languages/'.$config->defaultlang.'.php'); }

foreach ($lang as &$value) {
    $value = utf8_encode($value);
}

$result = $db->fetchRow(
    "SELECT * FROM ".$config->database->dbprefix."_lang WHERE 
	lang_file = :id",
    array('id' => $seslang->value)
);
$ln = $result['lang_short']; 
$translate = new Zend_Translate('array', $lang, $ln);


require_once 'Zend/Controller/Front.php';

require_once 'Zend/Controller/Router/Rewrite.php';

require_once 'Zend/Controller/Router/Route/Regex.php';

$router     = new Zend_Controller_Router_Rewrite();
$controller = Zend_Controller_Front::getInstance();
$controller->setControllerDirectory($config->apppath.'www/application/controllers')
           ->setRouter($router);
	   
$route = new Zend_Controller_Router_Route_Regex(
    '(\d+)-(\d+)-(.+)'
	.str_replace('/','',$sef_suffix),
    array(
        'controller' => 'index',
        'action'     => 'index'
    ),
    array(
        1 => 'id',
		2 => 'subpage',
        3 => 'description'
    ),
    '%d-%d-%s'.$sef_suffix
);
$router->addRoute('index', $route);

$route = new Zend_Controller_Router_Route_Regex(
    '(\d+)-(\d+)-(\d+)'
	.str_replace('/','',$sef_suffix),
    array(
        'controller' => 'viewarticle',
        'action'     => 'index'
    ),
    array(
        1 => 'id',
		2 => 'subpage',
		3 => 'articleof'
    ),
    '%d-%d-%d'.$sef_suffix
);

$router->addRoute('viewarticle', $route);

$route = new Zend_Controller_Router_Route_Regex(
    'profile/index/~(.+)',
    array(
        'controller' => 'profile',
        'action'     => 'index'
    ),
    array(
        1 => 'username'
    ),
    'profile/index/~%s'
);

$router->addRoute('profile', $route);
		   
$response   = $controller->dispatch();


?>