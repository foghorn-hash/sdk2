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


$allowed_tags = '<a><div><span><h1><h2><h3><h4><h5><h6><del><strike><u><b><img><i><s><strong><em><br><p><ul><ol><li>';


echo '<div align="left">'; 

starttabpane('blog-pane');
starttabpage($translate->_("blog"));

if (!isset($_GET['action'])) { $_GET['action'] = "default"; }
$action = $_GET['action'];
		
switch ($action) {

case 'edit':

settype($_GET['id'], 'integer');

   $row = $db->fetchRow(
    "SELECT * FROM ".$config->database->dbprefix."_content 
	WHERE id = :id LIMIT 1;",
    array('id' => $_GET['id'])
);

$db_prefix = $config->database->dbprefix;
$set = array (
    'edit' => '1'
);
$table = $db_prefix.'_content';
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_GET['id']);
 
$rows_affected = $db->update($table, $set, $where);

?>

<script language="JavaScript" src="<?php echo $url_prefix; ?>includes/js/calendar/joomla.javascript.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $url_prefix; ?>includes/js/calendar/calendar-mos.css" title="green" />
				
		<script type="text/javascript" src="<?php echo $url_prefix; ?>includes/js/calendar/calendar_mini.js"></script>
		<script type="text/javascript" src="<?php echo $url_prefix; ?>includes/js/calendar/lang/<?php echo $lang['jscalendar'];?>"></script>

<form action="" method="post" name="editFrom">

<?php echo $lang['title']; ?> <input name="title" type="text" value="<?php echo $row['title']; ?>" size="40" />

<?php echo $lang['publicdete']; ?> <input name="date" id="date" type="text" value="<?php echo date("Y-m-d", strtotime(strip_tags(stripslashes($row['public_date'])))); ?>" size="20" />
<input name="reset" type="reset" class="button" onClick="return showCalendar('date', 'y-mm-dd');" value="<?php echo $lang['calendar']; ?>">

<?php echo $lang['hour']; ?> <select name="h">
<option "00"<?php if (stristr($row['public_date']," 00:")) {echo " selected";} ?>>00</option>
<option "01"<?php if (stristr($row['public_date']," 01:")) {echo " selected";} ?>>01</option>
<option "02"<?php if (stristr($row['public_date']," 02:")) {echo " selected";} ?>>02</option>
<option "03"<?php if (stristr($row['public_date']," 03:")) {echo " selected";} ?>>03</option>
<option "04"<?php if (stristr($row['public_date']," 04:")) {echo " selected";} ?>>04</option>
<option "05"<?php if (stristr($row['public_date']," 05:")) {echo " selected";} ?>>05</option>
<option "06"<?php if (stristr($row['public_date']," 06:")) {echo " selected";} ?>>06</option>
<option "07"<?php if (stristr($row['public_date']," 07:")) {echo " selected";} ?>>07</option>
<option "08"<?php if (stristr($row['public_date']," 08:")) {echo " selected";} ?>>08</option>
<option "09"<?php if (stristr($row['public_date']," 09:")) {echo " selected";} ?>>09</option>
<option "10"<?php if (stristr($row['public_date']," 10:")) {echo " selected";} ?>>10</option>
<option "11"<?php if (stristr($row['public_date']," 11:")) {echo " selected";} ?>>11</option>
<option "12"<?php if (stristr($row['public_date']," 12:")) {echo " selected";} ?>>12</option>
<option "13"<?php if (stristr($row['public_date']," 13:")) {echo " selected";} ?>>13</option>
<option "14"<?php if (stristr($row['public_date']," 14:")) {echo " selected";} ?>>14</option>
<option "15"<?php if (stristr($row['public_date']," 15:")) {echo " selected";} ?>>15</option>
<option "16"<?php if (stristr($row['public_date']," 16:")) {echo " selected";} ?>>16</option>
<option "17"<?php if (stristr($row['public_date']," 17:")) {echo " selected";} ?>>17</option>
<option "18"<?php if (stristr($row['public_date']," 18:")) {echo " selected";} ?>>18</option>
<option "19"<?php if (stristr($row['public_date']," 19:")) {echo " selected";} ?>>19</option>
<option "20"<?php if (stristr($row['public_date']," 20:")) {echo " selected";} ?>>20</option>
<option "21"<?php if (stristr($row['public_date']," 21:")) {echo " selected";} ?>>21</option>
<option "22"<?php if (stristr($row['public_date']," 22:")) {echo " selected";} ?>>22</option>
<option "23"<?php if (stristr($row['public_date']," 23:")) {echo " selected";} ?>>23</option>
</select>

 <?php echo $lang['minute']; ?> <select name="m">
