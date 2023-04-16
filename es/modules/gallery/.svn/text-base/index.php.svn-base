<?php

/**
* Teknologiaplaneetta - Enterprise Solution (PHP 4 Editon)
*
* LICENSE: Open Source (GNU GPL)
*
* @copyright  2006-2008 Teknologiaplaneetta
* @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL
* @version    $Id$ 1.0.0
* @link       http://www.teknologiaplaneetta.com/
*/

$apppath = $config->apppath.'modules/gallery/upload/';
$serverpath = $config->wwwpath.'/uploads/';

$allowed_tags = '<a><div><span><h1><h2><h3><h4><h5><h6><del><strike><u><b><img><i><s><strong><em><br><p><ul><ol><li>';

if (!isset($_GET['action'])) { $_GET['action'] = "default"; }

$action = $_GET['action'];

switch ($action) {

case 'image':

ob_clean();

if (isset($_GET['f'])) {
$f = $_GET['f'];
if (file_exists($apppath.$_GET['gallery'].'/'.$f)) {
if (!isset($_GET['option'])) {

if (stristr($_GET['f'], '.png')) { 
header("Content-type: image/png");
} else if (stristr($_GET['f'], '.png')) { 
header("Content-type: image/gif");
} else if (stristr($_GET['f'], '.jpg')) { 
header("Content-type: image/jpeg");
}
header('Content-disposition: inline; filename="'.$f.'"');

$string = $_GET['f'];
	
	if (stristr($_GET['f'], '.gif')) { $im = @imagecreatefromgif ($apppath.$_GET['gallery'].'/'.$f); }
	else if (stristr($_GET['f'], '.png')) { $im = @imagecreatefrompng ($apppath.$_GET['gallery'].'/'.$f); }
	else if (stristr($_GET['f'], '.jpg')) { $im = @imagecreatefromjpeg ($apppath.$_GET['gallery'].'/'.$f); }

$orange = imagecolorallocate($im, 0, 0, 0);
$px     = (imagesx($im) - 7.5 * strlen($string)) / 2;

if (stristr($_GET['f'], '.png')) { 
imagepng($im);
} else if (stristr($_GET['f'], '.jpg')) { 
imagejpeg($im);
} else if (stristr($_GET['f'], '.gif')) { 
imagegif($im);
} 

imagedestroy($im);
 
} else {

if (stristr($_GET['f'], '.png')) { 
header("Content-type: image/png");
} else if (stristr($_GET['f'], '.png')) { 
header("Content-type: image/gif");
} else if (stristr($_GET['f'], '.jpg')) { 
header("Content-type: image/jpeg");
}
header('Content-disposition: inline; filename="'.$f.'"');

list($width_orig, $height_orig) = getimagesize($serverpath.'active/'.$_GET['gallery'].'_'.$f);
$image_t = imagecreatetruecolor(100, 100);

if (stristr($_GET['f'], '.gif')) { $im = @imagecreatefromgif ($serverpath.'active/'.$_GET['gallery'].'_'.$f); }
	else if (stristr($_GET['f'], '.png')) { $im = @imagecreatefrompng ($serverpath.'active/'.$_GET['gallery'].'_'.$f); }
	else if (stristr($_GET['f'], '.jpg')) { $im = @imagecreatefromjpeg ($serverpath.'active/'.$_GET['gallery'].'_'.$f); }

imagecopyresampled($image_t, $im, 0, 0, 0, 0, 100, 100, $width_orig, $height_orig);

if (stristr($_GET['f'], '.png')) { 
imagepng($image_t);
} else if (stristr($_GET['f'], '.jpg')) { 
imagejpeg($image_t);
} else if (stristr($_GET['f'], '.gif')) { 
imagegif($image_t);
} 

imagedestroy($image_t); 

}

} else {

header("Content-type: image/png");
header('Content-disposition: inline; filename="404.png"');

$im = @imagecreate(200, 200)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 0, 0, 255);
$text_color = imagecolorallocate($im, 0, 0, 0);
imagestring($im, 10, 30, 85,  "404", $text_color);
imagepng($im);
imagedestroy($im);

}

}
exit();
break;

