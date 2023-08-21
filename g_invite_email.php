<?php
include("conn.php");
//include("includes/right.php");
     include("includes/class.groups.php");

     $group=new groups;
     $group_id=$HTTP_GET_VARS["group_id"];
     $group_info=$group->get_group_info($group_id);
     $creator=$group->get_member_id($group_id);
?>
<body>
<?php


        $sql="select * from members where member_id = ".$_SESSION["member_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
    $member_name=$RSUser2["member_name"];
	
	    $sql="select member_name, member_lname, member_email from members where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print $RSUser["member_name"]."&nbsp;".$RSUser["member_lname"]." has invited you to join ".$RSUser["member_name"]."'s group named $group_info[group_name] at $site_name, where you and ".$RSUser["member_name"]." can network with each other's friends.";



  print "<br>Click below to join $site_name:<br><a href='$site_url/join_group_inv.php?group_id=".$group_id."' class='txt_label'>$site_url/join_group_inv.php?group_id=".$group_id;

?>
</body>
</html>
