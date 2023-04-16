<?php 

/**
 * Teknologiaplaneetta - Enterprise Solution
 *
 * LICENSE: Open Source (GNU GPL)
 *
 * @copyright  2006-2008 Teknologiaplaneetta
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL
 * @version    $Id$ 0.1.5
 * @link       http://www.teknologiaplaneetta.com/
 */ 

require('config.inc.php');
require_once 'Zend/Loader.php';
require_once 'Zend/Registry.php';
require_once 'Zend/Config.php';
$config = new Zend_Config($configArray);
$url_prefix = $config->urlprefix;

define($config->security->secretkey, null);

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
$ini = new Zend_Config_Ini($config->security->inipath.'es.ini', $config->security->inistatus);
require_once 'Zend/Session.php';
Zend_Session::setOptions($ini->toArray());
require_once 'Zend/Session/Namespace.php';

if ( ! Zend_Session::sessionExists() ) {
Zend_Session::start(); 
Zend_Session::regenerateId(); 
}

$sid =  Zend_Session::getId();
define($sid, null);
$idName = new Zend_Session_Namespace('id');
$idName->hash = $config->security->id;
$idName->lock();
$idSID = new Zend_Session_Namespace('sid');
$idSID->hash = $sid; 
$idSID->lock();
/**
* Session checks!
*/ 
if ($idSID->hash != $sid || $idName->hash != $config->security->id) 
{ 
Zend_Session::destroy(); 
Zend_Session::expireSessionCookie();
ob_clean();
exit();
}

if (!isset($_SESSION['layout']['value'])) {
$_SESSION['layout']['value'] = $config->defaultlayout;} 
 
if (!isset($_SESSION['lang']['value'])) {
$_SESSION['lang']['value'] = $config->defaultlang;}

if (!isset($_GET['layout'])) {$_GET['layout']
 = $_SESSION['layout']['value'];} 
if (!isset($_GET['lang'])) {$_GET['lang']
= $_SESSION['lang']['value'];}
 
$seslang = new Zend_Session_Namespace('lang');
$seslang->value = $_GET['lang'];
$seslay = new Zend_Session_Namespace('layout');
$seslay->value = $_GET['layout'];