case 'edit':

   $row = $db->fetchRow(
    "SELECT * FROM ".$config->database->dbprefix."_gallery 
	WHERE id = :id LIMIT 1;",
    array('id' => $_GET['id'])
);

$db_prefix = $config->database->dbprefix;
$set = array (
    'edit' => '1'
);
$table = $db_prefix.'_gallery';
$where = $db->quoteInto('`'.$db_prefix.'_gallery`.`id` = ?', $_GET['id']);
 
$rows_affected = $db->update($table, $set, $where);

?>

<script language="JavaScript" src="<?php echo $url_prefix; ?>includes/js/calendar/joomla.javascript.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $url_prefix; ?>includes/js/calendar/calendar-mos.css" title="green" />
				
		<script type="text/javascript" src="<?php echo $url_prefix; ?>includes/js/calendar/calendar_mini.js"></script>
		<script type="text/javascript" src="<?php echo $url_prefix; ?>includes/js/calendar/lang/<?php echo $lang['jscalendar'];?>"></script>


<form action="" method="post" name="editFrom">

Index <input name="index" type="text" value="<?php echo $row['index']; ?>" size="20" disabled />

<?php echo $lang['title']; ?> <input name="title" type="text" value="<?php echo $row['title']; ?>" size="40" />

<?php echo $lang['publicdete']; ?> <input name="date" id="date" type="text" value="<?php echo $row['public_date']; ?>" size="20" />
<input name="reset" type="reset" class="button" onClick="return showCalendar('date', 'y-mm-dd');" value="...">
<br />
<?php 
require_once 'Zend/Json.php';
$encodedValue = $row['text'];

$phpNative = Zend_Json::decode($encodedValue);

$langname = $_SESSION['lang']['value'];

echo $lang['translated']; 
$langname = $_SESSION['lang']['value'];
?> <input name="translated" size="40" type="text" value="<?php echo $phpNative['lang'][$langname]['title']; ?>" /> 
<?php



fckeditor_noupload($phpNative['lang'][$langname]['content']);

?>

<input name="submit" type="submit" value="<?php echo $lang['save']; ?>" />

<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />

</form>

<?php

if (isset($_POST['submit'])) {

// mysql_query("UPDATE `es_gallery` SET `public_date` = '".date("Y-m-d", strtotime(strip_tags(stripslashes($_POST['date']))))."', `title` = '".strip_tags(stripslashes($_POST['title']))."', `text` = '".strip_tags(stripslashes($_POST['elm1']), '<b>')."', `modified_date` = NOW() WHERE  `es_gallery`.`id` = ".$_POST['id'].";");

$phpNative['lang'][$langname]['content'] = strip_tags(stripslashes($_POST['FCKeditor1']), $allowed_tags);
$trans = get_html_translation_table(HTML_ENTITIES);
$str = utf8_decode($_POST['translated']);
$encoded = strtr($str, $trans);

$phpNative['lang'][$langname]['title'] = $encoded;

$json = Zend_Json::encode($phpNative);

$db_prefix = $config->database->dbprefix;
$set = array (
    'text' => $json,
	'title' => strip_tags(stripslashes($_POST['title'])),
	'public_date' => date("Y-m-d", strtotime(strip_tags(stripslashes($_POST['date'])))),
	'modified_date' => new Zend_Db_Expr('NOW()'),
);
$table = $db_prefix.'_gallery';
$where = $db->quoteInto('`'.$db_prefix.'_gallery`.`id` = ?', $_GET['id']);
 
$rows_affected = $db->update($table, $set, $where);

ob_clean();
redirect ('index/gallery');
exit();


}

// mysql_close($link);

break;

case 'new':

?>

<script language="JavaScript" src="<?php echo $url_prefix; ?>includes/js/calendar/joomla.javascript.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $url_prefix; ?>includes/js/calendar/calendar-mos.css" title="green" />
				
		<script type="text/javascript" src="<?php echo $url_prefix; ?>includes/js/calendar/calendar_mini.js"></script>
		<script type="text/javascript" src="<?php echo $url_prefix; ?>includes/js/calendar/lang/<?php echo $lang['jscalendar'];?>"></script>


