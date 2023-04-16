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


require_once("Zend/Translate.php");
 
global $db, $config, $url_prefix, $seslay, $seslang;

$username = $_SESSION['user']['hash'];

$result = $db->fetchRow(
    "SELECT firstname, lastname, user_id, username, userlevel 
	FROM ".$config->database->dbprefix."_users 
	WHERE username = :username",
    array('username' => $username)
);

$user = $result['firstname']." "
.$result['lastname'];
define('WHOIS',$user);
$my = $result['user_id'];
$un = $result['username'];

$result = $db->fetchRow(
    "SELECT role FROM ".$config->database->dbprefix."_acl WHERE 
	acl_id = :id",
    array('id' => $result['userlevel'])
);

$role = $result['role']; 

require_once 'Zend/Acl.php';
$acl = new Zend_Acl();
require_once 'Zend/Acl/Role.php';

  $sql = $db->quoteInto(
    "SELECT * FROM ".$config->database->dbprefix."_acl 
	WHERE acl_id > ? ORDER BY order_id DESC",
    0
);

$result = $db->query($sql);
$rows = $result->fetchAll();

 foreach ($rows as $field_index => $field_name)
   {
   if ($field_name['inherit'] != "none") {
    $acl->addRole(new Zend_Acl_Role($field_name['role']), 
	$field_name['inherit']); 
    } else {
    $acl->addRole(new Zend_Acl_Role($field_name['role']));
    }

   }
   
   function fckeditor($data) {

include("editors/fckeditor/fckeditor.php") ;

global $editorAddress;

$oFCKeditor = new FCKeditor('FCKeditor1') ;

$oFCKeditor->Config['SkinPath'] = $editorAddress.'editors/fckeditor/editor/skins/office2003/' ;
	
$oFCKeditor->Config['AutoDetectLanguage']	= false ;
$oFCKeditor->Config['DefaultLanguage']		= $_SESSION['lang']['short'] ;

$oFCKeditor->Value = $data ;
$oFCKeditor->Create() ;
 


}

function fckeditor_noupload($data) {

include("editors/fckeditor/fckeditor.php") ;

global $editorAddress;

$oFCKeditor = new FCKeditor('FCKeditor1') ;

$oFCKeditor->Config['SkinPath'] = $editorAddress.'editors/fckeditor/editor/skins/office2003/' ;
$oFCKeditor->Config['ImageBrowser']	= false ;
$oFCKeditor->Config['ImageUpload']	= false ;
$oFCKeditor->Config['LinkBrowser']	= false ;
$oFCKeditor->Config['AutoDetectLanguage']	= false ;
$oFCKeditor->Config['DefaultLanguage']		= $_SESSION['lang']['short'] ;

$oFCKeditor->Value = $data ;
$oFCKeditor->Create() ;
 


}

