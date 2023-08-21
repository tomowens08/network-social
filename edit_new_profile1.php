<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<tr>
<table width='100%'>

<?php

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='70%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#E3E4E9'><b><p align='center'><span class='style18'>Fill in your profile!</span></b></p></td></tr>";

  if ($HTTP_GET_VARS["status"]=="New")
  {

        $sql="insert into member_profile";
        $sql.="(member_id";
        $sql.=", status";
        $sql.=", age";
        $sql.=", occupation";
        $sql.=", country";
        $sql.=", hometown";
        $sql.=", interests";
        $sql.=", favourite_music";
        $sql.=", favourite_books";
        $sql.=", favourite_tv";
        $sql.=", favourite_movies";
        $sql.=", about_me";
        $sql.=", about_friend";
        $sql.=", photo_id)";

        $sql.=" values($HTTP_GET_VARS[user_id]";
        $sql.=", '$HTTP_POST_VARS[status]'";
        $sql.=", $HTTP_POST_VARS[age]";
        $sql.=", '$HTTP_POST_VARS[occupation]'";
        $sql.=", '$HTTP_POST_VARS[location]'";
        $sql.=", '$HTTP_POST_VARS[hometown]'";
        $sql.=", '$HTTP_POST_VARS[interests]'";
        $sql.=", '$HTTP_POST_VARS[favourite_music]'";
        $sql.=", '$HTTP_POST_VARS[favourite_books]'";
        $sql.=", '$HTTP_POST_VARS[favourite_tv]'";
        $sql.=", '$HTTP_POST_VARS[favourite_movies]'";
        $sql.=", '$HTTP_POST_VARS[about_me]'";
        $sql.=", '$HTTP_POST_VARS[about_partner]'";
        $sql.=", $HTTP_GET_VARS[user_id])";

        $result=mysql_query($sql);

        if($result)
        {
                print "<tr>";
                print "<td width='100%' colspan='2' class='login'><p align='center'>Your changes have been saved successfully.<br>The resigtration process is complete.<br>Please verify the email address!</p></td></tr>";
                print ("<script language='JavaScript'> window.location='upload_new_photo.php?user_id=$HTTP_GET_VARS[user_id]'; </script>");
        }
        else
        {
                print "<tr>";
                print "<td width='100%' colspan='2' class='login'><p align='center'>There was an error!</p></td></tr>";
        }
  }


  print "</table>";
  print "</td></tr></table>";


  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";
?>

</td>
</tr>
</table>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
