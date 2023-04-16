<?php
 
/**
 * Teknologiaplaneetta Enterprise Solution
 *
 * LICENSE: Open Source (GNU GPL)
 *
 * @copyright  2006-2008 Teknologiaplaneetta
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL
 * @version    $Id$ 0.1.5
 * @link       http://www.teknologiaplaneetta.com/
 */ 
 
$acl->allow('Administrator');
$access = $acl->isAllowed($role, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") { 

}

?>