function startprototype ($sptype) {
global $url_prefix, $links, $lang;
    if (!isset($links)) { $links = ""; }
	if ($sptype == 1){
	echo "\n <div id=\"container\">
	  <div id=\"header-links\">
	  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"header-td\">
  <tr>
    <td valign=\"middle\">
	  ".$links
	  ."</td>
  </tr>
</table>
	  </div>
      <div id=\"content\">
	\n ";}
}

function endprototype ($eptype) {
if ($eptype == 1){
echo "\n\n</div></div> \n  \n";}
}


function starttabpane ($tbtitle) { 
echo "<div class=\"tab-pane\" id=\""
.$tbtitle."\">\n"; }

function endtabpane () { echo "</div>\n"; }

function starttabpage ($tabpage) {
echo "<div class=\"tab-page\" id=\"$tabpage\">
      <h2 class=\"tab\">".$tabpage."</h2>\n";
}


function endtabpage () { echo "</div>\n"; }

function startsubtabpage ($tabpage) {
echo "<div class=\"tab-page\" style=\"border: "
."0px; padding: 0px; margin: 0px; top: 0px;\">
      <h2 class=\"tab\">".$tabpage."</h2>\n";
}

function endsubtabpage () { echo "</div>\n"; }

function checkallscript () {

echo "\n\n<script language=\"JavaScript\" type=\"text/javascript\"> 
function all(form) { 
\n\n
  for (var i = 1; i < form.elements.length; i++) {    
\n\n
    eval(\"form.elements[\" + i + \"].checked = form.elements[0].checked\");  
\n\n
  } 
\n\n
} \n
</script>\n\n"; 

}

function checkallbox () {
echo "\n<input name=\"aa\" type=\"checkbox\" onClick=\"all(this.form);\" />\n";
}

if (!isset($_GET['module'])) {
$_GET['module'] = 'frontpage';}

if (file_exists($config->apppath.'languages/'.$seslang->value.'.php'))
{ include ($config->apppath.'languages/'.$seslang->value.'.php'); }
else { $seslang->value = $config->defaultlang;
include ($config->apppath.'languages/'.$config->defaultlang.'.php'); }

$rows  = $db->fetchAll(
"SELECT mod_dir FROM ".$config->database->dbprefix."_modules WHERE 
active = :active", array('active' => 1)
);

   foreach ($rows as $field_index => $field_name)
   {
       if (file_exists($config->apppath.'modules/'.$field_name['mod_dir']
	   .'/lang/'.$seslang->value.'.mod.php'))
       { include ($config->apppath.'modules/'.$field_name['mod_dir']
	   .'/lang/'.$seslang->value.'.mod.php'); }
       else { 
       include ($config->apppath.'modules/'.$field_name['mod_dir']
	   .'/lang/'.$config->defaultlang.'.mod.php'); }
	   
	   if (file_exists($config->apppath.'modules/'.$field_name['mod_dir']
	   .'/lang/'.$seslang->value.'.php'))
       { include ($config->apppath.'modules/'.$field_name['mod_dir']
	   .'/lang/'.$seslang->value.'.php'); }
       else { 
       include ($config->apppath.'modules/'.$field_name['mod_dir']
	   .'/lang/'.$config->defaultlang.'.php'); }
	   
   };
   
       if (file_exists($config->apppath.'modules/admin/lang/'
		  .$seslang->value.'.mod.php'))
       { include ($config->apppath.'modules/admin/lang/'.$seslang->value
	   .'.mod.php'); }
       else { 
       include ($config->apppath.'modules/admin/lang/'.$config->defaultlang
	   .'.mod.php'); }
	   
	          if (file_exists($config->apppath.'modules/about/lang/'
		  .$seslang->value.'.mod.php'))
       { include ($config->apppath.'modules/about/lang/'.$seslang->value
	   .'.mod.php'); }
       else { 
       include ($config->apppath.'modules/about/lang/'.$config->defaultlang
	   .'.mod.php'); }
	   
	   	   if (file_exists($config->apppath.'modules/about/lang/'
		  .$seslang->value.'.php'))
       { include ($config->apppath.'modules/about/lang/'.$seslang->value
	   .'.php'); }
       else { 
       include ($config->apppath.'modules/about/lang/'.$config->defaultlang
	   .'.php'); }
	   
	   if (file_exists($config->apppath.'modules/frontpage/lang/'
		  .$seslang->value.'.mod.php'))
       { include ($config->apppath.'modules/frontpage/lang/'.$seslang->value
	   .'.mod.php'); }
       else { 
       include ($config->apppath.'modules/frontpage/lang/'.$config->defaultlang
	   .'.mod.php'); }
	
	  $result = $db->fetchRow(
    "SELECT lang_short FROM ".$config->database->dbprefix."_lang WHERE 
	lang_file = :id",
    array('id' => $seslang->value)
);

$rows = $db->fetchAll(
"SELECT lang_var FROM ".$config->database->dbprefix
."_applications WHERE active = :active", 
array('active' => 1)
);

foreach ($rows as $field_index => $field_name)
   {
       if (file_exists($config->apppath.'languages/applications/'.$field_name['lang_var']
	   .'/'.$seslang->value.'.php'))
       { include ($config->apppath.'languages/applications/'.$field_name['lang_var']
	   .'/'.$seslang->value.'.php'); }
       else { 
       include ($config->apppath.'languages/applications/'.$field_name['lang_var']
	   .'/'.$config->defaultlang.'.php'); }
   };

$ln = $result['lang_short']; 
$_SESSION['lang']['short'] = $ln;

foreach ($lang as &$value) {
    $value = utf8_encode($value);
}

$translate = new Zend_Translate('array', $lang, $ln); 

?>