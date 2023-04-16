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

include ($config->apppath."templates/defaultblue/header.tpl.php"); ?>
<div style="height: 10px; background-color: #333366;"></div>
<div id="header">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="42" valign="middle" style="padding-left: 10px; padding-right: 10px;">
	<h1><?php echo PORTAL; ?></h1>
	</td>
  </tr>
</table>
</div>
<div id="content">
<center>
<br /><br />
<div style="width: 300px; width: 278px; !importan background-color: #EEEEEE; border: 1px #000000 solid; padding: 10px;">


<center>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="250">

<div align="left">

<b><?php echo $translate->_("LOGINFORM"); ?></b>



<br />
<?php 
if (!isset($msg)) {$msg = "";} else {
echo "<i style=\"color: red;\">".$msg."</i>"; }?>
<br />

<form action="" method="post" name="login">

<?php echo $translate->_("USERNAME"); ?>:&nbsp;
<br />
<input type="text" name="username" size="25" />
<br /><br />

<?php echo $translate->_("PASSWORD"); ?>:&nbsp;
<br />
<input type="password" name="password" size="25" />
<?php if ($config->layoutselector == 1) { ?>
<br /><br />
<?php echo $translate->_("TEMPLATE"); ?>:
<br />
<select name="layouts" OnChange='<?php echo "location.href=\""
."?layout=\"+this.value +\"&lang=".$_GET['lang']."\""; ?>'>
<?php 
$result = $db->fetchAll(
"SELECT * FROM ".$config->database->dbprefix
."_layouts ORDER BY :layout_id ASC", 
array('layout_id' => 'layout_id')
);


if (!isset($_GET['layout'])) { 
$lays = $config->defaultlayout; } else 
{ $lays = $_GET['layout']; }

   $i = 1;

	foreach ($result as $field_index => $field_name)
   {
     echo "\n<!-- SELECT $i -->\n";
	  echo "<option value=\"";
       echo (isset($_GET['layout'])) ? ""
	   .$field_name['layout_dir']."" : $field_name['layout_dir'];
      echo "\"";
     echo ($field_name['layout_dir'] == $lays)?" selected":"";
    echo ">".$field_name['layout_name']."</option>\n";
	$i++;
   }; 
?>
</select> <?php } ?>
<br />
<br />

<?php echo $translate->_("LANGUAGE"); ?>:
<br />
<select name="language" OnChange='<?php 
echo "location.href=\""
."?layout="
.$_GET['layout']."&lang=\"+this.value"; ?>'>
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
<br />
<br />

<input type="submit" name="Login!" value="<?php echo $translate->_("LOGIN"); ?>" />
</form>
<br />
<br />
</div>

    </td>
  </tr>
</table>
<br />
<br />
<span class="copyright">
<?php echo $translate->_("COPYRIGHT"); ?>
</span>
<br />
<br />
<img src="<?php echo str_replace('/es/','/',$url_prefix); ?>images/tes-logo.jpg" alt="logo" />
</center>

</div>
<br />
</center>
</div>
<?php include ($config->apppath."templates/defaultblue/footer.tpl.php"); ?>