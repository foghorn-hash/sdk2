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

$rows = $db->fetchAll(
"SELECT id, mvc_var, lang_var FROM ".$config->database->dbprefix
."_applications WHERE active = :active ORDER BY order_id ASC", 
array('active' => 1)
);

echo "<form action=\"\" method=\"post\" name=\"appform\"><select name=\"application\"  OnChange='location.href=\"$url_prefix\" + this.value +\"\"'>";

foreach ($rows as $field_index => $field_name)
   {
   
 
 $acl->deny('Administrator');
 $acl->deny('Staff 2');
 $acl->deny('Staff 1');
   
     $sqli = $db->quoteInto(
    "SELECT * FROM ".$config->database->dbprefix."_app_auth 
	WHERE app_id = ?",
    $field_name['id']
     );

	 
	 
$resulti = $db->query($sqli);
$rowsi = $resulti->fetchAll();

foreach ($rowsi as $field_indexi => $field_namei)
   {
      
	$resulti = $db->fetchRow(
    "SELECT role FROM ".$config->database->dbprefix."_acl WHERE 
	acl_id = :id",
    array('id' => $field_namei['user_lvl'])
    );
	
	
	  
    if (count($resulti) == 1) {
	
	$acl->allow($resulti['role']);
	
	}
   
  

   } 
   
   
  
   
   $access = $acl->isAllowed($role, null, 'view') ?
     "allowed" : "denied";

	


     if ($access == "allowed") {
   
     echo '<option value="'.$field_name['mvc_var'].'"';
	  echo ($_GET['appid'] == $field_name['id']) ? " selected" : "";
	 echo '>';
	 echo $lang[$field_name['lang_var']];
	 echo '</option>'; }
	 
	 
   }; 
   
   ?>
   </select>
   </form>