<option "00"<?php if (stristr($row['public_date'],":00:")) {echo " selected";} ?>>00</option>
<option "05"<?php if (stristr($row['public_date'],":05:")) {echo " selected";} ?>>05</option>
<option "10"<?php if (stristr($row['public_date'],":10:")) {echo " selected";} ?>>10</option>
<option "15"<?php if (stristr($row['public_date'],":15:")) {echo " selected";} ?>>15</option>
<option "20"<?php if (stristr($row['public_date'],":20:")) {echo " selected";} ?>>20</option>
<option "25"<?php if (stristr($row['public_date'],":25:")) {echo " selected";} ?>>25</option>
<option "30"<?php if (stristr($row['public_date'],":30:")) {echo " selected";} ?>>30</option>
<option "35"<?php if (stristr($row['public_date'],":35:")) {echo " selected";} ?>>35</option>
<option "40"<?php if (stristr($row['public_date'],":40:")) {echo " selected";} ?>>40</option>
<option "45"<?php if (stristr($row['public_date'],":45:")) {echo " selected";} ?>>45</option>
<option "50"<?php if (stristr($row['public_date'],":50:")) {echo " selected";} ?>>50</option>
<option "55"<?php if (stristr($row['public_date'],":55:")) {echo " selected";} ?>>55</option>
</select>

<?php


require_once 'Zend/Json.php';
$encodedValue = $row['content'];

$phpNative = Zend_Json::decode($encodedValue);

$langname = $config->defaultlang;

?>
<br />
<?php echo $lang['translated']; ?> <input name="translated" size="40" type="text" value="<?php echo $phpNative['lang'][$langname]['title']; ?>" /> 
<br />
<?php

fckeditor_noupload($phpNative['lang'][$langname]['content']);

?>

<input name="submit" type="submit" value="<?php echo $lang['save']; ?>" /> 

<input name="back" type="button" onClick="javascript: window.location='blog';" value="<?php echo $lang['back']; ?>" /> 

</form>

<?php

if (isset($_POST['submit'])) {

$phpNative['lang'][$langname]['content'] = strip_tags(stripslashes($_POST['fckeditor_noupload1']), $allowed_tags);
$trans = get_html_translation_table(HTML_ENTITIES);
$str = utf8_decode($_POST['translated']);
$encoded = strtr($str, $trans);

$phpNative['lang'][$langname]['title'] = $encoded;

$json = Zend_Json::encode($phpNative);

$db_prefix = $config->database->dbprefix;
$set = array (
    'content' => $json,
	'title' => strip_tags(stripslashes($_POST['title'])),
	'public_date' => date("Y-m-d", strtotime(strip_tags(stripslashes($_POST['date']))))." ".$_POST['h'].":".$_POST['m'].":00",
	'modified_date' => new Zend_Db_Expr('NOW()'),
);
$table = $db_prefix.'_content';
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_GET['id']);
 
$rows_affected = $db->update($table, $set, $where);

ob_clean();
redirect ('index/blog?id='.$_GET['id'].'&action=edit&disabled=true');
exit();

}

break;

case 'new':

?>

<script language="JavaScript" src="<?php echo $url_prefix; ?>includes/js/calendar/joomla.javascript.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $url_prefix; ?>includes/js/calendar/calendar-mos.css" title="green" />
				
		<script type="text/javascript" src="<?php echo $url_prefix; ?>includes/js/calendar/calendar_mini.js"></script>
		<script type="text/javascript" src="<?php echo $url_prefix; ?>includes/js/calendar/lang/<?php echo $lang['jscalendar'];?>"></script>

<form action="" method="post" name="editFrom">

