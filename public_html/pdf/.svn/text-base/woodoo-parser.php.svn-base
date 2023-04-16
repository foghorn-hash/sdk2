<?php
/**
 * Teknologiaplaneetta - Enterprise Solution
 *
 * LICENSE: Open Source (GNU GPL)
 *
 * @copyright  2006-2008 Teknologiaplaneetta
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL
 * @version    $Id$ 0.1.4
 * @link       http://www.teknologiaplaneetta.com
 */ 
if (!isset($_GET['lang']) || !isset($_GET['id'])) {die();}
error_reporting (E_ALL);
require_once('../es/config.inc.php');
require_once 'Zend/Config.php';
$config = new Zend_Config($configArray);
$url_prefix = $config->urlprefix;
define($config->security->secretkey, null);
$secretkey = $config->security->secretkey;
function redirect ($redirecturl) {

global $url_prefix;

header ("Location: ".$url_prefix.$redirecturl."");

}
require_once 'Zend/Config/Ini.php';
$ini = new Zend_Config_Ini($config->security->inipath.'es.ini', $config->security->inistatus);
require_once 'Zend/Session.php';
Zend_Session::setOptions($ini->toArray());
require_once 'Zend/Session/Namespace.php';

if ( ! Zend_Session::sessionExists() ) {
Zend_Session::start(); 
Zend_Session::regenerateId(); 
}

$sid =  Zend_Session::getId();
define($sid, null);
$idName = new Zend_Session_Namespace('id');
$idName->hash = $config->security->id;
$idName->lock();
$idSID = new Zend_Session_Namespace('sid');
$idSID->hash = $sid; 
$idSID->lock();
/**
* Session checks!
*/ 
if ($idSID->hash != $sid || $idName->hash != $config->security->id) 
{ 
Zend_Session::destroy(); 
Zend_Session::expireSessionCookie();
ob_clean();
exit();
}
if (!isset($_SESSION['user']['hash'])) 
{ 
Zend_Session::destroy();
Zend_Session::expireSessionCookie();
ob_clean();
redirect ("index.php"); 
exit();
}
$default_lang = $config->defaultlang;
if (file_exists($config->apppath.'languages/'.$_GET['lang'].'.php'))
{ include ($config->apppath.'languages/'.$_GET['lang'].'.php'); }
else { $_GET['lang'] = $default_lang;
include ($config->apppath.'languages/'.$default_lang.'.php'); }

if (file_exists($config->apppath.'modules/curriculumvitae/lang/'.$_GET['lang'].'.php'))
{ include ($config->apppath.'modules/curriculumvitae/lang/'.$_GET['lang'].'.php'); }
else { $_GET['lang'] = $default_lang;
include ($config->apppath.'modules/curriculumvitae/lang/'.$default_lang.'.php'); }

require('mysql_table.php');


class PDF extends PDF_MySQL_Table
{
// No functions
}

$db = $config->database->database;
$user = $config->database->dbuser;
$pass = $config->database->dbpasswd;
$host = $config->database->dbhost;
$db_prefix = $config->database->dbprefix;


//Connect to database
mysql_connect($host,$user,$pass);
mysql_select_db($db);

$_GET['lang'] = mysql_real_escape_string($_GET['lang']);
$_GET['id'] = mysql_real_escape_string($_GET['id']);

settype($_GET['lang'], 'string');
settype($_GET['id'], 'integer');

$sql = mysql_query("SELECT * FROM ".$db_prefix."_cv_config WHERE user_id = '".$_GET['id']."'");
$nr = mysql_num_rows($sql);
if ($nr == 0) {die();}
$sql = mysql_fetch_row($sql);

if (file_exists($config->apppath."modules/curriculumvitae/upload/".md5($_GET['id'])."/".$sql[3].".jpg"))
{ $pic = $config->apppath."modules/curriculumvitae/upload/".md5($_GET['id'])."/".$sql[3].".jpg"; }
else { $pic = $config->apppath."modules/curriculumvitae/upload/pic.jpg"; }

$sql = mysql_query("SELECT firstname, lastname FROM ".$db_prefix."_users WHERE user_id = '".$_GET['id']."'");
$sql = mysql_fetch_row($sql);
$name = utf8_decode($sql[0]).' '.utf8_decode($sql[1]);

