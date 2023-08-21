<?
	include './includes/top.php';
	include './includes/conn.php';
  print "<table width='100%'>";


// Links Message

  print "<tr>";
  
	$sql = "SELECT * FROM groups WHERE id = ".$HTTP_GET_VARS[group_id];
	$gr = mysql_fetch_array(mysql_query($sql));
	
  $group_id=$HTTP_GET_VARS["group_id"];

     include("includes/class.groups.php");
     $group = new groups;

     $group_name = $group->get_group_name($group_id);

  print "<td width='100%' colspan='2' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<b><p align='left'><span class='style18'><h3>$group_name</h3></span></b></p></td></tr>";
  print "<tr><td colspan='2' class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  
        // images
        $num_images=$group->get_group_num_images($group_id);
        if($num_images==0)
        {
            $image="<img src='images/no_pic.gif' wifth='90' border='0'>";
        }
        else
        {
            $image_url=$group->get_group_image($group_id);
            $image="<img src='$image_url' width='90' height='100' border='0'>";
        }
        
        $group_info=$group->get_group_info($group_id);
        
        $cat_info=$group->get_cat($group_info["category"]);

?>

<TR vAlign=top bgColor=#ffffff>
<TD colSpan=2 height=28>
<TABLE cellSpacing=0 cellPadding='5' width="100%" border=0>
<TBODY>
<TR vAlign=top>
<TD width=170>
<div align=center>
<a href="view_group_images.php?group_id=<?=$group_id?>">
<?=$image?>
</a>
<P></P>
</DIV></TD>
<TD width=1>&nbsp;</TD>
<TD vAlign=top width=265 class='txt_label'>
<DIV align=left>
<p><strong><font color=#000000>Category: <a href="view_groups.php?cat_id=<?=$group_info["category"]?>"><?=$cat_info["cat_name"]?></a></font></STRONG></P>
<P><STRONG><font color=#000000>Type:</FONT></STRONG><FONT color=#000000>
<?php
	switch ($group_info["type"]) {
		case 0:
			echo 'Public Membership';
		break;
		case 1:
			echo 'Private Membership';
		break;
		case 2:
			echo 'Invitation Only Membership';
		break;
	}
?>

<?php
     $country_name=$group->get_country($group_info["country"]);
?>
<BR><STRONG>Founded:</STRONG><?=$group_info["posted_on"]?><BR>
<STRONG>Location:</STRONG> <?=$group_info["city"]?>,<BR><?=$group_info["state"]?> - <?=$country_name?>
<br>
<?php
     $num_members = $group->get_group_members($group_id);
     $num_members = $num_members+1;
?>
<strong>Members:</strong> <?=$num_members?>
</FONT></P></DIV></TD>