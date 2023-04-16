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
 ?>
<style>
<!--
h1 {
color:#008;
}
p {
font-size: 14px;
}
a.about {
color:#040;
font-size: 13px;
}
strong {
color:#800;
}
-->
</style> 

<?php
 echo '<h1>'.$translate->_("about").'</h1><hr />';
 
 
$acl->allow('Administrator');
$access = $acl->isAllowed($role, null, 'view') ?
     "allowed" : "denied";


echo '<center><table width="100%" cellspacing="2" style="border: 1px #cccccc solid;" bgcolor="#ffffff">
<tr><td width="40%" valign="top" bgcolor="#eeeeee" style="padding: 10px;" align="left">';
if ($access == "allowed") { 
echo '<h1 class="about">'.$translate->_("serverinformation").'</h1>

<b style="color:green;">PHP:</b> 
'.phpversion().'
<br />
<b style="color:green;">'.$translate->_("serversoftware").':</b> '.$_SERVER['SERVER_SOFTWARE'].'
</b>';
}
echo '<h1 class="about">'.$translate->_("sourcecode").'</h1>

<p><strong style="color: #800;">jQuery</strong> 
<a href="http://jquery.com/" class="about" target="_blank">http://jquery.com/</a></p>

<p><strong style="color: #800;">FCKeditor</strong> 
<a href="http://www.fckeditor.net/" class="about" target="_blank">http://www.fckeditor.net/</a></p>

<p><strong style="color: #800;">Teknologiaplaneetta Enterprise Solution</strong> 
<a href="http://dev.teknologiaplaneetta.com/confluence/display/TES/" class="about" target="_blank">http://dev.teknologiaplaneetta.com/confluence/display/TES/</a></p>

<p><strong style="color: #800;">FPDF</strong> 
<a href="http://www.fpdf.org" class="about" target="_blank">http://www.fpdf.org/</a></p>

<p><strong style="color: #800;">Some Source Code from Joomla!</strong> 
<a href="http://www.joomla.org" class="about" target="_blank">http://www.joomla.org/</a></p>

</td><td width="60%" bgcolor="#eeeeee" style="padding: 10px;" align="left">
<center>
<br />
<br />
<img src="'.str_replace('/es/','/',$url_prefix).'images/tes-logo.png" alt="logo" />
<br />
<br />
</center>'
."<div align=\"center\">".$translate->_("copyright")."</div>"

."<div align=\"center\"><br /><b style=\"color:red;\">".$translate->_("version")."</b></div>"

.$translate->_("license")

.'<br /><br /><div style="clear: both;"> </div><div align="center"><a href="http://dev.teknologiaplaneetta.com/" target="_blank">
<img src="../images/PoweredBy_TES_DarkWhite.png" border="0">
</a>
<a href="http://framework.zend.com/" target="_blank">
<img src="../images/PoweredBy_ZF_4LightBG.png" border="0">
</a></div></td></tr></table></center>';
 
?>