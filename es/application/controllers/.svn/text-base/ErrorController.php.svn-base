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
	no application id
	*/

class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
	/*
	no function
	*/
    }
}

	/*
	session check
	*/
if (!isset($_SESSION['user']['hash'])) 
{ 
Zend_Session::destroy();
Zend_Session::expireSessionCookie();
ob_clean();
exit();
}

?>
