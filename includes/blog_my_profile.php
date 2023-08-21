<TR>
<TD>&nbsp;</TD></TR>
<TR>

<TD>
<table cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD>
<TABLE cellSpacing=0 cellPadding=1 width="100%" bgColor=#6699cc border=0>
<TBODY>
<TR>
<TD vAlign=top align=left>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
<TBODY>
<?php
     include("includes/people.class.php");
     $people=new people;
     $name=$people->get_name($_SESSION["member_id"]);
     $num_images=$people->get_num_images($_SESSION["member_id"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($_SESSION["member_id"]);
         $image="<img alt='' src='$image_url' width=90 border=0>";
     }
?>
<tr>
<td style="FONT-WEIGHT: bold; FONT-SIZE: 10pt; COLOR: white" align=middle bgColor=#a5d5f5>
<a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>"><?=$name?></A></TD></TR>
<TR vAlign=top align=left bgColor=#f5f5f5>
<TD align=middle>
<?=$image?>
</TD></TR>

</TBODY></TABLE></TD></TR>
</TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>

