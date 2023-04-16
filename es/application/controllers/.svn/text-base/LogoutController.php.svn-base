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

class LogoutController extends Zend_Controller_Action
{
    public function indexAction()
	{

	/*
    globals
	*/
	  global $url_prefix, $seslay, $seslang;
	  
	/*
    destroy session
	*/
	  Zend_Session::namespaceUnset('user');
      Zend_Session::destroy();
      Zend_Session::expireSessionCookie();

	/*
    redirect
	*/
	  $this->_redirect($url_prefix.'?layout='.$seslay->value.'&lang='.$seslang->value);

	/*
    clean output and exit
	*/
      ob_clean();
      exit();
	  
    }
	
}
?>