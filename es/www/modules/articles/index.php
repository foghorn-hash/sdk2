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

?>


<div align="left">
<?php

if (file_exists($config->apppath.'www/modules/articles/lang/'.$seslang->value.'.php')) 
{ include ($config->apppath.'www/modules/articles/lang/'.$seslang->value.'.php'); }
else { $_GET['lang'] = $config->defaultlang;
include ($config->apppath.'www/modules/articles/lang/'.$config->defaultlang.'.php'); }

foreach ($lang as &$value) {
    $value = utf8_encode($value);
}

$rows = $db->fetchAll(
"SELECT * FROM ".$config->database->dbprefix
."_content WHERE id > :id AND type = :type AND public = :pl AND public_date < NOW() AND sub_of = :sub ORDER BY public_date DESC;", 
array('id' => 0, 'type' => 'articles', 'pl' => 1, 'sub' => $_GET['subpage'])
);


 
 if (!isset($_GET['page'])) {$_GET['page'] = 1;}
 

  $i = 1;
  $ii = 2;
  $b = 1;
  $c = 10;
  
  foreach ($rows as $field_index => $field_name)

   {
   
   $d = $i - $c;  

                 
				 
				 if ($d == -9) { $page = "page".$b; $$page = ""."\n"; }
				 
				
                  
				  if ($b == $_GET['page']) {
				  
				  $phpNative = Zend_Json::decode($field_name['content']);

				  
				 $$page .= "\n\n\n"
				 .'<div class="stretcher" style="background-image: url(\'/images/back2.gif\'); background-position: bottom; background-repeat:no-repeat">'
				 ."<!-- ".$phpNative['lang']['finnish']['title'].''
				 .date($lang['datetime'], strtotime($field_name['public_date']))
				 .' -->'.date($lang['date'], strtotime($field_name['public_date'])).'<br /><br /><a href="/'.$_GET['id'].'-'.$field_name['id'].'-'.$field_name['sub_of'].$sef_suffix.'?lang='.$_SESSION['lang']['value'].'">'.$phpNative['lang']['finnish']['title'].'</a><br />'.$phpNative['lang']['finnish']['content'].'</div>';

   
				  }
							  
				  if (is_integer($i / 10)) { $b++; if ($b != $_GET['page']) {$$page .= "";} $c+=10; }
				  
			
				  
				  $p = $i /10;
   
   

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


<div style="clear:both;"> </div>
<div class="stretcher" style="background-image: url('/images/back2.gif'); background-position: bottom; background-repeat:no-repeat">
<br />
<?php 
if ( $i != 1 ) {
echo "\n &nbsp;".$lang['page'].' ';
$i = 1;

$p = ceil($p);

while ($i <= $p) {
echo "\n".'<a href="/'.$_GET['id'].'-'.$_GET['subpage'].'-Pages'.$sef_suffix.'?lang='.$_SESSION['lang']['value'].'&amp;page='.$i."\"".'>['.$i.']</a> '."\n";
$i++;
};
}

?>
</div>
</div>
<div style="clear:both;"> </div>