<?php echo $lang['title']; ?> <input name="title" type="text" value="oletusotsikko<?php echo rand(1,999); ?>" size="40" />

<?php echo $lang['publicdete']; ?> <input name="date" id="date" type="text" value="<?php echo date('Y-m-d'); ?>" size="20" />

<input name="reset" type="reset" class="button" onClick="return showCalendar('date', 'y-mm-dd');" value="<?php echo $lang['calendar']; ?>">

<?php echo $lang['hour']; ?> <select name="h">
<option "00">00</option>
<option "01">01</option>
<option "02">02</option>
<option "03">03</option>
<option "04">04</option>
<option "05">05</option>
<option "06">06</option>
<option "07">07</option>
<option "08">08</option>
<option "09">09</option>
<option "10">10</option>
<option "11">11</option>
<option "12">12</option>
<option "13">13</option>
<option "14">14</option>
<option "15">15</option>
<option "16">16</option>
<option "17">17</option>
<option "18">18</option>
<option "19">19</option>
<option "20">20</option>
<option "21">21</option>
<option "22">22</option>
<option "23">23</option>
</select>

 <?php echo $lang['minute']; ?> <select name="m">
<option "00">00</option>
<option "05">05</option>
<option "10">10</option>
<option "15">15</option>
<option "20">20</option>
<option "25">25</option>
<option "30">30</option>
<option "35">35</option>
<option "40">40</option>
<option "45">45</option>
<option "50">50</option>
<option "55">55</option>
</select>

<br />
<?php echo $lang['translated']; ?> <input name="translated" size="40" type="text" value="" /> 
<br />
<?php

fckeditor_noupload('');

?>

<input name="submit" type="submit" value="<?php echo $lang['save']; ?>" /> 

<input name="back" type="button" onClick="javascript: window.location='blog';" value="<?php echo $lang['back']; ?>" /> 

</form>

<?php

if (isset($_POST['submit'])) {

$prefix = $config->database->dbprefix;
require_once 'Zend/Json.php';
$encodedValue = '{"lang":{"english":{"title":"","content":""},"finnish":{"title":"","content":""}}}';

$phpNative = Zend_Json::decode($encodedValue);
$langname = $config->defaultlang;
$phpNative['lang'][$langname]['content'] = strip_tags(stripslashes($_POST['fckeditor_noupload1']), $allowed_tags);
$trans = get_html_translation_table(HTML_ENTITIES);
$str = utf8_decode($_POST['translated']);
$encoded = strtr($str, $trans);

$phpNative['lang'][$langname]['title'] = $encoded;

$json = Zend_Json::encode($phpNative);


$row_affected = array(
    'edit'      => '0',
    'user_id' => $my,
    'public'      => '0',
	'public_date'      => date("Y-m-d", strtotime(strip_tags(stripslashes($_POST['date']))))." ".$_POST['h'].":".$_POST['m'].":00",
	'created_date'      => new Zend_Db_Expr('NOW()'),
	'title'      => strip_tags(stripslashes($_POST['title'])),
	'content'      => $json,
	'type'      => 'blog',
	'modified_date'      => new Zend_Db_Expr('NOW()'),
);

$rows_affected = $db->insert($prefix.'_content', $row_affected);

ob_clean();
redirect ('index/blog');
exit();

}

break;

default:

?>



<h1><?php echo $lang['blog']."</h1>";

$rows = $db->fetchAll(
"SELECT * FROM ".$config->database->dbprefix
."_content WHERE user_id = :my AND id > :id AND type = :type ORDER BY public_date DESC;", 
array('id' => 0, 'type' => 'blog', 'my' => $my)
);

$nr = count($rows);

 checkallscript();
 
 if (!isset($_GET['page'])) {$_GET['page'] = 1;}
 
echo "<form name=\"updateform\" method=\"post\" "
 ."action=\"postblog?action=update&amp;id=".$nr."&amp;page=".$_GET['page']."\">";
 
?>

