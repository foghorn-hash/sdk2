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

if (!isset($_POST['layoutti'])) {$_POST['layoutti'] = "";}
?>

<center>

<br /> 
<br />

<form action="" method="post" name="login">


<?php if ($config->layoutselector == 1) { ?>
<select name="layouts" OnChange='<?php echo "location.href=\"?layout=\"+this.value +\"&lang=".$_GET['lang']."\""; ?>'<?php if(isset($_GET['disabled'])) { echo ' disabled'; } ?>>
<?php 
$result = $db->fetchAll(
"SELECT * FROM ".$config->database->dbprefix."_layouts ORDER BY :layout_id ASC", 
array('layout_id' => 'layout_id')
);

if (!isset($_GET['layout'])) { $lays = $config->defaultlayout; } else { $lays = $_GET['layout']; }
   $i = 1;
	foreach ($result as $field_index => $field_name)
   {
     echo "\n<!-- SELECT $i -->\n";
	  echo "<option value=\"";
       echo (isset($_GET['layout'])) ? ""
	   .$field_name['layout_dir']
	   ."" : $field_name['layout_dir'];
      echo "\"";
     echo ($field_name['layout_dir'] == $lays)?" SELECTED":"";
    echo ">".$field_name['layout_name']
	."</option>\n";
	$i++;
   }; 
?>
</select>

 <br /> <br />
 <?php } ?>
<select name="language" OnChange='<?php echo "location.href=\"?layout="
.$_GET['layout']."&lang=\"+this.value"; ?>'<?php if(isset($_GET['disabled'])) { echo ' disabled'; } ?>>
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
	   .$field_name['lang_file']."" : $field_name['lang_file'];
      echo "\"";
     echo ($field_name['lang_file'] == $langs)?" SELECTED":"";
    echo ">".$field_name['lang_name']."</option>\n";
	$i++;
   };
?>
</select>

</form>

<br />
<br />
<span class="copyright"><?php echo $translate->_("COPYRIGHT"); ?></span>

</center>

<br />
<br />

