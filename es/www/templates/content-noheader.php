<?php 
   
   if ($_GET['subpage'] == 0) {
   
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

echo $phpNative['lang'][$lang_var]['content'];

?>