<div style="border: 1px solid #666;">
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="list-table">
  <tr>
    <td width="5%"><?php checkallbox(); ?></td>
    <td width="3%"><?php echo $lang['id']; ?></td>
	<td width="7%"><div align="center"><?php echo $lang['details1']; ?></div></td>
	<td width="5%"><div align="center"><?php echo $lang['details2']; ?></div></td>
    <td width="25%"><?php echo $lang['title']; ?></td>
    <td width="15%"><?php echo $lang['created']; ?></td>
	<td width="15%"><?php echo $lang['publicdete']; ?></td>
	<td width="15%"><?php echo $lang['modifieddete']; ?></td>
	<td width="20%"><?php echo $lang['owner']; ?></td>
  </tr>


<?php

  $i = 1;
  $ii = 2;
  $b = 1;
  $c = 10;
  
  foreach ($rows as $field_index => $field_name)

   {
   
   $d = $i - $c;  

                 
				 
				 if ($d == -9) { $page = "page".$b; $$page = ""."\n"; }
				 
				 if (is_integer($i/2)) { $class = "table-first"; } else { $class = "table-second"; }
                  
				  if ($b == $_GET['page']) {
				  
				 $$page .= "\n\n<tr>\n"
   ."\n<td class=\"$class\">"
   ."<input name=\"del".$i."\" type=\"hidden\" value=\""
   .$field_name['id']."\" />"
   ."<input name=\"$i\" type=\"checkbox\" id=\"option$ii\" /><label for=\"option$ii\">$i</label></td>"
   ."\n<td class=\"$class\">".$field_name['id']."</td>"
   ."\n<td class=\"$class\"><div align=\"center\"><span style=\"color: red;\">[ ".$field_name['public']." ]</span></div></td>"
   ."\n<td class=\"$class\"><div align=\"center\"><span style=\"color: blue;\">[ ".$field_name['edit']." ]</span></div></td>"
   ."\n<td class=\"$class\"><a href=\"?id=".$field_name['id']."&amp;action=edit&amp;disabled=true\">".$field_name['title']."</a></td>"
   ."\n<td class=\"$class\">".date($lang['datetime'], strtotime($field_name['created_date']))."</td>"
   ."\n<td class=\"$class\">".date($lang['datetime'], strtotime($field_name['public_date']))."</td>"
   ."\n<td class=\"$class\">".date($lang['datetime'], strtotime($field_name['modified_date']))."</td>";
   
   $result = $db->fetchRow(
    "SELECT firstname, lastname
	FROM ".$config->database->dbprefix."_users 
	WHERE user_id = :id",
    array('id' => $field_name['user_id'])
);

$user_row = $result['firstname']." "
.$result['lastname'];
   
   $$page .= "\n<td class=\"$class\">$user_row</td>"
   . "</tr>\n\n";	}  
				  
							  
				  if (is_integer($i / 10)) { $b++; if ($b != $_GET['page']) {$$page .= "";} $c+=10; }
				  
				  $p = $i / 10;
   
   

   $i++;
   $ii++;
   }
   
   
if ( $i != 1 ) {
$page = 'page'.$_GET['page'];

if (isset($$page)) {

echo $$page;

} else {

echo "<tr><td colspan=\"7\" align=\"center\" bgcolor=\"#cccccc\">---</td></tr>";

}

} 
   
   ?>

</table>


<div style="float:left;">

<input type="button" onClick="javascript: window.location='?action=new&disabled=true';" name="new" value="<?php echo $lang['new']; ?>" />
<?php if ($nr > 0) { ?>
<input type="submit" name="activate" value="<?php echo $lang['activate']; ?>" />

<input type="submit" name="deactivate" value="<?php echo $lang['deactivate']; ?>" />


<input type="submit" name="editremove" value="<?php echo $lang['editremove']; ?>" />


</div>
<div style="float:right;"><input type="submit" name="delete" value="<?php echo $lang['deleteselected']; ?>" /></div>
<?php } 
else { echo '</div>'; 
} ?>
<div style="clear:both;"> </div>
</form>
</div>
<div style="clear:both;"> </div>
<?php 
if ( $i != 1 ) {
echo "\n &nbsp;".$lang['page'].' ';
$i = 1;

$p = ceil($p);

while ($i <= $p) {
echo "\n".'<a href="?page='.$i."\"".'>['.$i.']</a> '."\n";
$i++;
};
}

break;
}

?>
