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

echo '<h1>'.$phpNative['lang'][$lang_var]['title'].'</h1>';

echo $phpNative['lang'][$lang_var]['content'];

?>