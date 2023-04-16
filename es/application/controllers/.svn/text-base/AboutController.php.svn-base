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
 
 global $seslay, $config, $url_prefix, $access, $db, $lang, $acl, $role;

 $acl->deny('Administrator');
 $acl->deny('Staff 2');
 $acl->deny('Staff 1');
   
     $sql = $db->quoteInto(
    "SELECT * FROM ".$config->database->dbprefix."_app_auth 
	WHERE app_id = ?",
    1
     );

	 
	 
$result = $db->query($sql);
$rows = $result->fetchAll();



 foreach ($rows as $field_index => $field_name)
   {
      
	$result = $db->fetchRow(
    "SELECT role FROM ".$config->database->dbprefix."_acl WHERE 
	acl_id = :id",
    array('id' => $field_name['user_lvl'])
    );
	
	
	  
    if (count($result) == 1) {
	
	$acl->allow($result['role']);
	
	}
   
  

   } 
   
   
  
   
   $access = $acl->isAllowed($role, null, 'view') ?
     "allowed" : "denied";
	
	if ($access == "denied") { redirect('logout'); 
	
	die(); 
	
	}
 
require_once 'Zend/Controller/Action.php';

/*
application id
*/
$_GET['appid'] = 1;

class AboutController extends Zend_Controller_Action
{
    public function indexAction()
	{

	/*
    globals
	*/
	  global $seslay, $config, $url_prefix, $access, $db, $lang;

	 /* 
	 module is a aabout
	 */
	  $_GET['module'] = 'about';
	  
	 /* 
	 execute include_index() function 
	 that includes right module
	 */
     include_index ();

    }

	
}

?>