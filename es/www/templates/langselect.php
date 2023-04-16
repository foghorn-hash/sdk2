<select name="language" class="lang" OnChange='<?php 
echo "location.href=\""
."?lang=\"+this.value"; ?>'>
<?php 
$result = $db->fetchAll(
"SELECT * FROM ".$config->database->dbprefix
."_lang ORDER BY :lang_id ASC", 
array('lang_id' => 'lang_id')
);

if (!isset($_GET['lang'])) { 
$langs = $config->defaultlang; } 
else { $langs = $_GET['lang']; }
   $i = 1;

	foreach ($result as $field_index => $field_name)
   {

     echo "\n<!-- SELECT $i -->\n";
	  echo "<option value=\"";
       echo (isset($_GET['lang'])) ? ""
	   .$field_name['lang_file']
	   ."" : $field_name['lang_file'];
      echo "\"";
     echo ($field_name['lang_file'] == $langs)?" selected":"";
    echo ">".$field_name['lang_name']."</option>\n";
	$i++;
   }; 
?>
</select>