if (isset($_SESSION['user']['hash']) && $_SESSION['id']['hash'] == $config->security->id ) { 

if (!isset($_SESSION['user']['hash'])) 
{ 
Zend_Session::destroy();
Zend_Session::expireSessionCookie();
ob_clean();
exit();
}

$idUser = new Zend_Session_Namespace('user'); 
$idUser->hash = $_SESSION['user']['hash'];
$idUser->lock();
$idUser->setExpirationSeconds($config->security->sessiontime);

	function include_index () {
	
	global $config, $seslay;
	
	if (file_exists($config->apppath.'templates/'.$seslay->value
.'/logged.php')) 
{ include ($config->apppath.'templates/'.$seslay->value
.'/logged.php'); }
else { $seslay->value = $config->defaultlayout;
include ($config->apppath.'templates/'.$config->defaultlayout
.'/logged.php'); }
	
	}

$username = $_SESSION['user']['hash'];

$result = $db->fetchRow(
    "SELECT firstname, lastname, user_id, username, userlevel 
	FROM ".$config->database->dbprefix."_users 
	WHERE username = :username",
    array('username' => $username)
);

$user = $result['firstname']." "
.$result['lastname'];
$my = $result['user_id'];
$un = $result['username'];

$result = $db->fetchRow(
    "SELECT role FROM ".$config->database->dbprefix."_acl WHERE 
	acl_id = :id",
    array('id' => $result['userlevel'])
);

$role = $result['role']; 

require_once 'Zend/Acl.php';
$acl = new Zend_Acl();
require_once 'Zend/Acl/Role.php';

  $sql = $db->quoteInto(
    "SELECT * FROM ".$config->database->dbprefix."_acl 
	WHERE acl_id > ? ORDER BY order_id DESC",
    0
);

$result = $db->query($sql);
$rows = $result->fetchAll();

 foreach ($rows as $field_index => $field_name)
   {
   if ($field_name['inherit'] != "none") {
    $acl->addRole(new Zend_Acl_Role($field_name['role']), 
	$field_name['inherit']); 
    } else {
    $acl->addRole(new Zend_Acl_Role($field_name['role']));
    }

   } 
   
   $acl->allow('Administrator');
   $acl->allow('Staff 1');
   $acl->allow('Staff 2');
   
$access = $acl->isAllowed($role, null, 'view') ?
     "allowed" : "denied";
	 
if ($access == "allowed") { 

require_once 'Zend/Controller/Front.php';

require_once 'Zend/Controller/Router/Rewrite.php';

require_once 'Zend/Controller/Router/Route/Regex.php';

$router     = new Zend_Controller_Router_Rewrite();
$controller = Zend_Controller_Front::getInstance();
$controller->setControllerDirectory($config->apppath.'application/controllers')
           ->setRouter($router);
		   
$router = $controller->getRouter(); // returns a rewrite router by default	
	   
$route = new Zend_Controller_Router_Route(
    'editors/ImageEditor/index.php',
    array(
        'controller' => 'index',
        'action'     => 'imageEditor'
    )
);
$router->addRoute('imageEditor', $route);

$route = new Zend_Controller_Router_Route(
    'editors/ImageEditor/getImage.php',
    array(
        'controller' => 'index',
        'action'     => 'getImage'
    )
);
$router->addRoute('getImage', $route);

$route = new Zend_Controller_Router_Route(
    'editors/ImageEditor/processImage.php',
    array(
        'controller' => 'index',
        'action'     => 'processImage'
    )
);
$router->addRoute('processImage', $route);

$route = new Zend_Controller_Router_Route(
    'editors/fckeditor/editor/filemanager/browser/default/connectors/php/connector.php',
    array(
        'controller' => 'cms',
        'action'     => 'connector'
    )
);
$router->addRoute('connector', $route);

$route = new Zend_Controller_Router_Route(
    'editors/fckeditor/editor/filemanager/upload/php/upload.php',
    array(
        'controller' => 'cms',
        'action'     => 'upload'
    )
);
$router->addRoute('upload', $route);
		   
$response   = $controller->dispatch();

} else {
Zend_Session::destroy();
Zend_Session::expireSessionCookie();
ob_clean();
redirect ("index.php"); 
exit();
}

} else {

require_once("Zend/Translate.php");


if (file_exists($config->apppath.'languages/'.$seslang->value.'.php')) 
{ include ($config->apppath.'languages/'.$seslang->value.'.php'); }
else { $_GET['lang'] = $config->defaultlang;
include ($config->apppath.'languages/'.$config->defaultlang.'.php'); }

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

$_SESSION['lang']['short'] = $ln;

if (isset($_POST['Login!']) && $_POST['username'] != "" && $_POST['password'] != "") { 

require_once 'Zend/Auth/Adapter/DbTable.php';
	
$authAdapter = new Zend_Auth_Adapter_DbTable($db);
$authAdapter->setTableName($config->database->dbprefix
	.'_users')
            ->setIdentityColumn('username')
            ->setCredentialColumn('password');
			
	$username = $_POST['username'];
	$password = md5($_POST['password']);
			
$authAdapter->setIdentity($username)
            ->setCredential($password);

$result = $authAdapter->authenticate();


if ($result->isValid()) {

$active = $authAdapter->getResultRowObject('active');

if ($active->active == 1) {
		 
$idUser = new Zend_Session_Namespace('user'); 
$idUser->hash = $result->getIdentity();
$idUser->lock();
$idUser->setExpirationSeconds($config->security->sessiontime);
$sesmy = new Zend_Session_Namespace('layout');
$sesmy->id = $_GET['layout'];
$sesIP = new Zend_Session_Namespace('sesip'); 
$sesIP->hash = md5($_SESSION['user']['hash'].$_SERVER['REMOTE_ADDR']);
$sesIP->ip = md5($_SERVER['REMOTE_ADDR']);
$sesIP->lock();
		
		redirect ("index");
		
		} else {

        $msg = $translate->_("NOPASS");

        }
	  

} else {

    $msg = $translate->_("NOPASS");

}
		
} else if (isset($_POST['Login!']) && $_POST['username'] == "" && $_POST['password'] == "") {

    $msg = $translate->_("NOPASS");

}

if (file_exists($config->apppath.'templates/'.$seslay->value
.'/login.php')) 
{ include ($config->apppath.'templates/'.$seslay->value
.'/login.php'); }
else { $seslay->value = $config->defaultlayout;
include ($config->apppath.'templates/'.$config->defaultlayout
.'/login.php'); }


}

?>