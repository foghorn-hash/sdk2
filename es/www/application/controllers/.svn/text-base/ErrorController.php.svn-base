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

class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
    global $seslay, $config, $url_prefix, $access, $db, $lang, $sef_suffix;
	if (!isset($_GET['id'])) {$_GET['id'] = 0; }
    include($config->apppath.'www/templates/default_i/header.php'); 
    include($config->apppath.'www/templates/default_i/error.php');
    include($config->apppath.'www/templates/default_i/footer.php'); 
    }
}

?>