$wedes = mysql_query("SELECT * FROM ".$db_prefix."_cv_workexp WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$result4 = mysql_query("SELECT * FROM ".$db_prefix."_cv_skills WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$result5 = mysql_query("SELECT * FROM ".$db_prefix."_cv_hobbies WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$result6 = mysql_query("SELECT * FROM ".$db_prefix."_cv_personaldata WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$result7 = mysql_query("SELECT * FROM ".$db_prefix."_cv_recommendations WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$result8 = mysql_query("SELECT * FROM ".$db_prefix."_cv_references WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$result9 = mysql_query("SELECT * FROM ".$db_prefix."_cv_info WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$pdf=new PDF('P','mm','A4');
$pdf->Open();
$pdf->AddPage();
	//Title
	$pdf->SetFont('Arial','',12);
	$pdf->Ln(5);
	$pdf->Cell(0,6,$lang['_curriculum_vitae'].' - '.$name,0,1,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Ln(2);
$pdf->Cell(40,10,$lang['_personal_data']);
$pdf->Ln(10);
$pdf->SetFont('Arial','',8);

  while( $rivi6 = mysql_fetch_row($result6) )
   {
       $rivi6[0] = stripslashes($rivi6[0]);
       $rivi6[2] = stripslashes($rivi6[2]);
   $pdf->Cell(40,8,utf8_decode($rivi6[1]).": ".utf8_decode($rivi6[2]));
   $pdf->Ln(5);
   }
$pdf->Image($pic, 120, 20, 50, 50);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,$lang['_knowledge_and_skills']);
$pdf->Ln(10);
$pdf->SetFont('Arial','',8);
  while( $rivi4 = mysql_fetch_row($result4) )
   {
       $rivi4[0] = stripslashes($rivi4[0]);
       $rivi4[2] = stripslashes($rivi4[2]);
   $pdf->Write(5,utf8_decode($rivi4[1]).': '.utf8_decode($rivi4[2]));
   $pdf->Ln(5);
   }
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,$lang['_education']);
$pdf->Ln(10);
$pdf->AddCol('edname',100,$lang['_degree'],'L');
$pdf->AddCol('edplace',60,$lang['_school'],'L');
$pdf->AddCol('edyear',20,$lang['_years'],'R');
$pdf->Table("SELECT * FROM ".$db_prefix."_cv_edu WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$pdf->SetFont('Arial','B',12);
$pdf->Ln(5);
$pdf->Cell(40,10,$lang['_extra_courses']);
$pdf->Ln(10);
$pdf->AddCol('cname',100,$lang['_course'],'L');
$pdf->AddCol('sname',60,$lang['_school'],'L');
$pdf->AddCol('year',20,$lang['_year'],'R');
$pdf->Table("SELECT * FROM ".$db_prefix."_cv_courses WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' ORDER BY order_id ASC");
$pdf->SetFont('Arial','B',12);
$pdf->Ln(5);
$pdf->Cell(40,10,$lang['_work_experience']);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(15);
$pdf->Cell(20,10,$lang['_employer']);
$pdf->SetX(65);
$pdf->Cell(20,10,$lang['_emptitle']);
$pdf->SetX(155);
$pdf->Cell(20,10,$lang['_started']);
$pdf->SetX(179);
$pdf->Cell(20,10,$lang['_ended']);

$pdf->Ln(10);
  $ii = 1;
  while( $rivi1 = mysql_fetch_row($wedes) )
   {
       $rivi1[0] = stripslashes($rivi1[0]);
       $rivi1[2] = stripslashes($rivi1[2]);
	   $pdf->AddCol('wename',50,'Employer','L');
       $pdf->AddCol('emptype',90,'Title','L');
       $pdf->AddCol('sdate',20,'Start','L');
       $pdf->AddCol('edate',20,'End','R');
       $pdf->Table("SELECT * FROM ".$db_prefix."_cv_workexp WHERE lang = '".$_GET['lang']."' AND user_id = '".$_GET['id']."' AND weid = ".$rivi1[0]);
	   $pdf->Ln(2);
	   $pdf->SetLeftMargin(15);
       $pdf->Write(4,utf8_decode($rivi1[2]));
	   $pdf->SetLeftMargin(10);
	   $pdf->Ln(8);
	   $ii++;
   }
   $ii = 1;

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,$lang['_recommendations']);
$pdf->Ln(8);
$pdf->SetFont('Arial','B',8);
  while( $rivi7 = mysql_fetch_row($result7) )
   {
       $rivi7[0] = $rivi7[0];
       $rivi7[3] = $rivi7[3];
   $pdf->Cell(40,8,utf8_decode($rivi7[1]));
   $pdf->Ln(10);
   $pdf->SetFont('Arial','',8);
   $pdf->Write(4,"\"".utf8_decode($rivi7[2])."\"");
   $pdf->Ln(5);
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,8,utf8_decode($rivi7[3]));
   $pdf->Ln(8);
   }
$pdf->Ln(5);


$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,$lang['_portfolio']);
$pdf->Ln(10);

  while( $rivi8 = mysql_fetch_row($result8) )
   {
       $rivi8[0] = stripslashes($rivi8[0]);
       $rivi8[3] = stripslashes($rivi8[3]);
       $pdf->SetFont('Arial','B',8);
   $pdf->Cell(40,8,utf8_decode($rivi8[1]));
   $pdf->Ln(6);
   $pdf->SetFont('Arial','',8);
   $pdf->Write(4,utf8_decode($rivi8[2]));
   $pdf->Ln(2);
   $pdf->SetFont('Arial','I',8);
   $pdf->Cell(40,8,utf8_decode($rivi8[3]));
   $pdf->Ln(5);
   }
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,$lang['_hobbies']);
$pdf->Ln(10);
$pdf->SetFont('Arial','',8);
  while( $rivi5 = mysql_fetch_row($result5) )
   {
       $rivi5[0] = stripslashes($rivi5[0]);
       $rivi5[1] = stripslashes($rivi5[1]);
   $pdf->Cell(40,8,utf8_decode($rivi5[1]));
   $pdf->Ln(5);
   }
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,$lang['_info']);
$pdf->Ln(10);
$pdf->SetFont('Arial','',8);
  while( $rivi9 = mysql_fetch_row($result9) )
   {
       $rivi9[0] = stripslashes($rivi9[0]);
       $rivi9[1] = stripslashes($rivi9[1]);
   $pdf->Write(4,utf8_decode($rivi9[1]));
   $pdf->Ln(5);
   }
$pdf->Ln(5);

mysql_close();
ob_clean();
$pdf->SetAuthor($name);
$pdf->Output("Curriculum Vitae - $name - ".ucfirst($_GET['lang']).".pdf","I");

?>
