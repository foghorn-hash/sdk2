<?php 

/**
 * Teknologiaplaneetta Enterprise Solution
 *
 * LICENSE: Open Source (GNU GPL)
 *
 * @copyright  2006-2008 Teknologiaplaneetta
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL
 * @version    $Id$ 0.1.5
 * @link       http://www.teknologiaplaneetta.com/
 */ 
 
 if (isset($_GET['ajaxnews'])) {
 
 ob_clean();
 
   $sql = $db->quoteInto(
    "SELECT * FROM ".$config->database->dbprefix."_frontpage 
	WHERE id > ? ORDER BY time DESC LIMIT 100",
    0
);

$result = $db->query($sql);
$rows = $result->fetchAll();


   if (!isset($_GET['page'])) {$_GET['page'] = 1;}
 

  $i = 1;
  $ii = 2;
  $b = 1;
  $c = 4;
  
  foreach ($rows as $field_index => $field_name)

   {
   
   $d = $i - $c;  

                 
				 
				 if ($d == -3) { $page = "page".$b; $$page = ""."\n"; }			 
				
                  
				  if ($b == $_GET['page']) {	  
				  
				 
				     $$page .= '<b>'.date($lang['datetime'], strtotime($field_name['time']))
					 .'<br /><br />'.$field_name['title'].'</b><br /><br />'
					 .htmlentities($field_name['content'], ENT_QUOTES).'<br /><br />';

   
				   }
							  
				  if (is_integer($i / 4)) { $b++; if ($b != $_GET['page']) {$$page .= "";} $c+=4; }
				  
			
				  
				  $p = $i /4;
   
   

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

exit();
 
 }
 
  $sql = $db->quoteInto(
    "SELECT * FROM ".$config->database->dbprefix."_frontpage 
	WHERE id > ? ORDER BY time DESC LIMIT 100",
    0
);

$result = $db->query($sql);
$rows = $result->fetchAll();



echo '<h1>'.$lang['news'].'</h1><div id="ajaxnews">';

   if (!isset($_GET['page'])) {$_GET['page'] = 1;}
 

  $i = 1;
  $ii = 2;
  $b = 1;
  $c = 4;
  
  foreach ($rows as $field_index => $field_name)

   {
   
   $d = $i - $c;  

                 
				 
				 if ($d == -3) { $page = "page".$b; $$page = ""."\n"; }			 
				
                  
				  if ($b == $_GET['page']) {	  
				  
				 
				     $$page .= '<b>'.date($lang['datetime'], strtotime($field_name['time']))
					 .'<br /><br />'.$field_name['title'].'</b><br /><br />'
					 .htmlentities($field_name['content'], ENT_QUOTES).'<br /><br />';

   
				   }
							  
				  if (is_integer($i / 4)) { $b++; if ($b != $_GET['page']) {$$page .= "";} $c+=4; }
				  
			
				  
				  $p = $i /4;
   
   

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
   
   ?>

</div>
<div style="clear:both;"> </div>

<?php 

if ( $i != 1 ) {
echo "\n &nbsp;".$lang['page'].' ';
$i = 1;

$p = ceil($p);

while ($i <= $p) {
echo "\n".'<a href="#"'.' OnClick="javascript:$(\'#ajaxnews\').load(\'/es/index?ajaxnews=true&page='.$i.'\');">['.$i.']</a> '."\n";
$i++;
};
}

?>
<div style="clear:both;"> </div>