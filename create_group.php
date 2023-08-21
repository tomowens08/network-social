<?php
  session_start();
?>
<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<SCRIPT language="JavaScript">
function checkName(input, response)
{
  if (response != ''){ 
    // Response mode
    message   = document.getElementById('nameCheckFailed');
    if (response != 0){
			
      message.className = 'error';
    }else{
      message.className = 'hidden';
    } 
  }else{
    // Input mode
    url  = '/check_group_name.php?name=' + input+ '&time='+d.getMilliseconds();
    loadXMLDoc(url);
  }

}
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<style>
span.hidden{
  display: none;
}

span.error{
  display: inline;
  color: black;
  background-color: pink;  
}
</style>
<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Create a Group</h3></td></tr>";

  print "<tr><td class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";


     include("includes/class.groups.php");
     $group=new groups;

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

  
  print "<form name='create_group' action='group_add_action.php' method='post'>";
  
  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Group Name:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<input type='text' name='group_name'   onkeyup=\"checkName(this.value,'')\" size='40' value='$HTTP_POST_VARS[group_name]'>";
?>
<span class="hidden" id="nameCheckFailed"><br>Group name already exists, please create a diffrent name</span>
<?
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
         if($HTTP_POST_VARS["group_cat"] == $group_set["id"])
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
<label title="Anybody can join"><input <?if ($HTTP_POST_VARS['type'] == 0) echo 'checked';?> type="radio" name="type" value="0">Open</label>&nbsp;
<label title="Only approved by owner/creator of the group members can join."><input <?if ($HTTP_POST_VARS['type'] == 1 || !isset($HTTP_POST_VARS['type'])) echo 'checked';?> type="radio" name="type" value="1">Private</label>&nbsp;
<label title="Member can joing by owner/creator invitation only."><input <?if ($HTTP_POST_VARS['type'] == 2) echo 'checked';?> type="radio" name="type" value="2">Invitation Only</label>
<?
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Hidden Group:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  if($HTTP_POST_VARS["hidden_group"]==1)
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
	<td width="60%"><input type='checkbox' name='hide_from_all' value='1'></td>
</tr>
<?

  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Members can invite:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  if($HTTP_POST_VARS["members_invite"]==1)
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
  if($HTTP_POST_VARS["public_forum"]==1)
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
  if($HTTP_POST_VARS["post_bulletins"]==1)
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
  
  if($HTTP_POST_VARS["post_images"]==1)
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
         if($HTTP_POST_VARS["country"]==$state_set["state_id"])
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
  print "<input type='text' name='city' size='40' value='$HTTP_POST_VARS[city]'>";
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label'><b>State:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<input type='text' name='state' size='40' value='$HTTP_POST_VARS[state]'>";
  print "</td>";
  print "</tr>";
  
  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Zip Code:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<input type='text' name='zip_code' size='10' value='$HTTP_POST_VARS[zip_code]'>";
  print "</td>";
  print "</tr>";
  
  print "<tr>";
  print "<td width='40%' class='txt_label'><b>Description:</b>";
  print "</td>";
  print "<td width='60%' class='txt_label'>";
  print "<textarea name='description' rows='5' cols='40'>$HTTP_POST_VARS[description]</textarea>";
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'>";
  print "<input type='submit' name'submit' value='Create Group'>";
  print "</td>";
  print "</tr>";

  print "</form>";

  print "</table>";
  print "</td></tr>";
  print "</table>";
  print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