<form action="" method="post" name="editFrom">

Index <input name="index" type="text" value="index" size="20" />

<?php echo $lang['title']; ?> <input name="title" type="text" value="[oletus-otsikko]" size="40" />

<?php echo $lang['publicdete']; ?> <input name="date" id="date" type="text" value="<?php echo date('Y-m-d'); ?>" size="20" />

<input name="reset" type="reset" class="button" onClick="return showCalendar('date', 'y-mm-dd');" value="...">
<br />
<?php echo $lang['translated']; ?> <input name="translated" size="40" type="text" value="" /> 

<?php

fckeditor_noupload('');

?>

<input name="submit" type="submit" value="<?php echo $lang['save']; ?>" />

</form>

<?php

if (isset($_POST['submit'])) {

$folder = strtolower(str_replace(' ', '_', preg_replace("![^0-9A-Za-z\s]!", "", $_POST['index'])).'_'.rand(1,9999).'-'.rand(1,9999).'-'.sha1(strip_tags(stripslashes($_POST['title'])).rand(1,9999).rand(1,9999)));

$prefix = $config->database->dbprefix;
require_once 'Zend/Json.php';
$encodedValue = '{"lang":{"english":{"title":"","content":""},"finnish":{"title":"","content":""}}}';

$phpNative = Zend_Json::decode($encodedValue);
$langname = $_SESSION['lang']['value'];
$phpNative['lang'][$langname]['content'] = strip_tags(stripslashes($_POST['FCKeditor1']), $allowed_tags);


$trans = get_html_translation_table(HTML_ENTITIES);
$str = utf8_decode($_POST['translated']);
$encoded = strtr($str, $trans);

$phpNative['lang'][$langname]['title'] = $encoded;

$json = Zend_Json::encode($phpNative); 

$row_affected = array(
    'edit'      => '0',
    'sub'      => '0',
    'owner' => $my,
    'public'      => '0',
	'public_date'      => date("Y-m-d", strtotime(strip_tags(stripslashes($_POST['date'])))),
	'created_date'      => new Zend_Db_Expr('NOW()'),
	'title'      => strip_tags(stripslashes($_POST['title'])),
	'text'      => $json,
	'modified_date'      => new Zend_Db_Expr('NOW()'),
	'index' =>  strtolower(str_replace(' ', '_', preg_replace("![^0-9A-Za-z\s]!", "", $_POST['index']))),
	'folder' => $folder,
); 


$rows_affected = $db->insert($prefix.'_gallery', $row_affected);


$folder=$apppath.$folder.'/';

mkdir($folder);

$handle = fopen($folder."index.html", "w");

fclose($handle);

ob_clean();
redirect ('index/gallery');
exit();

}

break;

case 'gallery':

if (!isset($_GET['imageedit'])) { $_GET['imageedit'] = "default"; }

$editimage = $_GET['imageedit'];

