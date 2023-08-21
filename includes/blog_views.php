<?php
     include_once("blog.class.php");
     $blog=new blog;
?>
<TR>
<TD>&nbsp;</TD></TR>
<TR>
<TD>
<TABLE cellSpacing=0 cellPadding=1 width="100%" bgColor=#6699cc border=0>
<TBODY>
<TR>
<TD>
<TABLE borderColor=#ffffff cellSpacing=0 cellPadding=1 width="100%" bgColor=#f5f5f5 border=1>
<TBODY>
<TR vAlign=center align=left bgColor=#a5d5f5>
<TD class='txt_label' style="FONT-WEIGHT: bold; FONT-SIZE: 10pt; COLOR: black">&nbsp;</TD>
<TD class='txt_label' style="FONT-SIZE: 8pt; COLOR: #000000" align=middle width=40><STRONG>Today</STRONG></TD>
<TD class='txt_label' style="FONT-SIZE: 8pt; COLOR: #000000"  align=middle width=40><STRONG>Week</STRONG></TD>
<TD class='txt_label' style="FONT-SIZE: 8pt; COLOR: #000000" align=middle width=40><STRONG>Total</STRONG></TD></TR>

<TR vAlign=center align=left bgColor=#e5e5e5>
<TD class='txt_label'>Posts</TD>
<?php
     $today_posts=$blog->get_today_posts($_SESSION["member_id"]);
     $week_posts=$blog->get_week_posts($_SESSION["member_id"]);
     $total_posts=$blog->get_total_posts($_SESSION["member_id"]);
?>
<TD class='txt_label' align=middle><?=$today_posts?></TD>
<TD class='txt_label' vAlign=center align=middle><?=$week_posts?></TD>
<TD class='txt_label' vAlign=center align=middle><?=$total_posts?></TD></TR>

<TR vAlign=center align=left bgColor=#e5e5e5>
<TD class='txt_label'>Comments</TD>
<?php
     $today_comments=$blog->get_today_comments($_SESSION["member_id"]);
     $week_comments=$blog->get_week_comments($_SESSION["member_id"]);
     $total_comments=$blog->get_total_comments($_SESSION["member_id"]);
?>
<TD class='txt_label' align=middle><?=$today_comments?></TD>
<TD class='txt_label' vAlign=center align=middle><?=$week_comments?></TD>
<TD class='txt_label' vAlign=center align=middle><?=$total_comments?></TD>
</TR>

<TR vAlign=center align=left bgColor=#e5e5e5>
<TD class='txt_label'>Views</TD>
<?php
     $today_views=$blog->get_today_views($_SESSION["member_id"]);
     $week_views=$blog->get_week_views($_SESSION["member_id"]);
     $total_views=$blog->get_total_views($_SESSION["member_id"]);
?>

<TD class='txt_label' align=middle><?=$today_views?></TD>
<TD class='txt_label' vAlign=center align=middle><?=$week_views?></TD>
<TD class='txt_label' vAlign=center align=middle><?=$total_views?></TD>
</TR>

<TR vAlign=center align=left bgColor=#e5e5e5>
<TD class='txt_label'>Kudos</TD>
<?php
     $today_kudos=$blog->get_today_kudos($_SESSION["member_id"]);
     $week_kudos=$blog->get_week_kudos($_SESSION["member_id"]);
     $total_kudos=$blog->get_total_kudos($_SESSION["member_id"]);
?>
<TD class='txt_label' align=middle><?=$today_kudos?></TD>
<TD class='txt_label' vAlign=center align=middle><?=$week_kudos?></TD>
<TD class='txt_label' vAlign=center align=middle><?=$total_kudos?></TD></TR>

</TBODY></TABLE></TD></TR></TBODY></TABLE>
</TD></TR>

