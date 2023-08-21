<?php
  session_start();
?>
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

  print "<td width='70%'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#B0B0B0'><b><p align='center'>".$RSUser["member_name"]."'s Profile</b></p></td></tr>";
  print "<tr>";
  print "<td width='30%' class='login' bgcolor='#D0D0D0'>Gender : </td><td width='70%' class='login'>".$RSUser["gender"]."</td></tr>";


        $sql="select * from member_profile where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser1=mysql_fetch_array($result);
  if ($num_rows==0)
  {

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Status : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Age : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Occupation : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Location : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Hometown : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Interests : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Music : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Books : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite TV Shows : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Movies : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>About Me : </td><td width='60%' class='login'>Not specified yet.</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Who I want to meet : </td><td width='60%' class='login'>Not specified yet.</td></tr>";
  }
    else
  {

    if (!$RSUser1["status"]=="")
    {

      print "<tr>";
      print "<td width='40%' class='login' bgcolor='#D0D0D0'>Status : </td><td width='60%' class='login'>".$RSUser1["status"]."</td></tr>";
    }
      else
    {

      print "<tr>";
      print "<td width='40%' class='login' bgcolor='#D0D0D0'>Status : </td><td width='60%' class='login'>Not specified yet.</td></tr>";
    } 


    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Age : </td><td width='60%' class='login'>".$RSUser1["age"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Occupation : </td><td width='60%' class='login'>".$RSUser1["occupation"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Location : </td><td width='60%' class='login'>".$RSUser1["country"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Hometown : </td><td width='60%' class='login'>".$RSUser1["hometown"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Interests : </td><td width='60%' class='login'>".$RSUser1["interests"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Music : </td><td width='60%' class='login'>".$RSUser1["favourite_music"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Books : </td><td width='60%' class='login'>".$RSUser1["favourite_books"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite TV Shows : </td><td width='60%' class='login'>".$RSUser1["favourite_tv"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Favourite Movies : </td><td width='60%' class='login'>".$RSUser1["favourite_movies"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>About Me : </td><td width='60%' class='login'>".$RSUser1["about_me"]."</td></tr>";

    print "<tr>";
    print "<td width='40%' class='login' bgcolor='#D0D0D0'>Who I want to meet : </td><td width='60%' class='login'>".$RSUser1["about_friend"]."</td></tr>";

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

