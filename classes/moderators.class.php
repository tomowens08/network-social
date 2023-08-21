<?php
     // class for moderators

              class moderators
              {
                    function display_moderators_blog()
                    {
                     $sql="select * from members";
                     $res=mysql_query($sql);
                     while($data_set=mysql_fetch_array($res))
                     {

                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>";

                      $sql="select * from blog_moderators where member_id = $data_set[member_id]";
                      $result=mysql_query($sql);
                      $num_rows=mysql_num_rows($result);

                      if($num_rows==1)
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]' checked>";
                      }
                      else
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]'>";
                      }

                      print "</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>";
                      print "<b>Name:</b> $data_set[member_name]&nbsp;$data_set[member_lname]";
                      print "<br>&nbsp;&nbsp;<b>Email:</b> $data_set[member_email]";
                      print "<br>&nbsp;&nbsp;<b>Member ID:</b> $data_set[member_id]";
                      print "</td>";
                      print "</tr>";
                      
                    $sr_no=1;
                     }

                  }
                  
                  function add_blog_moderator($member_id)
                  {
                     $date_posted=date("m-d-Y g:i:s");
                     
                     $sql="delete from blog_moderators";
                     $res=mysql_query($sql);
                     
                     $sql="insert into blog_moderators";
                     $sql.="(member_id";
                     $sql.=", added_on)";
                     
                     $sql.=" values($member_id";
                     $sql.=", '$date_posted')";
                     
                     $res=mysql_query($sql);
                     print mysql_error();
                     
                     if($res)
                     {
                         return 1;
                     }
                     else
                     {
                     }
                  }
                  
                    function display_moderators_pics()
                    {
                     $sql="select * from members";
                     $res=mysql_query($sql);
                     while($data_set=mysql_fetch_array($res))
                     {

                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>";

                      $sql="select * from moderators_pics where member_id = $data_set[member_id]";
                      $result=mysql_query($sql);
                      $num_rows=mysql_num_rows($result);

                      if($num_rows==1)
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]' checked>";
                      }
                      else
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]'>";
                      }

                      print "</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>";
                      print "<b>Name:</b> $data_set[member_name]&nbsp;$data_set[member_lname]";
                      print "<br>&nbsp;&nbsp;<b>Email:</b> $data_set[member_email]";
                      print "<br>&nbsp;&nbsp;<b>Member ID:</b> $data_set[member_id]";
                      print "</td>";
                      print "</tr>";

                    $sr_no=1;
                     }

                  }

                  function add_pics_moderator($member_id)
                  {
                     $date_posted=date("m-d-Y g:i:s");

                     $sql="delete from moderators_pics";
                     $res=mysql_query($sql);

                     $sql="insert into moderators_pics";
                     $sql.="(member_id";
                     $sql.=", added_on)";

                     $sql.=" values($member_id";
                     $sql.=", '$date_posted')";

                     $res=mysql_query($sql);
                     print mysql_error();

                     if($res)
                     {
                         return 1;
                     }
                     else
                     {
                     }
                  }
                  
                  function check_pic_mod($member_id)
                  {
                      $sql="select count(*) as a from moderators_pics where member_id = $member_id";
                      $res=mysql_query($sql);
                      $data_set=mysql_fetch_array($res);
                      
                      return $data_set["a"];
                  }
                  
                    function display_moderators_groups()
                    {
                     $sql="select * from members";
                     $res=mysql_query($sql);
                     while($data_set=mysql_fetch_array($res))
                     {

                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>";

                      $sql="select * from moderators_groups where member_id = $data_set[member_id]";
                      $result=mysql_query($sql);
                      $num_rows=mysql_num_rows($result);

                      if($num_rows==1)
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]' checked>";
                      }
                      else
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]'>";
                      }

                      print "</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>";
                      print "<b>Name:</b> $data_set[member_name]&nbsp;$data_set[member_lname]";
                      print "<br>&nbsp;&nbsp;<b>Email:</b> $data_set[member_email]";
                      print "<br>&nbsp;&nbsp;<b>Member ID:</b> $data_set[member_id]";
                      print "</td>";
                      print "</tr>";

                    $sr_no=1;
                     }

                  }
                  
                  function add_groups_moderator($member_id)
                  {
                     $date_posted=date("m-d-Y g:i:s");

                     $sql="delete from moderators_groups";
                     $res=mysql_query($sql);

                     $sql="insert into moderators_groups";
                     $sql.="(member_id";
                     $sql.=", added_on)";

                     $sql.=" values($member_id";
                     $sql.=", '$date_posted')";

                     $res=mysql_query($sql);
                     print mysql_error();

                     if($res)
                     {
                         return 1;
                     }
                     else
                     {
                     }
                  }
                  
                  function check_group_mod($member_id)
                  {
                      $sql="select count(*) as a from moderators_groups where member_id = $member_id";
                      $res=mysql_query($sql);
                      $data_set=mysql_fetch_array($res);

                      return $data_set["a"];
                  }


                    function display_moderators_events()
                    {
                     $sql="select * from members";
                     $res=mysql_query($sql);
                     while($data_set=mysql_fetch_array($res))
                     {

                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>";

                      $sql="select * from moderators_events where member_id = $data_set[member_id]";
                      $result=mysql_query($sql);
                      $num_rows=mysql_num_rows($result);

                      if($num_rows==1)
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]' checked>";
                      }
                      else
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]'>";
                      }

                      print "</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>";
                      print "<b>Name:</b> $data_set[member_name]&nbsp;$data_set[member_lname]";
                      print "<br>&nbsp;&nbsp;<b>Email:</b> $data_set[member_email]";
                      print "<br>&nbsp;&nbsp;<b>Member ID:</b> $data_set[member_id]";
                      print "</td>";
                      print "</tr>";

                    $sr_no=1;
                     }

                  }
                  
                  function add_events_moderator($member_id)
                  {
                     $date_posted=date("m-d-Y g:i:s");

                     $sql="delete from moderators_events";
                     $res=mysql_query($sql);

                     $sql="insert into moderators_events";
                     $sql.="(member_id";
                     $sql.=", added_on)";

                     $sql.=" values($member_id";
                     $sql.=", '$date_posted')";

                     $res=mysql_query($sql);
                     print mysql_error();

                     if($res)
                     {
                         return 1;
                     }
                     else
                     {
                     }
                  }



                  function check_event_mod($member_id)
                  {
                      $sql="select count(*) as a from moderators_events where member_id = $member_id";
                      $res=mysql_query($sql);
                      $data_set=mysql_fetch_array($res);

                      return $data_set["a"];
                  }


                    function display_moderators_classifieds()
                    {
                     $sql="select * from members";
                     $res=mysql_query($sql);
                     while($data_set=mysql_fetch_array($res))
                     {

                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>";

                      $sql="select * from moderators_classified where member_id = $data_set[member_id]";
                      $result=mysql_query($sql);
                      $num_rows=mysql_num_rows($result);

                      if($num_rows==1)
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]' checked>";
                      }
                      else
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]'>";
                      }

                      print "</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>";
                      print "<b>Name:</b> $data_set[member_name]&nbsp;$data_set[member_lname]";
                      print "<br>&nbsp;&nbsp;<b>Email:</b> $data_set[member_email]";
                      print "<br>&nbsp;&nbsp;<b>Member ID:</b> $data_set[member_id]";
                      print "</td>";
                      print "</tr>";

                    $sr_no=1;
                     }

                  }

                  function add_classified_moderator($member_id)
                  {
                     $date_posted=date("m-d-Y g:i:s");

                     $sql="delete from moderators_classified";
                     $res=mysql_query($sql);

                     $sql="insert into moderators_classified";
                     $sql.="(member_id";
                     $sql.=", added_on)";

                     $sql.=" values($member_id";
                     $sql.=", '$date_posted')";

                     $res=mysql_query($sql);
                     print mysql_error();

                     if($res)
                     {
                         return 1;
                     }
                     else
                     {
                     }
                  }



                  function check_classified_mod($member_id)
                  {
                      $sql="select count(*) as a from moderators_classified where member_id = $member_id";
                      $res=mysql_query($sql);
                      $data_set=mysql_fetch_array($res);

                      return $data_set["a"];
                  }


                    function display_moderators_music()
                    {
                     $sql="select * from members";
                     $res=mysql_query($sql);
                     while($data_set=mysql_fetch_array($res))
                     {

                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>";

                      $sql="select * from moderators_music where member_id = $data_set[member_id]";
                      $result=mysql_query($sql);
                      $num_rows=mysql_num_rows($result);

                      if($num_rows==1)
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]' checked>";
                      }
                      else
                      {
                       print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]'>";
                      }

                      print "</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>";
                      print "<b>Name:</b> $data_set[member_name]&nbsp;$data_set[member_lname]";
                      print "<br>&nbsp;&nbsp;<b>Email:</b> $data_set[member_email]";
                      print "<br>&nbsp;&nbsp;<b>Member ID:</b> $data_set[member_id]";
                      print "</td>";
                      print "</tr>";

                    $sr_no=1;
                     }

                  }

                  function add_music_moderator($member_id)
                  {
                     $date_posted=date("m-d-Y g:i:s");

                     $sql="delete from moderators_music";
                     $res=mysql_query($sql);

                     $sql="insert into moderators_music";
                     $sql.="(member_id";
                     $sql.=", added_on)";

                     $sql.=" values($member_id";
                     $sql.=", '$date_posted')";

                     $res=mysql_query($sql);
                     print mysql_error();

                     if($res)
                     {
                         return 1;
                     }
                     else
                     {
                     }
                  }



                  function check_music_mod($member_id)
                  {
                      $sql="select count(*) as a from moderators_music where member_id = $member_id";
                      $res=mysql_query($sql);
                      $data_set=mysql_fetch_array($res);

                      return $data_set["a"];
                  }




              }
     // class for moderators
?>
