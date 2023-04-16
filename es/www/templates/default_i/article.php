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
 
 echo "<div align=\"left\" style=\"padding:10px;\">";
   
   if (!isset($_GET['subpage'])) {
   
   $result = $db->fetchRow(
    "SELECT id, content, module
	FROM ".$config->database->dbprefix."_content 
	WHERE id = :id",
    array('id' => $_GET['id'])
);

} else {

   $result = $db->fetchRow(
    "SELECT id, content, module
	FROM ".$config->database->dbprefix."_content 
	WHERE id = :id",
    array('id' => $_GET['subpage']));
}

$phpNative = Zend_Json::decode($result['content']);

echo '<h1>'.$phpNative['lang']['finnish']['title'].'</h1>';

echo $phpNative['lang']['finnish']['content'];



?>
<br />
<a href='javascript:history.go(-1)'>[ Takaisin ]</a>
</div>
	  
