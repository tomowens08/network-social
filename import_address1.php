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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Address Book (Import an address)</h3></td></tr>";



  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'>";

  print "<table width='100%'>";

        $sql="select * from address_book where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);

  $sr_no=1;
  while($RSUser=mysql_fetch_array($result))
  {

    if ($HTTP_POST_VARS["".$RSUser["address_id"].""]=="on")
    {
        $sess_id=session_id();
        if($HTTP_GET_VARS["group"]==1)
        {
            $sql="insert into invite_temp_group_emails(email, name, session_id)";
            $sql.=" values('$RSUser[email]', '$RSUser[name]', '$sess_id')";
        }
        else
        {
            $sql="insert into invite_temp_emails(email, name, session_id)";
            $sql.=" values('$RSUser[email]', '$RSUser[name]', '$sess_id')";
        }
        
        $result3=mysql_query($sql);
    }

  $sr_no=$sr_no+1;
  }


  print "<tr>";
  print "<td width='100%' colspan='4'><p align='center' class='login'>The address has been added to invite list.";
  print "<br><a href='invite.php'>Back to invite page</a></td>";
  print "</tr>";




  print "</table>";

  print "</p></td></tr>";
  print "</table>";
  print "</td>";

//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
