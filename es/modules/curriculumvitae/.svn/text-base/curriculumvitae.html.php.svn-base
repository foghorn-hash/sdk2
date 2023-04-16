<?php 

/**
 * Teknologiaplaneetta - Enterprise Solution
 *
 * LICENSE: Open Source (GNU GPL)
 *
 * @copyright  2006-2008 Teknologiaplaneetta
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL
 * @version    $Id$ 1.0.0
 * @link       http://www.teknologiaplaneetta.com
 */ 
 
checkallscript ();
echo '<div align="left">'; 
if (!isset($_GET['task'])) {$_GET['task'] = "default";}
switch ($_GET['task']) {

default:
starttabpane('cvpane1');
starttabpage($lang['_info']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_info WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);
  $nr = count($result);
 $i = 1; 
 if ($nr > 0) { echo "<form name=\"updateform-info\" method=\"post\" "
 ."action=\"?task=updateinfo&amp;id="
 .$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
 .$_GET['layout']."&amp;lang=".$_GET['lang']
 ."\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" "
 ."class=\"list-table\"><thead><tr><td>";
checkallbox();
echo "</td>\n<td>".$lang['_value']."</td>\n<td>".$lang['_orderid']
."</td>\n<td width=\"100%\" align=\"right\"><input "
."name=\"submit\" type=\"submit\" value=\""
.$lang['_update']."\" class=\"button\" /></td>\n</tr></thead><tbody>"; 
$a = 0;
 $b = $nr;
 while( $a < $b )
   {
       echo "\n"
	   . "<tr>"
       . "<td valign=\"top\">"
	   ."<input name=\"$i\" type=\"checkbox\" />"
	   ."</td><td>"
	   ."<textarea name=\"c".$i."\" cols=\"60\" rows=\"8\">"
	   .$result[$a]['content']."</textarea>"
	   ."</td>\n<td valign=\"top\">"
	   ."<input name=\"i".$i."\" type=\"text\" id=\"infoi"
	   .$i."\" value=\""
	   .$result[$a]['order_id']."\" "
	   ."size=\"4\" />"
	   ."<input name=\"del".$i."\" type=\"hidden\" value=\""
	   .$result[$a]['iid']."\" />"
	   ."<input name=\"p".$i."\" type=\"hidden\" value=\""
	   .$result[$a]['iid']."\" />\n</td>"
	   
   . "<td valign=\"top\"><script type=\"text/javascript\">"
." document.getElementById(\"infoi".$i."\").value = \"$i\";"
." </script></td>\n\n"

	   . "</tr>"
       .  "\n\n<!-- INFO $i -->\n";
	   $i++;
	   $a++;
   }
   
     echo "</tbody></table>\n\n"

  ."</form>\n\n\n"; }

echo "\n\n<form name=\"adminform\" method=\"post\" action=\""
."?task="
."addnewinfo&amp;id=0&amp;xid=0&amp;subtask=default&amp;"
."yid=0&amp;zid=0&amp;layout="
.$_GET['layout']."&amp;lang="
.$_GET['lang']."\"><table class=\"list-table\" border=\"0\" "
."cellspacing=\"0\" cellpadding=\"0\">"; 

echo "\n<thead><tr>\n<td><input name=\"aa1\" type=\"checkbox\" "
."disabled /></td><td>"
.$lang['_value']."</td><td>".$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\"".$lang['_new']
."\" class=\"button\" /></td></tr></thead><tbody>\n"; 
echo "\n<tr>\n<td valign=\"top\"><input name=\"aa2\" "
."type=\"checkbox\" disabled /></td>"
."\n<td><textarea name=\"info\" cols=\"60\" rows=\"8\"></textarea>"
."</td><td valign=\"top\"><input name=\"order_id\" type=\"text\" "
."value=\"$i\" size=\"4\" /></td><td valign=\"bottom\">"
."\n</td></tr>"
."</tbody></table>\n</form>\n"; 

endtabpage();
starttabpage($lang['_personal_data']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_personaldata WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);
  $nr = count($result);

$i = 1;
if ($nr > 0) { echo "<form name=\"updateform-pd\" method=\"post\" "
."action=\"?task=updatepd&amp;id="
.$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
.$_GET['layout']."&amp;lang=".$_GET['lang']
."\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" "
."class=\"list-table\"><thead><tr><td>"; 
			checkallbox();
			echo "</td><td>".$lang['_title']."</td><td>".$lang['_value']."</td><td>"
			.$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
			."<input name=\"submit\" type=\"submit\" value=\"".$lang['_update']
			."\" class=\"button\" /></td></tr></thead><tbody>";

$a = 0;
$b = $nr;

  while( $a < $b )
   {
       echo "\n"
       . "<tr>"
  ."<td><input name=\"$i\" type=\"checkbox\" /></td>"
  ."<td><span style=\"display: none;\">"
  .$result[$a]['title']."</span>"
  ."<input name=\"t".$i."\" type=\"text\" value=\""
  .$result[$a]['title']."\" /></td>"
  ."<td><span style=\"display: none;\">"
  .$result[$a]['content']."</span>"
  ."<input name=\"c".$i."\" type=\"text\" value=\""
  .$result[$a]['content']."\" /></td>"
  ."<td><span style=\"display: none;\">"
  .$result[$a]['order_id']."</span>"
  ."<input name=\"i".$i."\" id=\"pdi".$i."\" type=\"text\" value=\""
  .$result[$a]['order_id']."\" size=\"4\" />"
  ."<input name=\"del".$i."\" type=\"hidden\" value=\""
  .$result[$a]['pdid']."\" />"
  ."<input name=\"p".$i."\" type=\"hidden\" value=\""
  .$result[$a]['pdid']."\" />\n</td>"
  ."<td valign=\"top\"><script type=\"text/javascript\">"
  ." document.getElementById(\"pdi"
  .$i."\").value = \"$i\";"
  ."</script></td>\n</tr>\n" 
     ."\n<!-- PERSONALDATA $i -->\n\n"; 
	 
	   $i++;
	   $a++;
   }
  echo "</tbody></table>\n\n";

  echo "</form>\n\n\n"; }
  
echo "\n\n<form name=\"adminform\" method=\"post\" action=\""
."?task=addnewpd&amp;id"
."=0&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
.$_GET['layout']."&amp;lang="
.$_GET['lang']."\"><table border=\"0\" cellspacing=\"0\" "
."cellpadding=\"0\" class=\"list-table\">"; 

echo "\n<thead><tr>\n<td><input name=\"aa1\" "
."type=\"checkbox\" disabled /></td><td>"
.$lang['_title']."</td><td>".$lang['_value']."</td><td>".$lang['_orderid']
."</td><td width=\"100%\" align=\"right\"><input "
."name=\"submit\" type=\"submit\" value=\""
.$lang['_new']."\" class=\"button\" /></td></tr></thead>\n"; 

echo "\n<tbody><tr>\n<td><input name=\"aa2\" "
."type=\"checkbox\" disabled />"
."</td><td>"
."\n<input name=\"pdtitle\" type=\"text\" /></td><td>"
."<input name=\"pdvalue\" "
."type=\"text\" /></td><td><input name=\"order_id\" "
."type=\"text\" value=\"$i\" "
."size=\"4\" /></td><td>"
."\n</td></tr>"
."</tbody></table>\n</form>\n";

endtabpage();
starttabpage($lang['_knowledge_and_skills']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_skills WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);
  $nr = count($result);
 $i = 1; 
 $iii = 10;
 if ($nr > 0) { echo "\n\n<form name=\"adminform\" "
 ."method=\"post\" action=\""
 ."?task=updateskills&amp;id="
 .$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
 .$_GET['layout']."&amp;lang=".$_GET['lang']."\">\n";
  starttabpane('skills');
  
  $a = 0;
  $b = $nr;
  
  while( $a < $b )
   {
startsubtabpage($i);	   
echo "\n<table class=\"list-table\" border=\"0\" "
."cellspacing=\"0\" "
."cellpadding=\"0\">\n<thead><tr>\n<td>";
$iii += 20;
if ($i == 1) {
checkallbox(); } else { echo "<input name=\"aa2\" "
."type=\"checkbox\" disabled />"; };
echo "</td><td>".$lang['_title']." "
."<input name=\"t".$i."\" type=\"text\" value=\""
.$result[$a]['title']
."\" size=\"20\" /> "
.$lang['_yexp']." <input name=\"y".$i."\" type=\"text\" value=\""
.$result[$a]['years']."\" size=\"4\" />"
."</td><td>"
.$lang['_orderid']."</td>"
."<td width=\"100%\" align=\"right\"><input "
."name=\"submit\" type=\"submit\" value=\""
.$lang['_update']."\" class=\"button\" /></td></tr></thead><tbody>\n";
echo "\n<tr>\n<td valign=\"top\"><input name=\"$i\" "
."type=\"checkbox\" /></td>"
."\n<td>".$lang['_knowledge_and_skills']."<br />"
."<textarea name=\"c".$i."\" cols=\"60\" rows=\"4\">"
.$result[$a]['content']."</textarea><br />"
.$lang['_descrition']
."<br /><textarea name=\"d".$i."\" cols=\"60\" rows=\"4\">"
.$result[$a]['description']."</textarea></td>"
."<td valign=\"top\"><input name=\"i".$i."\" id=\"ski"
.$i."\" type=\"text\" value=\""
.$result[$a]['order_id']."\" size=\"4\" />"
."<input name=\"del".$i."\" type=\"hidden\" value=\""
.$result[$a]['sid']."\" />"
."<input name=\"p".$i."\" type=\"hidden\" value=\""
.$result[$a]['sid']."\" />"
."<script type=\"text/javascript\"> "
."document.getElementById(\"ski".$i."\").value = \"$i\"; "
."</script></td>"

 . "<td rowspan=\"$nr\" valign=\"top\"></td>\n</tr>\n"

 
       . "</tbody></table><!-- SKILLSDATA $i -->\n";
	   

  $i++;
  $a++;
  
  endsubtabpage();
   }
  endtabpane();
 echo "</form>\n"; }
 
  echo "\n\n<form name=\"adminform\" method=\"post\" action=\""
  ."?task=addnewskill&amp;id="
  ."0&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
  .$_GET['layout']
  ."&amp;lang=".$_GET['lang']."\"><table class=\"list-table\" border=\"0\" "
  ."cellspacing=\"0\" cellpadding=\"0\">"; 
echo "\n<thead><tr>\n<td><input name=\"aa1\" type=\"checkbox\" disabled /></td><td>"
.$lang['_title']." <input name=\"title\" type=\"text\"  size=\"20\" /> "
.$lang['_yexp']." <input name=\"exp\" type=\"text\" value=\"1\" size=\"4\" /></td><td>"
.$lang['_orderid']."</td><td width=\"100%\" align=\"right\"><input name=\"submit\" "
."type=\"submit\" value=\""
.$lang['_new']."\" class=\"button\" /></td></tr></thead><tbody>\n";
echo "\n<tr>\n<td valign=\"top\"><input name=\"aa2\" type=\"checkbox\" "
."disabled /></td>"
."\n<td>".$lang['_knowledge_and_skills']
."<br /><textarea name=\"skills\" cols=\"60\" rows=\"4\">"
."</textarea><br />"
.$lang['_descrition']."<br /><textarea name=\"desc\" cols=\"60\" rows=\"4\">"
."</textarea>"
."</td><td valign=\"top\"><input name=\"order_id\" "
."type=\"text\" value=\"$i\" size=\"4\" />"
."</td><td valign=\"bottom\">"
."\n</td></tr></tbody>"
."</table>\n</form>\n"; 

endtabpage();
starttabpage($lang['_recommendations']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_recommendations WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);

  $nr = count($result);
 $i = 1; 
 $iii = 10;
 if ($nr > 0) { echo "\n\n<form name=\"adminform\" method=\"post\" "
 ."action=\"?task=updatereco&amp;id="
 .$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
 .$_GET['layout']."&amp;lang=".$_GET['lang']."\">\n";
  starttabpane('reco');
  $a = 0;
  $b = $nr;
  while( $a < $b )
   {
startsubtabpage($i);	   
echo "\n<table class=\"list-table\" border=\"0\""
." cellspacing=\"0\" cellpadding=\"0\">\n<thead><tr>\n<td>";
$iii += 20;
if ($i == 1) {
checkallbox(); } else { 
echo "<input name=\"aa2\" type=\"checkbox\" disabled />"; };
echo "</td><td>".$lang['_title']." "
."<input name=\"t".$i."\" type=\"text\" value=\""
.$result[$a]['title']."\" size=\"20\" /></td>"
."<td>".$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\""
.$lang['_update']."\" class=\"button\" />"
."</td></tr></thead><tbody>\n";
echo "\n<tr>\n<td valign=\"top\">"
."<input name=\"$i\" type=\"checkbox\" /></td>"
."\n<td>".$lang['_value']."<br />"
."<textarea name=\"c".$i."\" cols=\"60\" rows=\"4\">"
.$result[$a]['content']."</textarea><br />".$lang['_contact']."<br />"
."<input name=\"cont".$i."\" type=\"text\"  size=\"40\" "
."value=\"".$result[$a]['contact']."\" /></td>"
."<td valign=\"top\">"
."<input name=\"i".$i."\" id=\"recoi".$i."\" "
."type=\"text\" value=\"".$result[$a]['order_id']."\" size=\"4\" />"
."<input name=\"del".$i."\" type=\"hidden\" value=\""
.$result[$a]['rid']."\" />"
."<input name=\"p".$i."\" type=\"hidden\" value=\""
.$result[$a]['rid']."\" /></td>"

 ."<td rowspan=\"$nr\" valign=\"top\">"
 ."<script type=\"text/javascript\">"
." document.getElementById(\"recoi".$i."\").value = \"$i\";"
." </script>"
  ."</td>\n</tr>\n" 

       . "</tbody></table><!-- RECODATA $i -->\n";
	   

  $i++;
  $a++;
  endsubtabpage();
   }
  endtabpane();
  echo "</form>\n"; }
     echo "\n\n<form name=\"adminform\" method=\"post\" "
	 ."action=\"?"
	 ."task=addnewreco&amp;id="
	 ."0&amp;xid=0&amp;subtask=default&amp;yid=0&amp;"
	 ."zid=0&amp;layout="
	 .$_GET['layout']."&amp;lang=".$_GET['lang']
	 ."\"><table class=\"list-table\" border=\"0\" cellspacing=\"0\" "
	 ."cellpadding=\"0\">"; 
echo "\n<thead><tr>\n<td><input name=\"aa1\" type=\"checkbox\" "
."disabled /></td><td>"
.$lang['_title']." <input name=\"title\" type=\"text\"  size=\"20\" /></td><td>"
.$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\""
.$lang['_new']."\" class=\"button\" /></td></tr></thead><tbody>\n";
echo "\n<tr>\n<td valign=\"top\"><input name=\"aa2\" "
."type=\"checkbox\" disabled /></td>"
."\n<td>".$lang['_value']."<br /><textarea name=\"content\" "
."cols=\"60\" rows=\"4\"></textarea><br />"
.$lang['_contact']."<br /><input name=\"contact\" type=\"text\"  "
."size=\"40\" /></td>"
."<td valign=\"top\"><input name=\"order_id\" type=\"text\" "
."value=\"$i\" size=\"4\" />"
."</td><td valign=\"bottom\">"
."\n</td></tr></tbody>"
."</table>\n</form>\n"; 

endtabpage();
starttabpage($lang['_education']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_edu WHERE lang = 
:lang AND user_id = 
:my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);

  $nr = count($result);
		$i = 1;
if ($nr > 0) {		
echo "<form name=\"updateform-pd\" method=\"post\" action=\""
."?task=updateedu&amp;id="
.$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
.$_GET['layout']
."&amp;lang=".$_GET['lang']."\"><table border=\"0\" "
."cellspacing=\"0\" cellpadding=\"0\" "
."class=\"list-table\"><thead><tr>\n<td>";
checkallbox();
echo "</td><td>".$lang['_degree']."</td><td>".$lang['_school']."</td><td>".$lang['_years']
."</td><td>"
.$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\"".$lang['_update']
."\" class=\"button\" /></td></tr></thead><tbody>"; 
	$a = 0;
	$b = $nr;
	while( $a < $b )
   {

	   

     echo "<!-- EDU $i -->\n"

. "\n\n"; 

 

echo "\n\n<tr><td><input name=\"$i\" type=\"checkbox\" />"
."</td><td><span style=\"display: none;\">"
.$result[$a]['edname']."</span>"
."\n<input name=\"e".$i."\" type=\"text\" size=\"30\" "
."value=\"".$result[$a]['edname']."\"/></td><td>"
."<span style=\"display: none;\">".$result[$a]['edplace']
."</span>"
."<input name=\"pp".$i."\" type=\"text\" size=\"30\" value=\""
.$result[$a]['edplace']."\"/></td><td>"
."<span style=\"display: none;\">".$result[$a]['edyear']
."</span>"
."<input name=\"year".$i."\" type=\"text\" size=\"8\" value=\""
.$result[$a]['edyear']."\" /></td>"
."<td><span style=\"display: none;\">"
.$result[$a]['order_id']."</span><input name=\"del".$i."\" "
."type=\"hidden\" value=\"".$result[$a]['edid']."\" />"
."<input name=\"p".$i."\" type=\"hidden\" value=\""
.$result[$a]['edid']."\" />"
."<input name=\"i".$i."\" id=\"edui".$i."\" type=\"text\" value=\""
.$result[$a]['order_id']."\" size=\"4\" /></td>"
."<td><script type=\"text/javascript\">"
." document.getElementById(\"edui".$i."\").value = \"$i\"; "
."</script>"
."\n</td></tr>";

	$i++;
	$a++;
	
   }
  echo "</tbody></table>\n</form>\n";
  
 }

echo "\n\n<form name=\"adminform\" method=\"post\" action=\""
."?task="
."addnewedu&amp;id=0&amp;xid=0&amp;subtask=default&amp;"
."yid=0&amp;zid=0&amp;layout=".$_GET['layout']
."&amp;lang="
.$_GET['lang']."\"><table border=\"0\" cellspacing=\"0\" "
."cellpadding=\"0\" class=\"list-table\">"; 

echo "\n<thead><tr>\n<td><input "
."name=\"aa1\" type=\"checkbox\" "
."disabled /></td><td>"
.$lang['_degree']."</td><td>".$lang['_school']."</td><td>"
.$lang['_years']."</td><td>".$lang['_orderid']
."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\""
.$lang['_new']."\" class=\"button\" /></td></tr></thead>\n"; 

echo "\n<tbody><tr>\n<td><input name=\"aa2\" type=\"checkbox\" disabled /></td>"
."<td>"."\n<input name=\"degree\" type=\"text\" size=\"30\" /></td>"
."<td><input name=\"school\" type=\"text\" size=\"30\" /></td><td>"
."<input name=\"years\" type=\"text\" size=\"8\"/></td><td>"
."<input name=\"order_id\" type=\"text\" value=\"$i\" size=\"4\" /></td><td>"
."\n</td></tr>"
."</tbody></table>\n</form>\n";


endtabpage();
starttabpage($lang['_extra_courses']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_courses WHERE lang = 
:lang AND user_id = 
:my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);

  $nr = count($result);
		$i = 1;
if ($nr > 0) {		
echo "<form name=\"updateform-pd\" method=\"post\" "
."action=\"?task=updateec&amp;id="
.$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
.$_GET['layout']."&amp;lang=".$_GET['lang']
."\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\""
." class=\"list-table\"><thead><tr>\n<td>";
checkallbox();
echo "</td><td>".$lang['_course']."</td><td>"
.$lang['_school']."</td><td>"
.$lang['_year']."</td><td>".$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\"".$lang['_update']
."\" class=\"button\" /></td></tr></thead><tbody>"; 
$a = 0;
$b = $nr;
	while( $a < $b )
   {
     echo "<!-- cour $i -->\n"

. "\n\n"; 

 

echo "\n\n<tr><td><input name=\"$i\" type=\"checkbox\" /></td>"
."<td><span style=\"display: none;\">".$result[$a]['cname']."</span>"
."\n<input name=\"e".$i."\" type=\"text\" size=\"30\" value=\""
.$result[$a]['cname']."\"/></td><td><span style=\"display: none;\">"
.$result[$a]['sname']."</span>"
."<input name=\"pp".$i."\" type=\"text\" size=\"30\" value=\""
.$result[$a]['sname']."\"/></td><td><span style=\"display: none;\">"
.$result[$a]['year']."</span>"
."<input name=\"year".$i."\" type=\"text\" size=\"8\" value=\""
.$result[$a]['year']."\" /></td>"
."<td><span style=\"display: none;\">"
.$result[$a]['order_id'].""
."</span><input name=\"del".$i."\" type=\"hidden\" value=\""
.$result[$a]['cid']."\" />"
."<input name=\"p".$i."\" "
."type=\"hidden\" value=\"".$result[$a]['cid']."\" />"
."<input name=\"i".$i."\" id=\"eci".$i."\" type=\"text\" "
."value=\"".$result[$a]['order_id']."\" size=\"4\" /></td>"
."<td><script type=\"text/javascript\"> "
."document.getElementById(\"eci".$i."\").value = \"$i\";"
." </script>"
."\n</td>\n</tr>";

	$i++;
	$a++;
	
   }
  echo "</tbody></table>\n</form>\n";
  

}
 
					
					
echo "\n\n<form name=\"adminform\" method=\"post\""
." action=\"?task="
."addnewcour&amp;id=0&amp;xid=0&amp;subtask=default"
."&amp;yid=0&amp;zid=0&amp;layout="
.$_GET['layout']."&amp;lang="
.$_GET['lang']."\"><table border=\"0\" "
."cellspacing=\"0\" cellpadding=\"0\" class=\"list-table\">"; 

echo "\n<thead><tr>\n<td><input name=\"aa1\" type=\"checkbox\" "
."disabled /></td><td>"
.$lang['_course']."</td><td>".$lang['_school']."</td><td>".$lang['_year']."</td><td>"
.$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\""
.$lang['_new']."\" class=\"button\" /></td></tr></thead>\n"; 

echo "\n<tbody><tr>\n<td><input name=\"aa2\" type=\"checkbox\" disabled /></td><td>"
."\n<input name=\"degree\" type=\"text\" size=\"30\" /></td><td>"
."<input name=\"school\" type=\"text\" size=\"30\" /></td><td><input "
."name=\"years\" type=\"text\" size=\"8\"/></td><td><input name=\"order_id\" "
."type=\"text\" value=\"$i\" size=\"4\" /></td><td>"
."\n</td></tr>"
."</tbody></table>\n</form>\n";

endtabpage();
starttabpage($lang['_hobbies']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_hobbies WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);

  $nr = count($result);
 $i = 1; 
 if ($nr > 0) { echo "<form name=\"updateform-hop\" method=\"post\" "
 ."action=\"?task=updatehob&amp;id="
 .$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
 .$_GET['layout']."&amp;lang=".$_GET['lang']
 ."\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" "
 ."class=\"list-table\"><thead><tr><td>";
checkallbox();
echo "</td>\n<td>".$lang['_value']."</td>\n<td>".$lang['_orderid']
."</td>\n<td width=\"100%\" align=\"right\"><input "
."name=\"submit\" type=\"submit\" value=\""
.$lang['_update']."\" class=\"button\" /></td>\n</tr></thead><tbody>"; $a = 0;
 $b = $nr;
 while( $a < $b )
   {

       echo "\n"
	   . "<tr>"
       . "<td valign=\"top\"><input name=\"$i\" "
	   ."type=\"checkbox\" /></td><td>"
	   ."<textarea name=\"c".$i
	   ."\" cols=\"60\" rows=\"8\">"
	   .$result[$a]['content']
	   ."</textarea></td>\n<td valign=\"top\">"
	   ."<input name=\"i".$i."\" "
	   ."type=\"text\" id=\"hobi".$i
	   ."\" value=\""
.$result[$a]['order_id']."\" size=\"4\" />"
."<input name=\"del".$i."\" type=\"hidden\" value=\""
.$result[$a]['hid']."\" />"
."<input name=\"p".$i."\" type=\"hidden\" value=\""
.$result[$a]['hid']."\" />\n</td>"
	   
   . "<td valign=\"top\"><script type=\"text/javascript\"> "
   ."document.getElementById(\"hobi".$i."\").value = \"$i\"; "
   ."</script></td>\n</tr>\n" 

	   . "</tr>"
       .  "\n\n<!-- HOB $i -->\n";
	   $i++;
	   $a++;
   }
   
     echo "</tbody></table>\n\n"

  ."</form>\n\n\n"; 
 }
   
echo "\n\n<form name=\"adminform\" method=\"post\" "
."action=\"?"
."task=addnewhob&amp;id=0&amp;xid="
."0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
.$_GET['layout']."&amp;lang=".$_GET['lang']
."\"><table class=\"list-table\" border=\"0\" cellspacing=\"0\" "
."cellpadding=\"0\">"
. "\n<thead><tr>\n<td><input name=\"aa1\" type=\"checkbox\" disabled /></td><td>"
.$lang['_value']."</td><td>"
.$lang['_orderid']."</td><td width=\"100%\" align=\"right\"><input name=\"submit\" "
."type=\"submit\" value=\"".$lang['_new']."\" class=\"button\" /></td>"
."</tr></thead><tbody>\n"
. "\n<tr>\n<td valign=\"top\"><input name=\"aa2\" type=\"checkbox\" disabled /></td>"
."\n<td><textarea name=\"hob\" cols=\"60\" rows=\"8\"></textarea></td><td valign=\"top\">"
."<input name=\"order_id\" type=\"text\" value=\"$i\" size=\"4\" /></td>"
."<td valign=\"bottom\">"
."\n</td></tr>"
."</tbody></table>\n</form>\n"; 

endtabpage();
starttabpage($lang['_work_experience']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_workexp WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);

  $nr = count($result);
 $i = 1; 
 $iii = 10;
 if ($nr > 0) { echo "\n\n<form name=\"adminform\" method=\"post\" "
 ."action=\"?task=updateexp&amp;id="
 .$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
 .$_GET['layout']."&amp;lang=".$_GET['lang']."\">\n";
  starttabpane('expe');
  $a = 0;
  $b = $nr;
  while( $a < $b )
   {
startsubtabpage($i);	   
echo "\n<table class=\"list-table\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
."\n<thead><tr>\n<td>";
$iii += 20;
if ($i == 1) {
checkallbox(); } else { echo "<input name=\"aa2\" type=\"checkbox\" disabled />"; };
echo "</td><td>".$lang['_employer']." <input name=\"t"
.$i."\" type=\"text\" value=\"".$result[$a]['wename']."\" size=\"20\" /> "
.$lang['_started']." <input name=\"s".$i."\" type=\"text\" value=\""
.$result[$a]['sdate']."\" size=\"10\" /> "
.$lang['_ended']." <input name=\"e".$i."\" type=\"text\" value=\""
.$result[$a]['edate']."\" size=\"10\" /></td><td>"
.$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\""
.$lang['_update']."\" class=\"button\" /></td></tr></thead><tbody>\n"
. "\n<tr>\n<td valign=\"top\"><input name=\"$i\" type=\"checkbox\" /></td>"
."\n<td>"
.$lang['_descrition']."<br /><textarea name=\"c".$i."\" cols=\"60\" rows=\"4\">"
.$result[$a]['wedes']."</textarea><br />"
.$lang['_emptitle']."<br /><input name=\"ep".$i."\" type=\"text\" value=\""
.$result[$a]['emptype']
."\" size=\"30\" /></td><td valign=\"top\">"
."<input name=\"i".$i."\" type=\"text\" id=\"worki".$i."\" value=\""
.$result[$a]['order_id']."\" size=\"4\" />"
."<input name=\"del".$i."\" type=\"hidden\" value=\""
.$result[$a]['weid']."\" /><input name=\"p"
.$i."\" type=\"hidden\" value=\""
.$result[$a]['weid']."\" /></td>"

 . "<td rowspan=\"$nr\" valign=\"top\">"
 ."<script type=\"text/javascript\"> "
 ."document.getElementById(\"worki".$i."\").value = \"$i\";"
 ." </script>"
  . "</td>\n</tr>\n"

       . "</tbody></table><!-- EXPDATA $i -->\n";
	   

  $i++;
  $a++;
  endsubtabpage();
   }
  endtabpane();
 echo "</form>\n"; }

 echo "\n\n<form name=\"adminform\" method=\"post\" "
 ."action=\"?"
 ."task=addnewexp&amp;id=0&amp;xid=0&amp;subtask="
 ."default&amp;yid=0&amp;zid=0&amp;layout="
 .$_GET['layout']."&amp;lang=".$_GET['lang']
 ."\"><table class=\"list-table\" border=\"0\" "
 ."cellspacing=\"0\" cellpadding=\"0\">" 
 ."\n<thead><tr>\n<td><input name=\"aa1\" type=\"checkbox\" "
 ."disabled /></td><td>".$lang['_employer']." <input name=\"name\" "
 ."type=\"text\" size=\"20\" /> ".$lang['_started']." <input name=\"sd\" "
 ."type=\"text\" size=\"10\" /> ".$lang['_ended']." <input name=\"ed\" "
 ."type=\"text\" size=\"10\" /></td><td>".$lang['_orderid']."</td>"
 ."<td width=\"100%\" align=\"right\"><input name=\"submit\" "
 ."type=\"submit\" value=\"".$lang['_new']."\" class=\"button\" /></td>"
 ."</tr></thead><tbody>\n"
 ."\n<tr>\n<td valign=\"top\"><input name=\"aa2\" "
 ."type=\"checkbox\" disabled /></td>"
 ."\n<td>".$lang['_descrition']."<br /><textarea name=\"des\" "
 ."cols=\"60\" rows=\"4\"></textarea><br />"
 .$lang['_emptitle']."<br /><input name=\"type\" type=\"text\" "
 ."size=\"30\" /></td><td valign=\"top\"><input name=\"order_id\" "
 ."type=\"text\" value=\"$i\" size=\"4\" /></td><td valign=\"bottom\">"
 ."\n</td></tr></tbody>"
 ."</table>\n</form>\n"; 

endtabpage();
starttabpage($lang['_portfolio']);
$result = $db->fetchAll(
"SELECT * FROM ".$db_prefix."_cv_references WHERE lang = 
:lang AND user_id = :my ORDER BY order_id ASC", 
array('lang' => $_GET['lang'], 'my' => $my)
);

  $nr = count($result);
 $i = 1; 
 $iii = 10;
 if ($nr > 0) { echo "\n\n<form name=\"adminform\" method=\"post\" "
 ." action=\"?task=updateref&amp;id="
 .$nr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
 .$_GET['layout']."&amp;lang=".$_GET['lang']."\">\n";
 
  starttabpane('ref');
  $a = 0;
  $b = $nr;
  while( $a < $b )
   {
startsubtabpage($i);	   
echo "\n<table class=\"list-table\" border=\"0\" cellspacing=\"0\" "
."cellpadding=\"0\">\n<thead><tr>\n<td>";
$iii += 20;
if ($i == 1) {
checkallbox(); } else { 
echo "<input name=\"aa2\" type=\"checkbox\" disabled />"; };
echo "</td><td>"
.$lang['_title']." <input name=\"t".$i."\" type=\"text\" value=\""
.$result[$a]['title']."\" size=\"20\" /></td><td>"
.$lang['_orderid']."</td><td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\""
.$lang['_update']."\" class=\"button\" /></td></tr></thead><tbody>\n"
."\n<tr>\n<td valign=\"top\"><input name=\"$i\" "
."type=\"checkbox\" /></td>"
."\n<td>"
.$lang['_descrition']."<br /><textarea name=\"c".$i."\" cols=\"60\" rows=\"4\">"
.$result[$a]['content']."</textarea><br />URL<br />"
."<input name=\"url".$i."\" type=\"text\" value=\""
.$result[$a]['url']."\" size=\"50\" /></td><td valign=\"top\">"
."<input name=\"i".$i."\" id=\"refi"
.$i."\" type=\"text\" value=\""
.$result[$a]['order_id']."\" size=\"4\" /><input name=\"del"
.$i."\" type=\"hidden\" value=\""
.$result[$a]['rid']."\" /><input name=\"p"
.$i."\" type=\"hidden\" value=\""
.$result[$a]['rid']."\" /></td>"

 . "<td rowspan=\"$nr\" valign=\"top\"><script type=\"text/javascript\">"
 ." document.getElementById(\"refi".$i
 ."\").value = \"$i\";"
." </script>"
  . "</td>\n</tr>\n"; 

       echo "</tbody></table><!-- REFDATA $i -->\n";
	   

  $i++;
  $a++;
  endsubtabpage();
   }
  endtabpane();
 echo "</form>\n"; }
 
  echo "\n\n<form name=\"adminform\" method=\"post\" "
  ." action=\"?task=addnewref"
  ."&amp;id=0&amp;xid=0&amp;subtask=default&amp;"
  ."yid=0&amp;zid=0&amp;layout=".$_GET['layout']
  ."&amp;lang=".$_GET['lang']."\"><table class=\"list-table\" "
  ."border=\"0\" cellspacing=\"0\" cellpadding=\"0\">" 
  ."\n<thead><tr>\n<td><input name=\"aa1\" type=\"checkbox\" disabled /></td>"
  ."<td>".$lang['_title']." <input name=\"t\" type=\"text\" size=\"20\" /></td><td>"
  .$lang['_orderid']."</td><td width=\"100%\" align=\"right\"><input name=\"submit\" "
  ."type=\"submit\" value=\"".$lang['_new']."\" class=\"button\" /></td></tr></thead><tbody>\n"
 ."\n<tr>\n<td valign=\"top\"><input name=\"aa2\" type=\"checkbox\" disabled /></td>"
."\n<td>".$lang['_descrition']."<br /><textarea name=\"c\" cols=\"60\" rows=\"4\"></textarea>"
."<br />URL<br /><input name=\"u\" type=\"text\" size=\"30\" /></td>"
."<td valign=\"top\"><input name=\"order_id\" type=\"text\" "
."value=\"$i\" size=\"4\" /></td>\n"
."<td valign=\"bottom\">\n"
."\n</td></tr></tbody>\n"
."</table>\n</form>\n\n"; 


  endtabpage();




  endtabpane();


break;
case 'config':
if (!file_exists($server_path.'modules/curriculumvitae/upload/'.md5($my).'/')) {
mkdir($server_path.'modules/curriculumvitae/upload/'.md5($my).'/', 0777); 
fopen($server_path.'modules/curriculumvitae/upload/'.md5($my).'/index.html', 'w');
fopen($server_path.'modules/curriculumvitae/upload/'.md5($my).'/index.htm', 'w');
}
starttabpane('confpane2');
starttabpage($lang['_config']);

 $i = 1; 
 if ($confignr > 0) { echo "<form name=\"updateform-conf\" method=\"post\" "
 ."action=\"?task=updateconf&amp;id="
 .$confignr."&amp;xid=0&amp;subtask=default&amp;yid=0&amp;zid=0&amp;layout="
 .$_GET['layout']."&amp;lang=".$_GET['lang']."\"><table border=\"0\" "
 ."cellspacing=\"0\" cellpadding=\"0\" class=\"list-table\"><thead><tr><td>";
checkallbox();
echo "</td>\n<td>".$lang['_value']."</td>\n\n<td width=\"100%\" align=\"right\">"
."<input name=\"submit\" type=\"submit\" value=\"".$lang['_update']."\" "
."class=\"button\" /></td>\n</tr></thead><tbody>\n\n"; 
 $a = 0;
 $b = $confignr;
 while( $a < $b )
   {

       echo "\n"
	   . "<tr>\n\n"
       . "<td valign=\"top\"><input name=\"$i\" type=\"checkbox\" />"
	   ."</td>\n\n<td>".$lang['_public'].' ';
	   echo '<select name="pub'.$i.'"><option value="yes"';
	if ($config_var[$a]['public'] == "yes") { echo " selected"; }
	echo '>Yes</option><option value="no"';
	if ($config_var[$a]['public'] == "no") { echo " selected"; }
	echo '>No</option></select>';

$DirPath=$server_path.'modules/curriculumvitae/upload/'.md5($my).'/';

 	echo ' '.$lang['_photo'].' ';
	echo '<select name="pic'.$i.'">';
	echo '<option value="pic">pic.jpg</option>';
	if (($handle=opendir($DirPath)))
{
   while ($node = readdir($handle))
   {
       $nodebase = basename($node);
       if ($nodebase!="." && $nodebase!="..")
       {
           if(is_file($DirPath.$node))
           {
		      if ( stristr( $DirPath.$node, ".jpg") )
                {
               
			   	echo '<option value="'.str_replace('.jpg', '', $node).'"';
	if ($config_var[$a]['pic'] == str_replace('.jpg', '', $node)) { echo " selected"; }
	echo '>'.$node.'</option>';
			   }
            }

       }
   }
}

	
	echo '</select>';
	
	echo "\n\n<br />".$lang['_look']."<br /><textarea name=\"xml".$i."\" cols=\"60\" rows=\"8\">"
	.$config_var[$a]['xml']."</textarea>\n<input name=\"del".$i
	."\" type=\"hidden\" value=\"".$config_var[$a]['cid']."\" /><input name=\"p".$i
	."\" type=\"hidden\" value=\"".$config_var[$a]['cid']."\" />\n</td>";
	   
   echo "<td valign=\"top\"></td>\n</tr>
\n"; 

	   echo "</tr>"
       .  "\n\n<!-- CON $i -->\n";
	   $i++;
	   $a++;
   }
   
     echo "</tbody></table>\n\n"

  ."</form>\n\n\n"; 
?>
<fieldset>
<legend><?php echo $lang['_upload']; ?></legend>
<form enctype="multipart/form-data" method="post" action="">
  <input type="file" class="multi" name="uploader[]"/>
  <input name="submit_upload" type="submit" value="<?php echo $lang['_upload']; ?>" class="button" /> (.jpg)
</form>
</fieldset>
<?php 

if (isset($_POST['submit_upload'])) {

$i = 0;
foreach ($_FILES as $get => $key) {	

	if(is_uploaded_file($_FILES['MF__F_0_'.$i]['tmp_name']))
    {
	


        $dir = $server_path.'modules/curriculumvitae/upload/'.md5($my).'/';
        $name = strtolower(strtr(str_replace(' ','_',$_FILES['MF__F_0_'.$i]['name']), "ƒ≈÷‰Âˆ", "AAOaao"));

        move_uploaded_file($_FILES['MF__F_0_'.$i]['tmp_name'], $dir . $name);		
		 

		 
    }
    else
    {

    }
	

		 $i++;
		 
		 } 

ob_clean();
if(!isset($_GET['page'])) { $_GET['page'] = 1; }
redirect("index/curriculumvitae?task=config");
exit();


}

}
endtabpage();
endtabpane();
break;
}
echo '</div>';
?>
