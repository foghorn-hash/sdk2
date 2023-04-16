<ul id="mainlevel">
	<?php 
	
	require_once 'Zend/Json.php';
	

	
	$rows = $db->fetchAll(
"SELECT * FROM ".$config->database->dbprefix
."_content WHERE id > :id AND public = :pk AND type = :type AND sub_of = :od ORDER BY order_id ASC;", 
array('id' => 0, 'type' => 'content', 'pk' => 1, 'od' => 0)
);
  
$lang_var = $_SESSION['lang']['value'];

  $i = 1;

  foreach ($rows as $field_index => $field_name)
   
   {
   
   $phpNative = Zend_Json::decode($field_name['content']);
   $decode_title = html_entity_decode($phpNative['lang'][$lang_var]['title']);
   $decode_title = strtr($decode_title, "ִֵײהוצ", "AAOaao");
   
   echo "<li";
     if ($i == 1) { echo " id=\"first\""; } 
    echo '><a href="/'.$field_name['id'].'-0-'.strtolower(preg_replace("![^0-9A-Za-z\s]!", "_",(str_replace(' ','_',$decode_title)))).$sef_suffix.'?lang='.$_SESSION['lang']['value'].'"';
  
    if ($field_name['id'] == $_GET['id']) { echo " class=\"active_menu\""; }

    echo '>'.$phpNative['lang'][$lang_var]['title'].'</a></li>';
$i++;
   }
	?>
	</ul>