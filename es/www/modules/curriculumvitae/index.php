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

if (file_exists($config->apppath.'www/modules/curriculumvitae/lang/'.$seslang->value.'.php')) 
{ include ($config->apppath.'www/modules/curriculumvitae/lang/'.$seslang->value.'.php'); }
else { $_GET['lang'] = $config->defaultlang;
include ($config->apppath.'www/modules/curriculumvitae/lang/'.$config->defaultlang.'.php'); }

include ($config->apppath.'www/modules/curriculumvitae/confic.inc.php');

foreach ($lang as &$value) {
    $value = utf8_encode($value);
}

$db_prefix = $config->database->dbprefix;

if (!isset($_GET['uid']) && $only_one_cv == 0) {

$result_conf = $db->fetchAll("SELECT user_id, xml, pic FROM ".
$db_prefix."_cv_config WHERE user_id > :my AND public = :y ORDER BY modified DESC LIMIT 20", 
array('my' => 0, 'y' => 'yes'));

echo '<table width="100%" border="0"><tr><td width="200" '
.'class="prof-1" cellspacing="0" cellpadding="0">'.$lang['name']
.'</td><td cellspacing="0" cellpadding="0" class="prof-2">'.$lang['prof'].'</td></tr>';





					$ci = 1;
					foreach ($result_conf as $field_index => $field_name)
   {
   if (is_int($ci/2)){$color="prof-first";} else {$color="prof-second";} 
   $result = $db->fetchRow("SELECT firstname, lastname FROM ".
$db_prefix."_users WHERE user_id = :my", 
array('my' => $field_name['user_id']));

echo '<tr><td class="'.$color.'"><a href="?uid='.$field_name['user_id'].'&lang='
.$_GET['lang'].'">'.$result['firstname'].' '.$result['lastname'];
     
       echo "</a>"
       .""
       . "<!-- USER ".$ci." -->\n</td><td class=\"".$color."\">"
	   .htmlentities($field_name['xml'], ENT_QUOTES)."</td></tr>";
       $ci++;
   } 

   echo '</table>';

} else {

if ($only_one_cv == 1) { $_GET['uid'] = $only_one_cv_user_id; }

$result_conf = $db->fetchRow("SELECT * FROM ".
$db_prefix."_cv_config WHERE user_id = :my", 
array('my' => $_GET['uid']));
$nr = count($result_conf);

if ($nr != 0) {  

if ($result_conf['public'] != 'no') {

if (!isset($_GET['gallery'])) {

$result1 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_info WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

$result2 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_personaldata WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

$result3 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_skills WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

$result4 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_recommendations WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

$result5 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_edu WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

$result6 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_courses WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

$result7 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_hobbies WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

$result8 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_workexp WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

$result9 = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_references WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $_GET['uid'])
);

?>

<div align="left" style="padding-top:10px; padding-left:10px; clear: both;">
<a href="/pdf/woodoo-parser-public.php?id=<?php echo $_GET['uid'].'&amp;lang='
.$_GET['lang'].''; ?>">PDF</a></div>

         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top">
			
			<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat:no-repeat"><h1 class="display" title="info"><?php echo $lang['_info']; ?></h1>
				 
                  
					<?php  
					$ci = 1;
					foreach ($result1 as $field_index => $field_name)
   {
     $rivi = $field_name['content'];
       echo "\n"
       . "$rivi\n"
       . "<!-- INFO ".$ci." -->\n<br /><br />";
       $ci++;
   }    ?> 
			</div>
			
			<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="pd"><?php echo $lang['_personal_data']; ?></h1>
                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                      <?php
$ci = 1;
  foreach ($result2 as $field_index => $field_name)
   {
    $rivi1 = $field_name['title'];
	$rivi2 = $field_name['content'];
	
       echo "\n"
       . "<tr>
  <td width=\"200\"><strong>$rivi1</strong></td><td>$rivi2</td></tr>
\n"
       . "<!-- PERSONALDATA ".$ci." -->\n";
        $ci++;
   }

	?>
                    </table><br /><br />
			  </div>
			
			<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="sk"><?php echo $lang['_knowledge_and_skills']; ?></h1>

                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                      <?php
$ci = 1;
  foreach ($result3 as $field_index => $field_name)
   {
    
	$rivi1 = $field_name['title'];
	$rivi2 = $field_name['content'];
	   
       echo "\n"
       . "<tr>
  <td width=\"200\" valign=\"top\"><strong>$rivi1</strong></td><td valign=\"top\">$rivi2</td></tr>
\n"
       . "<!-- SKILLSDATA ".$ci." -->\n";
       $ci++;
   }

	?>
                    </table><br /><br />
								</div>
			
			<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="re"><?php echo $lang['_recommendations']; ?></h1>

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top"><?php
$ci = 1;
  
  foreach ($result4 as $field_index => $field_name)
   {
    
	$rivi1 = $field_name['title'];
	$rivi2 = $field_name['content'];
	$rivi3 = $field_name['contact'];
	
       echo "\n"
       . "<strong>$rivi1</strong><br /><br />$rivi2<br /><br /><strong>$rivi3</strong><br /><br />\n"
       . "<!-- RECOM ".$ci." -->\n";
       $ci++;
   }

	?>
                        </td>
                      </tr>
                    </table>
					<br /><br />
			</div>
			
			<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="ed"><?php echo $lang['_education']; ?></h1>
			                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><strong><?php echo $lang['_degree']; ?></strong> </td>
                        <td><div align="right"><strong><?php echo $lang['_years']; ?></strong></div></td>
                      </tr>
                      <?php

		$ci = 1;
		
  foreach ($result5 as $field_index => $field_name)
   {
    
	$rivi1 = $field_name['edname'];
	$rivi2 = $field_name['edplace'];
	$rivi3 = $field_name['edyear'];

     echo "<!-- EDU $ci -->\n"
	. "<tr>\n" 
	."<td>$rivi1 ($rivi2)</td>"
	."<td><div align=\"right\">$rivi3</div></td>"
    ."</tr>\n";
	$ci++;
   }
   
   ?>
                    </table><br /><br />
								</div>
			
			<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="ex"><?php echo $lang['_extra_courses']; ?></h1>
				
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><strong><?php echo $lang['_course']; ?></strong> </td>
                        <td><div align="right"><strong><?php echo $lang['_year']; ?></strong></div></td>
                      </tr>
                      <?php

		$ci = 1;
  foreach ($result6 as $field_index => $field_name)
   {
    
	$rivi1 = $field_name['cname'];
	$rivi2 = $field_name['sname'];
	$rivi3 = $field_name['year'];
     echo "<!-- Course $ci -->\n"
	. "<tr>\n" 
	."<td>$rivi1 ($rivi2)</td>"
	."<td><div align=\"right\">$rivi3</div></td>"
    ."</tr>\n";
	$ci++;
   }
   
   ?>
                    </table><br /><br />
								</div>
								<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="hop"><?php echo $lang['_hobbies']; ?></h1>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top"><?php 
			$ci = 1;
 
 foreach ($result7 as $field_index => $field_name)
   {
    
	$rivi1 = $field_name['content'];
	
       echo "\n"
       . "$rivi1<br /><br />\n"
       . "<!-- HOBBIES ".$ci." -->\n";
       $ci++;
   }    ?>
                        </td>
                      </tr>
                    </table>
					<br /><br />
					</div>
			<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="exp"><?php echo $lang['_work_experience']; ?></h1>

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <?php 
  $ci = 1;
  
 foreach ($result8 as $field_index => $field_name)
   {
    
	$rivi1 = $field_name['wename'];
	$rivi2 = $field_name['wedes'];
	$rivi3 = $field_name['emptype'];
	$rivi4 = $field_name['sdate'];
	$rivi5 = $field_name['edate'];
   

       echo "<tr>\n"
       . "<td valign=\"top\"><b class=\"contenttext\">$rivi1 ($rivi3)</strong><br /><span class=\"contenttext\">$rivi4-$rivi5</span></td>\n"
	   . "</tr>\n"
	   . "<tr>\n"
       . "<td valign=\"top\"><span class=\"contenttext\">$rivi2</span><br /><br /></td>\n"
       . "</tr>\n"
       . "<!-- EXP ".$ci." -->\n";
       $ci = 1;
   }
	
	?>
                    </table>	
					<br /><br />		
					</div>
			
			<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat: no-repeat;"><h1 class="display" title="ref"><?php echo $lang['_portfolio']; ?></h1>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top"><?php
 $ci = 1;
 
 foreach ($result9 as $field_index => $field_name)
   {
    
	$rivi1 = $field_name['title'];
	$rivi2 = $field_name['content'];
	$rivi3 = $field_name['url'];

       echo "\n"
       . "<strong>$rivi1</strong><br />$rivi2<br /><a href=\"$rivi3\" target=\"_blank\"><strong>$rivi3</strong></a><br /><br />\n"
       . "<!-- REF ".$ci." -->\n";
 $ci++;

   }
   
	?>
                        </td>
                      </tr>
                    </table><br /><br />

	</div>
			
			</td>
          </tr>
        </table>
							
<?php 

}



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



if (isset($_GET['f'])) {
ob_clean();
if (isset($_GET['f'])) {
$f = $_GET['f'];

if (!isset($_GET['option'])) {
 
} else {

$link = mysql_pconnect($config->database->dbhost, $config->database->dbuser, $config->database->dbpasswd);
if (!$link) {
    die(mysql_error());
}

if ($link) {
mysql_select_db($config->database->database);
}
 
 $mysql_result = mysql_query("SELECT folder FROM es_gallery WHERE id = '".$_GET['cat_id']."' LIMIT 1;");

$sql_row = mysql_fetch_array($mysql_result);

if (file_exists($config->wwwpath.'uploads/active/'.$sql_row[0].'_'.$f)) {

 $link = mysql_pconnect($config->database->dbhost, $config->database->dbuser, $config->database->dbpasswd);
if (!$link) {
    die(mysql_error());
}

if ($link) {
mysql_select_db($config->database->database);
}
 
 $mysql_result = mysql_query("SELECT folder FROM es_gallery WHERE id = '".$_GET['cat_id']."' LIMIT 1;");

$sql_row = mysql_fetch_array($mysql_result);

header("Content-type: image/png");
list($width_orig, $height_orig) = getimagesize($config->wwwpath.'uploads/active/'.$sql_row[0].'_'.$f);

// $height = $height_orig * 0.5;
// $width = $width_orig * 0.5;

$x1 = 0;
$y1 = 0;
$x2 = 100;
$y2 = 80;
$height = 100;
$width = 80;

$image_t = imagecreatetruecolor($width, $height);

if (stristr($_GET['f'], '.gif')) { $im = @imagecreatefromgif ($config->wwwpath.'uploads/active/'.$sql_row[0].'_'.$f); }
	else if (stristr($_GET['f'], '.png')) { $im = @imagecreatefrompng ($config->wwwpath.'uploads/active/'.$sql_row[0].'_'.$f); }
	else if (stristr($_GET['f'], '.jpg')) { $im = @imagecreatefromjpeg ($config->wwwpath.'uploads/active/'.$sql_row[0].'_'.$f); }

imagecopyresampled($image_t, $im, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// imagecopy($image_t, $im, $x1, $y1, $x1, $y1, $width, $height);

imagepng($image_t);
imagedestroy($image_t); 

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

$_GET['gallery'] = mysql_real_escape_string($_GET['gallery']);

settype($_GET['gallery'], 'string');

$mysql_result = mysql_query("SELECT folder FROM es_gallery WHERE id = '".$_GET['cat_id']."' LIMIT 1;");
$sql_row_old = mysql_fetch_array($mysql_result);

$DirPath=$config->apppath.'modules/gallery/upload/'.$sql_row_old[0].'/';

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
				
				$_GET['gallery'] = mysql_real_escape_string($_GET['gallery']);

                settype($_GET['gallery'], 'string');
				
				$_GET['uid'] = mysql_real_escape_string($_GET['uid']);

settype($_GET['uid'], 'integer');
				
				$link_url = "?uid=".$_GET['uid']."&amp;action=view&amp;f=".$node."&amp;option=thumb&amp;gallery=true&amp;cat_id=".$_GET['cat_id'];
				 
				 if (is_integer($i/2)) { $class = "table-first"; } 		
			 
				 else { $class = "table-second"; }
                  
				  $_GET['cat_id'] = mysql_real_escape_string($_GET['cat_id']);
				  
				  settype($_GET['cat_id'], 'integer');

				  $mysql_result = mysql_query("SELECT text, title FROM es_gallery_data WHERE cat_id = '".$_GET['cat_id']."' AND image = '$node' LIMIT 1;");
				  $sql_row = mysql_fetch_array($mysql_result);
				  
				  $$page .= "\n\n";
				  						  
				  $$page .= ''
				  .''
				  .'<div style="float:left; width: 20%;">'
                   .'<a href="'
				  .'/uploads/active/'
				  .$sql_row_old[0].'_'.$node.'" alt="'.$node.'"'
				  .'" '
				  ."title=\"".$node."\" class=\"thickbox\" rel=\"gallery-plants\">"
			      .'<img src="'.$link_url.'" alt="thumb'
				  .$i.'" width="80" height="100" />'
	              .'</a>'
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

settype($_GET['page'], 'integer');

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
echo "\n".'<a href="?uid='.$_GET['uid'].'&amp;action=view&amp;gallery=true&cat_id='.$_GET['cat_id'].'&amp;page='.$i.'">['.$i.']</a> '."\n";
$i++;
};
}

break;

default:
 
$_GET['uid'] = mysql_real_escape_string($_GET['uid']);

settype($_GET['uid'], 'integer');
 
$sql_query = mysql_query("SELECT * FROM es_gallery WHERE id > 0 AND sub = 0 AND public = 1 AND owner = ".$_GET['uid']." ORDER BY modified_date DESC;");

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
				  
$ses = $_SESSION['lang']['value'];
				  
				  $$page .= "\n\n<div class=\"stretcher\">";
				  if($i>1) {$$page .= '<br />';}
				  $$page .= date($date, strtotime($sql_row['modified_date']))."<h1><a href=\"?uid=".$_GET['uid']."&amp;action=view&amp;gallery=true&amp;cat_id=$sql_row[0]\">".$phpNative['lang'][$ses]['title'].'</a></h1>'
				  .''.$phpNative['lang'][$ses]['content'].'<br /><br /></div><div class="clear"> </div>';	  
				  
				  
			
				  
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

<?php } else { echo '<h1>'.$lang['404'].'</h1>'; } } else { echo '<h1>'.$lang['404'].'</h1>'; } } ?>