switch ($editimage) {

case 'true':

   $row = $db->fetchRow(
    "SELECT * FROM ".$config->database->dbprefix."_gallery_data 
	WHERE image = :id AND cat_id = :cat LIMIT 1;",
    array('id' => $_GET['img'], 'cat' => $_GET['id'])
);

?>
<form action="" method="post" name="editFrom">

<input name="title" value="<?php echo $row['title']; ?>" type="text" />
<br /><br />
<textarea name="text" rows="6" cols="40"><?php echo $row['text']; ?></textarea>
<br /><br />
<input name="submit" type="submit" value="<?php echo $lang['save']; ?>" />

<input type="hidden" value="<?php echo $row['id']; ?>" name="id" />

</form>



<?php

if (isset($_POST['submit'])) {

/* mysql_query ("UPDATE `es_gallery_data` SET `title` = '".$_POST['title']."', 
`text` = '".$_POST['text']."', `title_act` = 0, 
`text_act` = 0 WHERE  `es_gallery_data`.`id` = "
.$_POST['id'].";"); */

$db_prefix = $config->database->dbprefix;
$set = array (
    'text' => strip_tags(stripslashes($_POST['text'])),
	'title' => strip_tags(stripslashes($_POST['title'])),
	'title_act' => '0',
	'text_act' => '0',
);
$table = $db_prefix.'_gallery_data';
$where = $db->quoteInto('`'.$db_prefix.'_gallery_data`.`id` = ?', $_POST['id']);  
   
$rows_affected = $db->update($table, $set, $where);

ob_clean();
redirect ('index/gallery?id='.$_GET['id'].'&action=gallery&gallery='.$_GET['gallery']);
exit();

}



break;

default:

?>
<h1><?php echo $lang['gallery'].""; ?></h1>
<div id="edit" class="edit">
<div style="border: 1px solid #666;">
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="list-table">
  <tr>
    <td width="2%"><?php echo $lang['number']; ?></td>
	<td width="8%"><?php echo $lang['kuva']; ?></td>
    <td width="15%"><?php echo $lang['file']; ?></td>
	<td width="5%"><?php echo $lang['chmod']; ?></td>
	<td width="5%"><?php echo $lang['koko']; ?></td>
	<td width="10%"><?php echo $lang['modifieddete']; ?></td>
	
	<td width="2%"><?php echo $lang['number']; ?></td>
	<td width="8%"><?php echo $lang['kuva']; ?></td>
    <td width="15%"><?php echo $lang['file']; ?></td>
	<td width="5%"><?php echo $lang['chmod']; ?></td>
	<td width="5%"><?php echo $lang['koko']; ?></td>
	<td width="10%"><?php echo $lang['modifieddete']; ?></td>
	
  </tr>

<?php 

$DirPath=$apppath.$_GET['gallery'].'/';

$i = 1;
$b = 1;
$c = 6;

if (($handle=opendir($DirPath)))
{


   
   while ($node = readdir($handle))
   {
       $nodebase = basename($node);
       if ($nodebase!="." && $nodebase!="..")
       {
           if(is_file($DirPath.$node))
           {
		      if ( 
			  stristr( $DirPath.$node, ".png") ||
			  stristr( $DirPath.$node, ".jpg") ||
			  stristr( $DirPath.$node, ".gif")
			  )
			  
                {
				
				$d = $i - $c;  

                 if ($d == -5) { $ipage = $b; $page = "page".$b; $$page = ""."\n"; }
				 
				
				list($width_orig, $height_orig) = getimagesize($DirPath.$node);
				
				if ($width_orig > 600) {$width_orig = 600;}
				if ($height_orig > 450) {$height_orig = 450;}
				
				$link_url = "?module=galleria&id=".$_GET['gallery']."&action=image&gallery=".$_GET['gallery']."&f=".$node."&option=thumb";
				 
				 if (is_integer($i/2)) { $class = "table-first"; } 		
			 
				 else { $class = "table-second"; }
                  
				  $$page .= "\n\n";
				  
				   if (is_integer(($i-1)/2)) { $$page .= '<tr>'; }
				  
				  $$page .= '<td class="'.$class.'">'
				  .$i.'</td>'
				  .'<td class="'.$class.'"><div align="center">'
				  .'<a href="'
				  .'/uploads/active/'
				  .$_GET['gallery'].'_'.$node.'" alt="'.$node.'"'
				  .'" '
				  ."title=\"".$node."\" class=\"thickbox\" rel=\"gallery-plants\">"
			      .'<img src="'.$link_url.'" alt="thumb'.$i.'" width="100" height="100" />'
	              .'</a></td><td class="'.$class.'"> '.$node.'<br /><a href="'
				  .'/uploads/active/'
				  .$_GET['gallery'].'_'.$node.'" alt="'.$node.'"'
				  ."title=\"".$node."\" class=\"thickbox\" rel=\"gallery-plants\">[ "
			      .$lang['view'] 
	              ." ]</a><br />\n"
				  ."<a href=\"".$_SERVER['REQUEST_URI']."&amp;imageedit=true&amp;img=".$node."\">[ "
				  .$lang['edit'] 
				  ." ]</a><br />\n"
				  ."<a href=\"#\""
				  ."onclick=\"javascript: window.open('"
				  ."/es/editors/ImageEditor/index.php?imageName=".$_GET['gallery']."_".$node
				  ."', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,"
				  ."resizable=yes,width=800,height=600'); return false\""
				  ."\" title=\"".$node."\" target=\"_blank\""
				  .">[ "
				  .'ImageEditor'
				  ." ]</a><br />\n"
				  .'</td><td class="'.$class.'" width="10%">'
				  .substr(sprintf('%o', fileperms($DirPath.$node)), -4).'</td><td class="'.$class.'">'
				  .filesize($DirPath.$node).''.$lang['kb']
				  .'<br /><span style="color: red;">'
				  ."$width_orig".'x'."$height_orig"
				  .'</span></td><td class="'.$class.'">'
				  .date($lang['datetime'], filectime($DirPath.$node)).'</td>';
				  
				  if (is_integer($i/2)) { $$page .= '</tr>'."\n\n";  }	  
				  
				  
			
				  
				  if (is_integer($i / 6)) { $$page .= "\n"; $b++; $c+=6;  }
				  
				  $p = $i / 6;
	                 
				  $ip = $i;
				  
				  if (is_integer($i / 6)) { $ip = 1; }
				  
				  $$ipage = $ip;

                  $i++;
				  

				  				  				  
				}
				

            }

       }
   }

}

if (!isset($_GET['page'])) {$_GET['page'] = 1;}
if ( $i != 1 ) {
$page = 'page'.$_GET['page'];

if (isset($$page)) {

echo $$page;

} else {

echo  "<tr><td colspan=\"12\" class=\"table-first\"><div align=\"center\">----- ".$lang['pagenotfound']." ------</div></td></tr>";

}

} else {

echo  "<tr><td colspan=\"12\" class=\"table-first\"><div align=\"center\">----- ".$lang['empty']." ------</div></td></tr>";

}

$ipage = $_GET['page'];

if (is_integer($i/2) && $$ipage != 1) {

?>	
	<td class="table-first"><?php echo $i; ?></td>
	<td class="table-first">&nbsp;</td>
    <td class="table-first">&nbsp;</td>
	<td class="table-first">&nbsp;</td>
	<td class="table-first">&nbsp;</td>
	<td class="table-first">&nbsp;</td>
	
  </tr>
<?php
}
?>
</table>
</div>
</div>
<?php 
if ( $i != 1 ) {
echo "\n &nbsp;".$lang['page'].' ';
$i = 1;

$p = ceil($p);

while ($i <= $p) {
echo "\n".'<a href="?module=galleria&page='.$i.'&ajax=load&id='.$_GET['id'].'&action=gallery&gallery='.$_GET['gallery'].'">['.$i.']</a> '."\n";
$i++;
};
}

?>

<br /><br />

      <form action="" method="post" enctype="multipart/form-data">
       <input type="file" class="multi" accept="gif|jpg|png" maxlength="3"/>
	   <input type="submit" name="submit" value="Upload" />
      </form>
 


<?php

if (isset($_POST['submit'])) {

$i = 0;
foreach ($_FILES as $get => $key) {	

	if(is_uploaded_file($_FILES['MF__F_0_'.$i]['tmp_name']))
    {
	


        $dir = $apppath.$_GET['gallery'].'/';
        $name = rand(1,9999).'-'.rand(1,9999).'-'.strtolower(strtr(str_replace(' ','_',$_FILES['MF__F_0_'.$i]['name']), "ÄÅÖäåö", "AAOaao"));

        move_uploaded_file($_FILES['MF__F_0_'.$i]['tmp_name'], $dir . $name);
		
	$row_affected = array(
    'image'      => $name,
	'title'      => '[oletus otsikko]',
	'text'      => '[oletus teksti]',
	'title_act'      => '0',
	'text_act'      => '0',
	'modified_date'      => new Zend_Db_Expr('NOW()'),
	'created_date'      => new Zend_Db_Expr('NOW()'),
	'cat_id'      => $_GET['id'],	
	'image_url'      => $_GET['gallery'].'_'.$name,
	'owner' => $my
      );

        $rows_affected = $db->insert($config->database->dbprefix.'_gallery_data', $row_affected);
		
		 $newdir = $serverpath;
		 
		 $orginal_file = $dir . $name;
		 $new_original_file = $newdir . 'original/' .$_GET['gallery'].'_'.$name;
         $edit_file = $newdir . 'edit/' .$_GET['gallery'].'_'.$name;
		 $active_fie = $newdir . 'active/' .$_GET['gallery'].'_'.$name;
		 
		 if (!copy($orginal_file, $new_original_file)) {
         // copies file for editor
         }

         if (!copy($orginal_file, $edit_file)) {
         // copies file for editor
         }
		 
		 if (!copy($orginal_file, $active_fie)) {
         // copies file for editor
         }

    }
    else
    {

    }
	

		 $i++;
		 
		 }
		 
ob_clean();
if(!isset($_GET['page'])) { $_GET['page'] = 1; }
redirect ('index/gallery?module=galleria&page='.$_GET['page'].'&ajax=load&id='.$_GET['id'].'&action=gallery&gallery='.$_GET['gallery']);
exit();

}

break;


}

