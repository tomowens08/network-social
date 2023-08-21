<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_menu_messages.php");

    include("includes/people.class.php");
    $people=new people;
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class="dark_b_border2">

<tr>
<td colspan='5' class='dark_blue_white2'><?=$site_name?> <?=$HTTP_GET_VARS["folder"]?>
</td>
</tr>



<?php

  if ($HTTP_GET_VARS["folder"]=="sent")
  {
?>
<form name='delete' action='delete_mess.php' method='post'>
<input type='hidden' name='folder' value='sent'>

<tr bgcolor="#6699CC">
<td width='10%'>&nbsp;</td>
<td width='20%' class='txt_label'><b><font color='#FFFFFF'>Date:</b></font></td>
<td width='30%' class='txt_label'><b><font color='#FFFFFF'>To:</b></font></td>
<td width='20%' class='txt_label'><b><font color='#FFFFFF'>Status:</b></font></td>
<td width='30%' class='txt_label'><b><font color='#FFFFFF'>Subject:</b></font></td>
</tr>
<?php
        $sql="select * from messages_sent where mess_by = ".$_SESSION["member_id"]." and deleted <> 1";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

        include("includes/display_outbox.php");
  }
?>


<?php

  if ($HTTP_GET_VARS["folder"]=="deleted")
  {
?>
<form name='delete' action='delete_mess.php' method='post'>
<input type='hidden' name='folder' value='deleted'>

<tr bgcolor="#6699CC">
<td width='10%'>&nbsp;</td>
<td width='20%' class='txt_label'><b><font color='#FFFFFF'>Date:</b></font></td>
<td width='30%' class='txt_label'><b><font color='#FFFFFF'>From:</b></font></td>
<td width='20%' class='txt_label'><b><font color='#FFFFFF'>Status:</b></font></td>
<td width='30%' class='txt_label'><b><font color='#FFFFFF'>Subject:</b></font></td>
</tr>
<?php
        $sql="select * from messages where mess_to = ".$_SESSION["member_id"]." and deleted = 1";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

        include("includes/display_trash.php");
  }
?>


<?php

  if ($HTTP_GET_VARS["folder"]=="inbox"||$HTTP_GET_VARS["folder"]==Null)
  {
?>
<form name='delete' action='delete_mess.php' method='post'>
<input type='hidden' name='folder' value='inbox'>
<tr bgcolor="#6699CC">
<td width='10%'>&nbsp;</td>
<td width='20%' class='txt_label'><b><font color='#FFFFFF'>Date:</b></font></td>
<td width='30%' class='txt_label'><b><font color='#FFFFFF'>From:</b></font></td>
<td width='20%' class='txt_label'><b><font color='#FFFFFF'>Status:</b></font></td>
<td width='30%' class='txt_label'><b><font color='#FFFFFF'>Subject:</b></font></td>
</tr>


<?php

        $sql="select * from admin_message where member_id = ".$_SESSION["member_id"];
        $result1=mysql_query($sql);

    while($RSUser1=mysql_fetch_array($result1))
    {
?>
<tr bgcolor="#E8F1FA">
<td width='10%'><input type='checkbox' name='admin[]' value='<?=$RSUser1["message_id"]?>'></td>
<td width='20%' class='txt_label'><?=$RSUser1["date_posted"]?></td>
<td width='30%' class='txt_label'>Admin</td>
<td width='20%' class='txt_label'>
<?php
     if($RSUser1["read_status"]==0||$RSUser1["read_status"]==Null)
     {
?>
  Unread
<?php
     }
     else
     {
?>
  Read
<?php
     }
?>
</td>
<td width='30%' class='txt_label'>
<a href='view_admin_message.php?mess_id=<?=$RSUser1["message_id"]?>'>
<?=$RSUser1["subject"]?>
</a>
</td>
</tr>
<?php
     }

        $sql="select * from messages where mess_to = ".$_SESSION["member_id"]." and deleted <> 1";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

        include("includes/display_inbox.php");
  }


  print "</td>";
  print "</tr></table>";
?>

<?php
  print "<table width='100%'>";
  print "<tr><td width='100%' class='txt_label'>";
        print "<input type='submit' name='submit' value='Delete Messages'>";
  print "</td></tr>";
  print "<tr><td width='100%' class='txt_label'>";
?>
<?php
        if($n!=0)
        {
        $n_previous=$n-10;
?>
&#187; <a href='view_folder.php?folder=<?=$HTTP_GET_VARS["folder"]?>&n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='view_folder.php?folder=<?=$HTTP_GET_VARS["folder"]?>&n=<?=$n_next?>'>Next</a>
<?php
        }
?>
<?php
  print "</td></tr></table>";
// Paging Technique
?>
</td></tr>
</table>
<!-- Middle Text -->
</table>
</td>
</tr>
</table>
</table>

<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
