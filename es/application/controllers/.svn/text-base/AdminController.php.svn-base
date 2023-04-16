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

/*
application id
*/
$_GET['appid'] = 1;

class AdminController extends Zend_Controller_Action
{
    public function indexAction()
	{

	/*
    globals
	*/
	 global $seslay, $config, $url_prefix, $access, $db, $lang;

     /* 
	 module is a admin
	 */
	 $_GET['module'] = 'admin';

	 /* 
	 execute include_index() function 
	 that includes right module
	 */
      include_index ();

    }

	
}

?>