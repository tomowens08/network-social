<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
  print "<td class='headcell' height='20' width='100%'>Add a Classified Moderator</td></tr>";
  print "<tr><td class='textcell'><table width='100%'>";


  include("includes/conn.php");

  include("../classes/moderators.class.php");
  $moderators=new moderators;

   $member_id=$HTTP_POST_VARS["member_id"];

   if($member_id==Null)
   {
    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='100%' colspan='4'>";
    print "<p align='center'>";
    print "You did not select any member to add in the moderators list.";
    print "</p></td></tr>";
   }
   else
   {
       $sr_no=0;
       $mods='';
       foreach($member_id as $aa)
       {
              $res=$moderators->add_classified_moderator($aa);
       }

        print "<tr bgColor='#ffffff'>";
        print "<td class='textcell' valign='top' width='100%' colspan='4'>";
        print "<p align='center'>";
        print "The moderators have been assigned successfully.";
        print "</p></td></tr>";
   }




  print "</table></table>";
}

?>


</BODY>
</HTML>

