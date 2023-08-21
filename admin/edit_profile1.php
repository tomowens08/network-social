<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<table>
<tr>
<td width='750' height='232' valign='middle' colspan='2'>
<p align='center'>
<?php
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "<font face='verdana' size='2'><b>You need to login before you can view this page.</b></font>";
}
  else
{

        $sql="select * from members where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";

  print "</table>";

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='100%'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#B0B0B0'><b><p align='center'>Edit profile</b></p></td></tr>";

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
        
        $sql.=" values($HTTP_GET_VARS[member_id]";
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
        $sql.=", $HTTP_GET_VARS[member_id])";
        
        $result=mysql_query($sql);
  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'>Your changes have been saved successfully.</p></td></tr>";
  }
  else
{

        $sql="update member_profile";
        $sql.="set status = '$HTTP_POST_VARS[status]]";
        $sql.=", age = $HTTP_POST_VARS[age]";
        $sql.=", occupation = '$HTTP_POST_VARS[occupation]'";
        $sql.=", country = '$HTTP_POST_VARS[location]'";
        $sql.=", hometown = '$HTTP_POST_VARS[hometown]'";
        $sql.=", interests = '$HTTP_POST_VARS[interests]'";
        $sql.=", favourite_music = '$HTTP_POST_VARS[favourite_music]'";
        $sql.=", favourite_books = '$HTTP_POST_VARS[favourite_books]'";
        $sql.=", favourite_tv = '$HTTP_POST_VARS[favourite_tv]'";
        $sql.=", favourite_movies = '$HTTP_POST_VARS[favourite_movies]'";
        $sql.=", about_me = '$HTTP_POST_VARS[about_me]'";
        $sql.=", about_friend = '$HTTP_POST_VARS[about_partner]'";
        $sql.=" where member_id = $HTTP_GET_VARS[member_id]";

        $result=mysql_query($sql);
        
        print "<tr>";
        print "<td width='100%' colspan='2' class='login'><p align='center'>Your changes have been saved successfully.</p></td></tr>";
}

  print "</table>";
  print "</td></tr></table>";


  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";
}
?>

</td>
</tr>
</body>
</html>
