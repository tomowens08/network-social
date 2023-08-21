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

<?php

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_import.php");
  print "</td>";

?>
<td width='80%' valign='top'>
<table width='100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='style9' valign='top'>

<?php

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='70%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<b><p align='center'>Import your address book</b></p></td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";


  // Upload

if(!empty($_FILES["file"]))
{
 $file_name1=$_FILES["file"]["name"];
 $picture_name=$_SESSION["member_id"].$file_name1;
 $picture_url="emails/".$picture_name;
 $result = move_uploaded_file($_FILES["file"]["tmp_name"], $emaildir.$picture_name);

 // Check for valid file
    $sr_no=0;
    $handle=fopen($emaildir.$picture_name, "r");
    while($data = fgetcsv ($handle, 1000, ","))
    {
        if($sr_no==0)
        {
         for($i=0;$i<=28;$i++)
         {
             if($data[$i]=="First Name")
             {
              $first_name=$i;
             }
             if($data[$i]=="Last Name")
             {
              $last_name=$i;
             }

             if($data[$i]=="E-mail Address")
             {
              $email=$i;
             }
         }
        }
        else
        {
            $sql="select * from address_book where member_id = $_SESSION[member_id] and email like '$data[$email]'";
            $num=mysql_query($sql);
            $num_rows=mysql_num_rows($num);
            if($num_rows==0)
            {
             $sql="insert into address_book";
             $sql.="(member_id";
             $sql.=", name";
             $sql.=", email)";
             $sql.=" values($_SESSION[member_id]";
             $sql.=", '$data[$first_name]&nbsp;$data[$last_name]'";
             $sql.=", '$data[$email]')";
             $res=mysql_query($sql);
            }
        }
        $sr_no=$sr_no+1;
    }
 // Check for valid file

  print "<p align='center'>Your address book has been imported";
  print "<br><a href='address_book.php?page=1' class='style11'>Go to address book</a></p>";
}
else
{
  print "<p align='center'>You did not select a file to import.";
  print "<br><a href='address_book.php?page=1' class='style11'>Go to address book</a></p>";
}







  print "</table>";
  print "</p></td></tr>";


  print "</table>";
  print "</td>";
  print "</tr></table>";


?>

</td>
</tr>
</table>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
}
include("includes/bottom.php");
?>
