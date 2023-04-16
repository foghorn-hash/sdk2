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
    2
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
	
	if ($access == "denied") { redirect('error'); die(); }
	
require_once 'Zend/Controller/Action.php';

/*
application id
*/
$_GET['appid'] = 2;

class CmsController extends Zend_Controller_Action
{
    public function indexAction()
	{
	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang, $acl, $role;
	
	 /* 
	 module is a gallery
	 */	
	 $_GET['module'] = 'content';
	 
	 /* 
	 execute include_index() function 
	 that includes right module
	 */
	 
     include_index ();
	 

    }    
	
	public function connectorAction()
	{	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $lang, $my, $username;
	
	}
	
	public function uploadAction()
	{	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $lang, $my, $username;
	
	}
	
	public function contentAction()
	{
	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang, $my, $username;

	 /* 
	 module is a content
	 */		
	$_GET['module'] = 'content';
	
	 /* 
	 execute include_index() function 
	 that includes right module
	 */
     include_index ();

    }
	
	public function announcementsAction()
	{

    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang, $my, $username;
	
	 /* 
	 module is a announcements
	 */	
	  $_GET['module'] = 'announcements';
	
	 /* 
	 execute include_index() function 
	 that includes right module
	 */
     include_index ();

    }


    public function articlesAction()
	{

    /*
    globals
	Links is important for this or otherwise 
	links not appear on link header bar! Can
	not be nowhere else!  
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang, $my, $username, $links;
	
	/* 
	 module is a articles
	 */	
	 $_GET['module'] = 'articles';
	
	/*
	make link header bar links etc. here
	*/
	$links = "<a href=\"?action=cat\">Categories</a>";

	 /* 
	 execute include_index() function 
	 that includes right module
	 */
     include_index ();

    }
	
	
	
	
	public function postannouncementsAction()
	{
	
	/*
    This is for update status selected announcements
	or delete selected announcements
	*/
	
	
    /*
    globals
	*/
	global $seslay, $config, $url_prefix, $access, $db, $lang, $my, $username;
	
	/* 
	 module is a announcements
	 */	
	$_GET['module'] = 'announcements';
	
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
	
	public function postcontentAction()
	{

	global $seslay, $config, $url_prefix, $access, $db, $lang, $my, $username;
	
	$_GET['module'] = 'content';
	
	if (isset($_POST['delete'])) {
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
$table = $db_prefix."_content";
$where = $db->quoteInto('id = ?', $_POST['del'.$i]);
$rows_affected = $db->delete($table, $where);

}
$i++;
}

}
}

if (isset($_POST['od'])) {
if ($_GET['action'] == "update") {

settype($_GET['id'],"integer");
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

settype($_POST['del'.$i],"integer");
if (!isset($_POST[$i])) {$_POST[$i] = "false";}


$db_prefix = $config->database->dbprefix;
$set = array (
    'order_id' => $_POST['order'.$i]
);
$table = $db_prefix.'_content';
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_POST['del'.$i]);
 
$rows_affected = $db->update($table, $set, $where);


$i++;
}

}
}

if (isset($_POST['activate'])) {
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
    'public' => '1'
);
$table = $db_prefix.'_content';
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_POST['del'.$i]);
 
$rows_affected = $db->update($table, $set, $where);

}
$i++;
}

}
}

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
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_POST['del'.$i]);
 
$rows_affected = $db->update($table, $set, $where);

}
$i++;
}

}
}

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
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_POST['del'.$i]);
 
$rows_affected = $db->update($table, $set, $where);

}
$i++;
}

}
}
	
    }
	
	public function postarticlesAction()
	{

	global $seslay, $config, $url_prefix, $access, $db, $lang, $my, $username;
	
	$_GET['module'] = 'articles';
	
	if (isset($_POST['delete'])) {
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
$table = $db_prefix."_content";
$where = $db->quoteInto('id = ?', $_POST['del'.$i]);
$rows_affected = $db->delete($table, $where);

}
$i++;
}

}
}

if (isset($_POST['od'])) {
if ($_GET['action'] == "update") {

settype($_GET['id'],"integer");
$ii = $_GET['id'];
$ii++;
$i = 1;
while ($i < $ii) {

settype($_POST['del'.$i],"integer");
if (!isset($_POST[$i])) {$_POST[$i] = "false";}


$db_prefix = $config->database->dbprefix;
$set = array (
    'order_id' => $_POST['order'.$i]
);
$table = $db_prefix.'_content';
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_POST['del'.$i]);
 
$rows_affected = $db->update($table, $set, $where);


$i++;
}

}
}

if (isset($_POST['activate'])) {
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
    'public' => '1'
);
$table = $db_prefix.'_content';
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_POST['del'.$i]);
 
$rows_affected = $db->update($table, $set, $where);

}
$i++;
}

}
}

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
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_POST['del'.$i]);
 
$rows_affected = $db->update($table, $set, $where);

}
$i++;
}

}
}

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
$where = $db->quoteInto('`'.$db_prefix.'_content`.`id` = ?', $_POST['del'.$i]);
 
$rows_affected = $db->update($table, $set, $where);

}
$i++;
}

}
}
	
    }
	
	
}

?>