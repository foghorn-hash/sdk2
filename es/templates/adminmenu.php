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




echo '<ul id="adminmenu">';

echo '<li><a href="'.str_replace('/es/','/',$url_prefix).'" target="_blank">'.$lang['_PREVIEW'].'</a></li>';

echo '<li><a href="'.$url_prefix.'about" class="adminmenu"';
if ($_GET['module'] == "about") {
echo ' id="active_menu_admin"'; }
echo '>'.$translate->_("about").'</a></li>';

$acl->allow('Administrator');
$access = $acl->isAllowed($role, null, 'view') ?
     "allowed" : "denied";
if ($access == "allowed") { 

echo '<li><a href="'.$url_prefix.'admin" class="adminmenu"';
if ($_GET['module'] == "admin") {
echo ' id="active_menu_admin"'; }
echo '>'.$translate->_("admin").'</a></li>';

}

echo '<li><a href="'.$url_prefix.'logout" class="mainmenu">'.$translate->_("LOGOUT").'</a></li>';

echo '</ul>';


?>
