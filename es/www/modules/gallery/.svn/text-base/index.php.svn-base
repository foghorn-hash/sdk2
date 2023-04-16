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
 
 if (file_exists($config->apppath.'www/modules/gallery/lang/'.$seslang->value.'.php')) 
{ include ($config->apppath.'www/modules/gallery/lang/'.$seslang->value.'.php'); }
else { $_GET['lang'] = $config->defaultlang;
include ($config->apppath.'www/modules/gallery/lang/'.$config->defaultlang.'.php'); }

foreach ($lang as &$value) {
    $value = utf8_encode($value);
}

if (isset($_GET['f'])) {
ob_clean();
if (isset($_GET['f'])) {
$f = $_GET['f'];

if (file_exists($config->wwwpath.'uploads/active/'.$_GET['gallery'].'_'.$f)) {
if (!isset($_GET['option'])) {
header("Content-type: image/png");
$string = $_GET['f'];
	
	if (stristr($_GET['f'], '.gif')) { $im = @imagecreatefromgif ($config->wwwpath.'uploads/active/'.$_GET['gallery'].'_'.$f); }
	else if (stristr($_GET['f'], '.png')) { $im = @imagecreatefrompng ($config->wwwpath.'uploads/active/'.$_GET['gallery'].'_'.$f); }
	else if (stristr($_GET['f'], '.jpg')) { $im = @imagecreatefromjpeg ($config->wwwpath.'uploads/active/'.$_GET['gallery'].'_'.$f); }

$orange = imagecolorallocate($im, 0, 0, 0);
$px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
imagestring($im, 20, $px, 9, $string, $orange);
imagepng($im);
imagedestroy($im);
 
} else {

header("Content-type: image/png");
list($width_orig, $height_orig) = getimagesize($config->wwwpath.'uploads/active/'.$_GET['gallery'].'_'.$f);

// $height = $height_orig * 0.5;
// $width = $width_orig * 0.5;

$x1 = 0;
$y1 = 0;
$x2 = 100;
$y2 = 80;
$height = 100;
$width = 80;

$image_t = imagecreatetruecolor($width, $height);

if (stristr($_GET['f'], '.gif')) { $im = @imagecreatefromgif ($config->wwwpath.'uploads/active/'.$_GET['gallery'].'_'.$f); }
	else if (stristr($_GET['f'], '.png')) { $im = @imagecreatefrompng ($config->wwwpath.'uploads/active/'.$_GET['gallery'].'_'.$f); }
	else if (stristr($_GET['f'], '.jpg')) { $im = @imagecreatefromjpeg ($config->wwwpath.'uploads/active/'.$_GET['gallery'].'_'.$f); }

imagecopyresampled($image_t, $im, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// imagecopy($image_t, $im, $x1, $y1, $x1, $y1, $width, $height);

imagepng($image_t);
imagedestroy($image_t); 

}

} else {

header("Content-type: image/png");
$im = @imagecreate(200, 200)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 0, 0, 255);
$text_color = imagecolorallocate($im, 0, 0, 0);
imagestring($im, 10, 30, 85,  "404", $text_color);
imagepng($im);
imagedestroy($im);

}
exit();
}

}


?>


<div align="left" style="padding: 10px;">
<?php

$link = mysql_pconnect($config->database->dbhost, $config->database->dbuser, $config->database->dbpasswd);
if (!$link) {
    die(mysql_error());
}

if ($link) {
mysql_select_db($config->database->database);
}

if (!isset($_GET['action'])) {$_GET['action'] = "default";}
$action = $_GET['action'];

switch ($action) {

case 'view':

$DirPath=$config->apppath.'modules/gallery/upload/'.$_GET['gallery'].'/';

$i = 1;
$b = 1;
$c = 20;

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

                 if ($d == -19) { $page = "page".$b; $$page = ""."\n"; }
				 
				
				list($width_orig, $height_orig) = getimagesize($DirPath.$node);
				
				if ($width_orig > 600) {$width_orig = 600;}
				if ($height_orig > 450) {$height_orig = 450;}
				
				$link_url = "?action=view&amp;f=".$node."&amp;option=thumb&amp;gallery=".$_GET['gallery'];
				 
				 if (is_integer($i/2)) { $class = "table-first"; } 		
			 
				 else { $class = "table-second"; }
                  
				  $mysql_result = mysql_query("SELECT text, title FROM es_gallery_data WHERE cat_id = '".$_GET['cat_id']."' AND image = '$node' LIMIT 1;");
				  $sql_row = mysql_fetch_array($mysql_result);
				  
				  $$page .= "\n\n";
				  						  
				  $$page .= ''
				  .''
				  .'<div style="float:left; width: 20%;">'
				    
					.'<a href="'
				  .'/uploads/active/'
				  .$_GET['gallery'].'_'.$node.'" alt="'.$node.'"'
				  .'" '
				  ."title=\"".$node."\" class=\"thickbox\" rel=\"gallery-plants\">"
			      .'<img src="'.$link_url.'" alt="thumb'
				  .$i.'" width="80" height="100" />'
	              .'</a>';
				 
	              .'<br /><br /><!-- <b>'
				  .$sql_row['title'].'</b><br /><br />'.$sql_row['text']
				  .' --></div>';
				  
				  if (is_integer($i/2)) { $$page .= ''."\n\n";  }	  
				  
				  if (is_integer($i/5)) { $$page .= "\n\n"."<div style=\"clear: both;\"></div>";  }	
			
				  
				  if (is_integer($i / 20)) { $$page .= "\n"; $b++; $c+=20; }
				  
				  $p = $i / 20;
	

			  
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

echo  "<div align=\"center\">----- ".$lang['404']." ------</div>";

}

} else {

echo  "<div align=\"center\">----- ".$lang['empty']." ------</div>";

}



?>	
<div style="clear: both;"></div>
<?php 
if ( $i != 1 ) {
echo "\n &nbsp;Sivu ";
$i = 1;

$p = ceil($p);

while ($i <= $p) {
echo "\n".'<a href="?action=view&amp;gallery='.$_GET['gallery'].'&cat_id='.$_GET['cat_id'].'&amp;page='.$i.'">['.$i.']</a> '."\n";
$i++;
};
}

break;

default:
  
$sql_query = mysql_query("SELECT * FROM es_gallery WHERE id > 0 AND sub = 0 AND public = 1 BY modified_date DESC;");

$nr = mysql_num_rows($sql_query);


 if (!isset($_GET['page'])) {$_GET['page'] = 1;}
 
global $date;

  $i = 1;
  $ii = 2;
  $b = 1;
  $c = 10;
  
  while( $sql_row = mysql_fetch_array($sql_query) )
   {
   
   $d = $i - $c;  

                 if ($d == -9) { $page = "page".$b; $$page = ""."\n"; }
				
				 if (is_integer($i/2)) { $class = "table-first"; } else { $class = "table-second"; }
                  
				  $phpNative = Zend_Json::decode($sql_row['text']);
				  

				  
				  $$page .= "\n\n<div class=\"stretcher\">";
				  if($i>1) {$$page .= '<br />';}
				  $$page .= date($date, strtotime($sql_row['modified_date']))."<h1><a href=\"?action=view&amp;gallery=$sql_row[8]&amp;cat_id=$sql_row[0]\">".$phpNative['lang']['finnish']['title'].'</a></h1>'
				  .''.$phpNative['lang']['finnish']['content'].'<br /><br /></div><div class="clear"> </div>';	  
				  
				  
			
				  
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

echo "";

}

} 

break;

}
mysql_close($link);
?>


</div>
<div style="clear:both;"> </div>
