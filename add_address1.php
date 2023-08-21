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

  print "<table width='820'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Add an address to address book</h3></td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  if ($HTTP_POST_VARS["name"]=="" || $HTTP_POST_VARS["email"]=="")
  {
    print "You did not enter both the fields.";
  }
    else
  {

        $sql="select * from address_book where member_id = ".$_SESSION["member_id"]." and email like '".$HTTP_POST_VARS["email"]."'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
    if ($num_rows!=0)
    {
      print "The contact already exists.";
    }
      else
    {
        $sql="insert into address_book";
        $sql.="(member_id, name, email)";
        $sql.="values ($_SESSION[member_id], '$HTTP_POST_VARS[name]', '$HTTP_POST_VARS[email]')";
        $result=mysql_query($sql);
        if($result)
        {
            print "The contact has been added.";
            print "<br><a href='add_address.php'>Add more addresses</a>";
            print "<br><a href='logincomplete.php'>Return to home</a>";
        }
        else
        {
                print mysql_error();
            print "There was an error!";
            print "<br><a href='add_address.php'>Add more addresses</a>";
            print "<br><a href='logincomplete.php'>Return to home</a>";
        }
    }

  } 

} 

print "</p></td></tr>";

    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
