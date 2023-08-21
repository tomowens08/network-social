<div align="center">
<p>
  <?php
    if (@include(getenv('DOCUMENT_ROOT').'/ads/phpadsnew.inc.php')) {
        if (!isset($phpAds_context)) $phpAds_context = array();
        $phpAds_raw = view_raw ('zone:2', 0, '', '', '0', $phpAds_context);
        echo $phpAds_raw['html'];
    }
?>
</p>
</div>
<TR>
<TD>
<TABLE borderColor=#6698cb cellSpacing=1 cellPadding=0 width="800" align=center border=0>
<TBODY>
<TR>
<TD vAlign=center align=middle bgColor=#333333 height=30>
<DIV class=bottom style="MARGIN-LEFT: 7px">
<FONT face="Verdana, Arial, Helvetica, sans-serif" color=#ffffff size=2>
<a class='nav' href="tos.php">Terms Of Service</A> |
<a class='nav' href="privacy_policy.php">Privacy Policy</A> |
<a class='nav' href="aff_banner_code.php">Promote Our Site</a> |
<a class='nav' href="contact_us.php">Contact Us</a> |
<a class='nav' href="mailto:<?=$site_email?>">Advertise With Us</a> |
<a class='nav' href="about_us.php">About Us</a>
</font>
</div>
</td>
</tr>

<tr>
<td vAlign=center align=middle height=30>
<div class=bottom style="MARGIN-LEFT: 7px">
<A class=bottom><FONT size=2><FONT face="Verdana, Arial, Helvetica, sans-serif" color=#000000>© Copyright</FONT>
</FONT></A><font face="Verdana, Arial, Helvetica, sans-serif" color=#00000>
<font size=2> 2006 <?=$site_name?> &nbsp;&nbsp; All Rights Reserved</FONT></FONT></DIV>
</td>
</tr>

<tr>
<td>
<div align='right'>
<a class='bold_gray' href="<?=$site_url?>" target='_blank'>Powered By <?=$site_name?></a>
</div>
</td>
</tr>

</TBODY></TABLE></TD></TR></TBODY></TABLE><!-- #EndTemplate --></BODY></HTML>