break;

default:

?>



<h1><?php echo $lang['gallery'].""; ?></h1><?php

$rows = $db->fetchAll(
"SELECT * FROM ".$config->database->dbprefix
."_gallery WHERE id > :id AND sub = :type AND owner = :my ORDER BY created_date DESC;", 
array('id' => 0, 'type' => 0, 'my' => $my)
);

$nr = count($rows);

 checkallscript();
 
 if (!isset($_GET['page'])) {$_GET['page'] = 1;}
 
echo "<form name=\"updateform\" method=\"post\" "
 ."action=\"?module=galleria&amp;action=update&amp;id=".$nr."&amp;page=".$_GET['page']."\">";
 
?>

<div style="border: 1px solid #666;">
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="list-table">
  <tr>
    <td width="3%"><?php checkallbox(); ?></td>
    <td width="3%"><?php echo $lang['id']; ?></td>
	<td width="7%"><div align="center"><?php echo $lang['details1']; ?></div></td>
	<td width="5%"><div align="center"><?php echo $lang['details2']; ?></div></td>
    <td width="30%"><?php echo $lang['title']; ?></td>
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
                  
				  
				  $$page .= "\n\n<tr>\n"
   ."\n<td class=\"$class\">"
   ."<input name=\"del".$i."\" type=\"hidden\" value=\""
   .$field_name['id']."\" />"
   ."<input name=\"$i\" type=\"checkbox\" id=\"option$ii\" /><label for=\"option$ii\">$i</label></td>"
   ."\n<td class=\"$class\">".$field_name['id']."</td><td class=\"$class\" align=\"center\"><span style=\"color: red;\">[ ".$field_name['public']." ]</span></td><td class=\"$class\" align=\"center\"><span style=\"color: blue;\">[ ".$field_name['edit']." ]</span></td>"
   ."\n<td class=\"$class\">".$field_name['title']." <a href=\"?id=".$field_name['id']."&amp;action=gallery&amp;gallery=".$field_name['folder']."\">[ ".$lang['view']." ]</a> <a href=\"?module=galleria&amp;id=".$field_name['id']."&amp;action=edit\">[ ".$lang['edit']." ]</a>  </td>"
   ."\n<td class=\"$class\">".date($lang['datetime'], strtotime($field_name['created_date']))."</td>"
   ."\n<td class=\"$class\">".date($lang['date'], strtotime($field_name['public_date']))."</td>"
   ."\n<td class=\"$class\">".date($lang['datetime'], strtotime($field_name['modified_date']))."</td>";
   $result = $db->fetchRow(
    "SELECT firstname, lastname
	FROM ".$config->database->dbprefix."_users 
	WHERE user_id = :id",
    array('id' => $field_name['owner'])
);

