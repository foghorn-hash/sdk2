<ul id="sublevel">


		<?php 
	
	
	$rows = $db->fetchAll(
"SELECT * FROM ".$config->database->dbprefix
."_content WHERE id > :id AND public = :pk AND type = :type AND sub_of > :od AND sub_of = :odid ORDER BY order_id ASC;", 
array('id' => 0, 'type' => 'content', 'pk' => 1, 'od' => 0, 'odid' => $_GET['id'])
);

if (!isset($_GET['articleof'])) {$_GET['articleof'] = 0; }

  foreach ($rows as $field_index => $field_name)
   
   {
   	
   
   $phpNative = Zend_Json::decode($field_name['content']);
   
   $decode_title = html_entity_decode($phpNative['lang'][$lang_var]['title']);
   $decode_title = strtr($decode_title, "ִֵײהוצ", "AAOaao");
   
   echo "<li"; 
   
   echo '>';
  
  echo '<a href="/'.$field_name['sub_of'].'-'.$field_name['id'].'-'.strtolower(preg_replace("![^0-9A-Za-z\s]!", "_",(str_replace(' ','_',$decode_title)))).$sef_suffix.'?lang='.$_SESSION['lang']['value'].'"'; 
   if (isset($_GET['subpage'])) { 
   if ($field_name['id'] == $_GET['subpage'] || $field_name['id'] == $_GET['articleof']) { echo " class=\"active\""; }
   }
   echo '>'.$phpNative['lang'][$lang_var]['title'].'</a></li>';
   }
	?>	
<li>&nbsp;</li>
		</ul>