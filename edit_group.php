<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Edit Group</h3></td></tr>";

  print "<tr><td class='txt_label'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";


     include("includes/class.groups.php");
     $group=new groups;
     
     $get_group_res=$group->get_group($HTTP_GET_VARS["group_id"]);
     $get_data_set=mysql_fetch_array($get_group_res);

     $group_res=$group->get_all_cats();
     $sr_no=0;

     if($HTTP_GET_VARS["err"]==1)
     {
         print "<tr>";
         print "<td width='100%' colspan='2' class='txt_label'>";
         print "<b>Err:</b> You did not enter all the required fields.";
         print "</td>";
         print "</tr>";

     }


  print "<form name='create_group' action='group_edit_action.php?group_id=$HTTP_GET_VARS[group_id]' method='post'>";

  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Group Name:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<input type='text' name='group_name' size='40' value='$get_data_set[group_name]'>";
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Category:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<select name='group_cat' size='1'>";
  // run loop to display all categories

     while($group_set=mysql_fetch_array($group_res))
     {
         if($get_data_set["category"] == $group_set["id"])
         {
               print "<option value='$group_set[id]' selected>$group_set[cat_name]</option>";
         }
         else
         {
               print "<option value='$group_set[id]'>$group_set[cat_name]</option>";
         }
     }

  // run loop to display all categories

  print "</select>";

  print "</td>";
  print "</tr>";



  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Type:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
	//GROUP TYPES
	//0- Open
	//1- Private
	//2- Invitation Only
?>
<label title="Anybody can join"><input <?if ($get_data_set['type'] == 0) echo 'checked';?> type="radio" name="type" value="0">Open</label>&nbsp;
<label title="Only approved by owner/creator of the group members can join."><input <?if ($get_data_set['type']) echo 'checked';?> type="radio" name="type" value="1">Private</label>&nbsp;
<label title="Member can joing by owner/creator invitation only."><input <?if ($get_data_set['type'] == 2) echo 'checked';?> type="radio" name="type" value="2">Invitation Only</label>
<?
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Hidden Group:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  if($get_data_set["hidden_group"]==1)
  {
   print "<input type='radio' name='hidden_group' value='1' checked>Yes&nbsp;";
   print "<input type='radio' name='hidden_group' value='0'>No&nbsp;";
  }
  else
  {
   print "<input type='radio' name='hidden_group' value='1'>Yes&nbsp;";
   print "<input type='radio' name='hidden_group' value='0' checked>No&nbsp;";
  }
  print "</td>";
  print "</tr>";
?>
<tr class="txt_label">
	<td width="40%"><b>Hide from search and profile also:</b></td>
	<td width="60%"><input type='checkbox' <?if ($get_data_set['hide_from_all']) echo 'checked';?> name='hide_from_all' value='1'></td>
</tr>
<?

  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Members can invite:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  if($get_data_set["members_invite"]==1)
  {
   print "<input type='radio' name='members_invite' value='1' checked>Yes&nbsp;";
   print "<input type='radio' name='members_invite' value='0'>No&nbsp;";
  }
  else
  {
   print "<input type='radio' name='members_invite' value='1'>Yes&nbsp;";
   print "<input type='radio' name='members_invite' value='0' checked>No&nbsp;";
  }

  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Public Forum:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  if($get_data_set["public_forum"]==1)
  {
   print "<input type='radio' name='public_forum' value='1' checked>Yes&nbsp;";
   print "<input type='radio' name='public_forum' value='0'>No&nbsp;";
  }
  else
  {
   print "<input type='radio' name='public_forum' value='1'>Yes&nbsp;";
   print "<input type='radio' name='public_forum' value='0' checked>No&nbsp;";
  }

  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Members can post bulletins:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  if($get_data_set["post_bulletins"]==1)
  {
   print "<input type='radio' name='post_bulletins' value='1' checked>Yes&nbsp;";
   print "<input type='radio' name='post_bulletins' value='0'>No&nbsp;";
  }
  else
  {
   print "<input type='radio' name='post_bulletins' value='1'>Yes&nbsp;";
   print "<input type='radio' name='post_bulletins' value='0' checked>No&nbsp;";
  }

  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Members can post images:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";

  if($get_data_set["post_images"]==1)
  {
   print "<input type='radio' name='post_images' value='1' checked>Yes&nbsp;";
   print "<input type='radio' name='post_images' value='0'>No&nbsp;";
  }
  else
  {
   print "<input type='radio' name='post_images' value='1'>Yes&nbsp;";
   print "<input type='radio' name='post_images' value='0' checked>No&nbsp;";
  }

  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Country:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<select name='country' size='1'>";
  // run loop to display all categories
     $sql="select * from states";
     $state_res=mysql_query($sql);
     while($state_set=mysql_fetch_array($state_res))
     {
         if($get_data_set["country"]==$state_set["state_id"])
         {
          print "<option value='$state_set[state_id]' selected>$state_set[state_name]</option>";
         }
         else
         {
          print "<option value='$state_set[state_id]'>$state_set[state_name]</option>";
         }
     }

  // run loop to display all categories

  print "</select>";

  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label'><b>City:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<input type='text' name='city' size='40' value='$get_data_set[city]'>";
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label'><b>State:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<input type='text' name='state' size='40' value='$get_data_set[state]'>";
  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Zip Code:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<input type='text' name='zip_code' size='10' value='$get_data_set[zip_code]'>";
  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Description:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<textarea name='description' rows='5' cols='40'>$get_data_set[description]</textarea>";
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'>";
  print "<input type='submit' name'submit' value='Edit Group'>";
  print "</td>";
  print "</tr>";

  print "</form>";

  print "</td></tr>";
  print "</table>";

  print "</table>";
  print "</td>";
  print "</td></tr>";
//  print "</table>";
  print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