$user_row = $result['firstname']." "
.$result['lastname'];
   $$page .= "\n<td class=\"$class\">$user_row</td>"
   . "</tr>\n\n";	  
				  
				  
			
				  
				  if (is_integer($i / 10)) { $$page .= ""; $b++; $c+=10; }
				  
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

<input type="submit" name="activate" value="<?php echo $lang['activate']; ?>" />

<input type="submit" name="deactivate" value="<?php echo $lang['deactivate']; ?>" />


<input type="submit" name="editremove" value="<?php echo $lang['editremove']; ?>" />

</div>


<div style="float:right;"><input type="submit" name="delete" value="<?php echo $lang['deleteselected']; ?>" /></div>
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
echo "\n".'<a href="'."?module=galleria&amp;page=".$i."\"".'>['.$i.']</a> '."\n";
$i++;
};
}

//

$link = mysql_pconnect($config->database->dbhost, $config->database->dbuser, $config->database->dbpasswd);
if (!$link) {
    die(mysql_error());
}

if ($link) {
mysql_select_db($config->database->database);
}

if (isset($_POST['delete'])) {
if ($_GET['action'] == "update") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
settype($_POST['del'.$i],"integer");
$sql_query = mysql_query("SELECT folder FROM es_gallery WHERE id = ".$_POST['del'.$i]." AND owner = $my;");

$sql_result = mysql_fetch_row($sql_query);

if (mysql_num_rows($sql_query) == 0) {
ob_clean();
redirect("index/gallery?page=".$_GET['page']);
exit();
}

settype($_POST['del'.$i],"integer");
if (!isset($_POST[$i])) {$_POST[$i] = "false";}

$delon = 0;

if ($_POST[$i] == "on") {

$delon = 1;

$DirPath=$apppath.$sql_result[0].'/';

$iii = 1;

if (($handle=opendir($DirPath)))
{


   
   while ($node = readdir($handle))
   {
       $nodebase = basename($node);
       if ($nodebase!="." && $nodebase!="..")
       {
           if(is_file($DirPath.$node))
           {

				
				
				  $DelPath = $serverpath . 'edit/';
				  
                  unlink($DelPath.$sql_result[0].'_'.$node);
				  
				  $DelPath = $serverpath . 'active/';
				  
				  unlink($DelPath.$sql_result[0].'_'.$node);
				  
				  $DelPath = $serverpath . 'original/';
				  
				  unlink($DelPath.$sql_result[0].'_'.$node);


	              unlink($DirPath.$node);
				  
				  

			  
                  $iii++;
				  				  				  

				

            }

       }
   }

}

if ($delon == 1) {

mysql_query("DELETE FROM es_gallery WHERE es_gallery.id = ".$_POST['del'.$i]." AND es_gallery.owner = $my;");

mysql_query("DELETE FROM es_gallery_data WHERE es_gallery_data.cat_id = ".$_POST['del'.$i]." AND es_gallery.owner = $my;");

rmdir($DirPath);

}


//

//

}
$i++;
}
ob_clean();
redirect("index/gallery?page=".$_GET['page']);
}
}

if (isset($_POST['activate'])) {
if ($_GET['action'] == "update") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
settype($_POST['del'.$i],"integer");
mysql_query("UPDATE es_gallery SET public = 1 WHERE es_gallery.id = ".$_POST['del'.$i].";");

}
$i++;
}
redirect("index/gallery?page=".$_GET['page']);
}
}

if (isset($_POST['deactivate'])) {
if ($_GET['action'] == "update") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
settype($_POST['del'.$i],"integer");
mysql_query("UPDATE es_gallery SET public = 0 WHERE es_gallery.id = ".$_POST['del'.$i].";");

}
$i++;
}
redirect("index/gallery?page=".$_GET['page']);
}
}

if (isset($_POST['editremove'])) {
if ($_GET['action'] == "update") {
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

if (!isset($_POST[$i])) {$_POST[$i] = "false";}
if ($_POST[$i] == "on") {
settype($_POST['del'.$i],"integer");
mysql_query("UPDATE es_gallery SET edit = 0 WHERE es_gallery.id = ".$_POST['del'.$i].";");

}
$i++;
}
redirect("index/gallery?page=".$_GET['page']);
}
}
mysql_close($link);

}

break;
}

?>