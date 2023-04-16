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
"SELECT mvc_var, mod_dir FROM ".$config->database->dbprefix
."_modules WHERE active = :active AND app_id = :appid ORDER BY order_id ASC", 
array('active' => 1, 'appid' => $_GET['appid'])
);

// mainmenu

echo '<ul id="mainmenu">';

foreach ($rows as $field_index => $field_name)
   {
   
$app = $db->fetchAll(
"SELECT mvc_var FROM ".$config->database->dbprefix
."_applications WHERE id = :id", 
array('id' => $_GET['appid'])
); 
  
     echo '<li><a href="'.$url_prefix.$app[0]['mvc_var'].'/'.$field_name['mvc_var']
	 .'" class="mainmenu"';
	  echo ($_GET['module'] == $field_name['mod_dir']) ? " id=\"active_menu\"" : "";
	 echo '>';
	 echo $lang[$field_name['mod_dir']];
	 echo '</a></li>';
   };
?>
</ul>