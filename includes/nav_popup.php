<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
<TBODY>
<TR>
<TD width=100><IMG src="images/logo.gif"> </TD>
<TD border="1">
<H2><FONT color=#ffffff></FONT></H2><!---<img src="images/logo_planet.jpg">----></TD>
<TD align=middle valign="top" border="0"><div align="right"><a href="http://www.ruskidom.com/helpcenter">Feedback &amp; Support</a> </div></TD>
</TR>
</TBODY>
</TABLE>
<p align="center">

<?php
    if (@include(getenv('DOCUMENT_ROOT').'/ads/phpadsnew.inc.php')) {
        if (!isset($phpAds_context)) $phpAds_context = array();
        $phpAds_raw = view_raw ('zone:1', 0, '', '', '0', $phpAds_context);
        echo $phpAds_raw['html'];
    }
?>