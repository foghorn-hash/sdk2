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

global $seslay, $config, $url_prefix, $access, $db, $lang, $acl, $role;

 $acl->deny('Administrator');
 $acl->deny('Staff 2');
 $acl->deny('Staff 1');
   
     $sql = $db->quoteInto(
    "SELECT * FROM ".$config->database->dbprefix."_app_auth 
	WHERE app_id = ?",
    1
     );

	 
	 
$result = $db->query($sql);
$rows = $result->fetchAll();



 foreach ($rows as $field_index => $field_name)
   {
      
	$result = $db->fetchRow(
    "SELECT role FROM ".$config->database->dbprefix."_acl WHERE 
	acl_id = :id",
    array('id' => $field_name['user_lvl'])
    );
	
	
	  
    if (count($result) == 1) {
	
	$acl->allow($result['role']);
	
	}
   
  

   } 
   
   
  
   
   $access = $acl->isAllowed($role, null, 'view') ?
     "allowed" : "denied";
	
	if ($access == "denied") { redirect('logout');  die(); }
	
 
require_once 'Zend/Controller/Action.php';

/*
application id
*/
$_GET['appid'] = 1;

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
	{
	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang;
	
	 /* 
	 module is a frontpage
	 */
	 $_GET['module'] = 'frontpage';
     
	 /* 
	 execute include_index() function 
	 that includes right module
	 */
     include_index ();

    }
	
    public function blogAction()
	{
	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang, $acl, $role;
	
	 /* 
	 module is a frontpage
	 */
	 $_GET['module'] = 'blog';
     
	 /* 
	 execute include_index() function 
	 that includes right module
	 */
     include_index ();

    }
	
	 public function galleryAction()
	{
	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang;
	
	 /* 
	 module is a frontpage
	 */
	 $_GET['module'] = 'gallery';
     
	 /* 
	 execute include_index() function 
	 that includes right module
	 */
     include_index ();

    }
	
	
	public function curriculumvitaeAction()
	{
	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang, $links, $my;
	
	 /* 
	 module is a gallery
	 */	
	 $_GET['module'] = 'curriculumvitae';
	 if (!isset($_SESSION['user']['hash'])) 
        { 
		
		}
		
		
	 if (file_exists($config->apppath.'modules/curriculumvitae/lang/'.$_GET['lang'].'.links.php'))
{ include ($config->apppath.'modules/curriculumvitae/lang/'.$_GET['lang'].'.links.php'); }
else { $_GET['lang'] = $default_lang;
include ($config->apppath.'modules/curriculumvitae/lang/'.$default_lang.'.links.php'); }

foreach ($lang as &$value) {
    $value = utf8_encode($value);
}
	 
	 $links = "<a href=\"".str_replace('/es/','/',$url_prefix)."pdf/woodoo-parser.php?lang="
.$_GET['lang']."&amp;id=".$my
."\" target=\"_blank\">".$lang['_view_link']."</a>"
." | <a href=\""
."?lang="
.$_GET['lang']."\">"
.$lang['_curriculum_vitae_link']."</a>"
." | <a href=\""
."?lang="
.$_GET['lang']."&task=config\">".$lang['_config_link']."</a>";
	 
	 /* 
	 execute include_index() function 
	 that includes right module
	 */
     include_index ();
	 


    }
	
	public function doajaxfileuploadAction()
	{


    }
	
	public function ajaxlistAction()
	{
       

    }
	
    public function ajaximageAction()
	{
	
	

    }

    public function ajaxthumbAction()	
	{
	
	   

    }	
	
	public function ajaxuploadAction()	
	{
	
	   

    }	
	
	public function imageEditorAction()
	{
    global $config, $server_uploads_path;
    $server_uploads_path = $config->wwwpath.'uploads/';
    }

	public function getImageAction()
	{
    global $config, $server_uploads_path;
    $server_uploads_path = $config->wwwpath.'uploads/';
    }
	
	public function processImageAction()
	{
    global $config, $server_uploads_path;
    $server_uploads_path = $config->wwwpath.'uploads/';
    }
	
	public function postblogAction()
	{
	
	/*
    This is for update status selected blog
	or delete selected blog
	*/
	
	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang, $my, $username;
	
	/* 
	 module is a blog
	 */	
	$_GET['module'] = 'blog';
	
	# start
	if (isset($_POST['delete'])) {
	
    if ($_GET['action'] == "update") {
	
	settype($_GET['id'],"integer");
	
    $ii = $_GET['id'];
    $ii++;
    $i = 1;
	
       while ($i < $ii) {

       settype($_POST['del'.$i],"integer"); # set post var to int
	   
         if (!isset($_POST[$i])) {$_POST[$i] = "false";}
          
		  if ($_POST[$i] == "on") {
           
		   $db_prefix = $config->database->dbprefix;
           
		   $table = $db_prefix."_content";
            
			$where = $db->quoteInto('id = ?', $_POST['del'
			.$i]);
           
		    $rows_affected = $db->delete($table, $where);

             }
            $i++;
          }

        }
       } # end

        # start
        if (isset($_POST['activate'])) {
		
           if ($_GET['action'] == "update") {
		   
             $ii = $_GET['id'];
             $ii++;
             $i = 1;
			  
              while ($i < $ii) {

                settype($_POST['del'.$i],"integer"); #set post var to int

               if (!isset($_POST[$i])) {$_POST[$i] = "false";}
			   
                if ($_POST[$i] == "on") {

                  $db_prefix = $config->database->dbprefix;
                  
				  $set = array (
                     'public' => '1'
                  );

                  $table = $db_prefix.'_content';

                  $where = $db->quoteInto('`'.$db_prefix
				  .'_content`.`id` = ?', $_POST['del'.$i]);
 
                  $rows_affected = $db->update($table, $set, $where);

                      }
                   $i++;
                  }

                }
           } # end

           # start
           if (isset($_POST['deactivate'])) {
		   
              if ($_GET['action'] == "update") {
			  
			  settype($_GET['id'],"integer");
			  
               $ii = $_GET['id'];
               $ii++;
               $i = 1;
			   
               while ($i < $ii) {

                settype($_POST['del'.$i],"integer");
				
                 if (!isset($_POST[$i])) {$_POST[$i] = "false";}
				 
                  if ($_POST[$i] == "on") {

                  $db_prefix = $config->database->dbprefix;
				  
                    $set = array (
                     'public' => '0'
                    );
					
                    $table = $db_prefix.'_content';
					
                    $where = $db->quoteInto('`'.$db_prefix
					.'_content`.`id` = ?', $_POST['del'.$i]);
 
                    $rows_affected = $db->update($table, $set, $where);

                 }
                $i++;
               }

             }
          } # end

           # start
           if (isset($_POST['editremove'])) {
             
			 if ($_GET['action'] == "update") {               
			   
			   settype($_GET['id'],"integer");
			   
               $ii = $_GET['id'];
               $ii++;
               $i = 1;
               
			   while ($i < $ii) {

               if (!isset($_POST[$i])) {$_POST[$i] = "false";}
               if ($_POST[$i] == "on") {

                settype($_POST['del'.$i],"integer");

                  $db_prefix = $config->database->dbprefix;
				  
                    $set = array (
                       'edit' => '0'
                       );
					   
                    $table = $db_prefix.'_content';
                    
					$where = $db->quoteInto('`'.$db_prefix
					.'_content`.`id` = ?', $_POST['del'.$i]);
 
                  $rows_affected = $db->update($table, $set, $where);

                 }
                $i++;
                  }

                }
               } # end
	
    }
	
}

?>