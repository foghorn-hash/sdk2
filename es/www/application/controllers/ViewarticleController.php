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
 
require_once 'Zend/Controller/Action.php';

class ViewarticleController extends Zend_Controller_Action
{
	public function indexAction()
	{

	global $seslay, $config, $url_prefix, $access, $db, $lang, $sef_suffix;
	



    if (!isset($_GET['id'])) {$_GET['id'] = 1; }

	$request = $this->getRequest();
		
    $_GET['id']  = $request->getParam('id'); 
	
	if (!$request->getParam('id')) {$_GET['id'] = 1;}
	if (!$request->getParam('subpage')) {$_GET['subpage'] = 0;}
	
	$_GET['subpage']  = $request->getParam('subpage');
	$_GET['articleof']  = $request->getParam('articleof'); 
	
if ($_GET['subpage'] == 0) {
   
   $result = $db->fetchRow(
    "SELECT id, temp
	FROM ".$config->database->dbprefix."_content 
	WHERE id = :id",
    array('id' => $_GET['id'])
);

} else {

   $result = $db->fetchRow(
    "SELECT id, temp
	FROM ".$config->database->dbprefix."_content 
	WHERE id = :id",
    array('id' => $_GET['subpage']));
}



   $row = $db->fetchRow(
    "SELECT id, folder
	FROM ".$config->database->dbprefix."_templates 
	WHERE id = :id",
    array('id' => $result['temp']));

	$m = count($row);

	if ($m != 1) {

include($config->apppath.'www/templates/'.$row['folder'].'/header.php'); 
include($config->apppath.'www/templates/'.$row['folder'].'/article.php');
include($config->apppath.'www/templates/'.$row['folder'].'/footer.php');

}

else
{

include($config->apppath.'www/templates/default_i/header.php'); 
include($config->apppath.'www/templates/default_i/error.php');
include($config->apppath.'www/templates/default_i/footer.php');

}



    }
	
}

?>