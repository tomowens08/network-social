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

        $sql="select * from members where member_id = ".$HTTP_GET_VARS["member_id"];
        $result1=mysql_query($sql);
        $RSUser3=mysql_fetch_array($result1);

  print "<td width='100%'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#B0B0B0'><b><p align='center'>Edit ".$RSUser3["member_name"]."&nbsp;".$RSuser3["member_lname"]."'s profile</b></p></td></tr>";


        $sql="select * from member_profile where member_id = ".$HTTP_GET_VARS["member_id"];
        $result2=mysql_query($sql);
        $num_rows=mysql_num_rows($result2);
        $RSUser1=mysql_fetch_array($result2);
        
  if ($num_rows==0)
  {

    print "<form name='EditProfile' action='edit_profile1.php?status=New&member_id=".$HTTP_GET_VARS["member_id"]."' method='post'>";
    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0' valign='top'>Status : </td><td width='60%' class='login'>";

    print "<input type='radio' value='Single/Divorced/Separated' name='status'>Single/Divorced/Separated<br>";
    print "<input type='radio' value='In a relationship' name='status'>In a Relationship<br>";
    print "<input type='radio' value='Married' name='status'>Married<br>";
    print "<input type='radio' value='Open Marriage' name='status'>Open Marriage<br>";

    print "</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Age : </td><td width='60%' class='login'><input type='text' name='age' size='3'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Occupation : </td><td width='60%' class='login'><input type='text' name='occupation' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Location : </td><td width='60%' class='login'><input type='text' name='location' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Hometown : </td><td width='60%' class='login'><input type='text' name='hometown' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Interests : </td><td width='60%' class='login'><textarea name='interests' rows='3' cols='20'></textarea></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Music : </td><td width='60%' class='login'><input type='text' name='favourite_music' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Books : </td><td width='60%' class='login'><input type='text' name='favourite_books' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite TV Shows : </td><td width='60%' class='login'><input type='text' name='favourite_tv' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Movies : </td><td width='60%' class='login'><input type='text' name='favourite_movies' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>About Me : </td><td width='60%' class='login'><textarea name='about_me' rows='3' cols='20'></textarea></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Who I want to meet : </td><td width='60%' class='login'><textarea name='about_partner' rows='3' cols='20'></textarea></td></tr>";

    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Save Changes'></p></td></tr>";
    print "</form>";
  }
    else
  {

    print "<form name='EditProfile' action='edit_profile1.php?status=Old&member_id=".$HTTP_GET_VARS["member_id"]."' method='post'>";
    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0' valign='top'>Status : </td><td width='60%' class='login'>";
    if ($RSUser1["status"]=="Single/Divorced/Separated")
    {

      print "<input type='radio' value='Single/Divorced/Separated' checked name='status'>Single/Divorced/Separated<br>";
    }
      else
    {

      print "<input type='radio' value='Single/Divorced/Separated' name='status'>Single/Divorced/Separated<br>";
    } 


    if ($RSUser1["status"]=="In a relationship")
    {

      print "<input type='radio' value='In a relationship' checked name='status'>In a Relationship<br>";
    }
      else
    {

      print "<input type='radio' value='In a relationship' name='status'>In a Relationship<br>";
    } 


    if ($RSUser1["status"]=="Married")
    {

      print "<input type='radio' value='Married' checked name='status'>Married<br>";
    }
      else
    {

      print "<input type='radio' value='Married' name='status'>Married<br>";
    } 


    if ($RSUser1["status"]=="Open Marriage")
    {

      print "<input type='radio' value='Open Marriage' checked name='status'>Open Marriage<br>";
    }
      else
    {

      print "<input type='radio' value='Open Marriage' name='status'>Open Marriage<br>";
    } 


    print "</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Age : </td><td width='60%' class='login'><input type='text' name='age' size='3' value='".$RSUser1["age"]."'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Occupation : </td><td width='60%' class='login'><input type='text' name='occupation' size='20' value='".$RSUser1["occupation"]."'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Location : </td><td width='60%' class='login'><input type='text' name='location' size='20' value='".$RSUser1["country"]."'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Hometown : </td><td width='60%' class='login'><input type='text' name='hometown' size='20' value='".$RSUser1["hometown"]."'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Interests : </td><td width='60%' class='login'><textarea name='interests' rows='3' cols='20'>".$RSUser1["interests"]."</textarea></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Music : </td><td width='60%' class='login'><input type='text' name='favourite_music' size='20' value='".$RSUser1["favourite_music"]."'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Books : </td><td width='60%' class='login'><input type='text' name='favourite_books' size='20' value='".$RSUser1["favourite_books"]."'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite TV Shows : </td><td width='60%' class='login'><input type='text' name='favourite_tv' size='20' value='".$RSUser1["favourite_tv"]."'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Movies : </td><td width='60%' class='login'><input type='text' name='favourite_movies' size='20' value='".$RSUser1["favourite_movies"]."'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>About Me : </td><td width='60%' class='login'><textarea name='about_me' rows='3' cols='20'>".$RSUser1["about_me"]."</textarea></td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Who I want to meet : </td><td width='60%' class='login'><textarea name='about_partner' rows='3' cols='20'>".$RSUser1["about_friend"]."</textarea></td></tr>";

    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Save Changes'></p></td></tr>";
    print "</form>";
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
