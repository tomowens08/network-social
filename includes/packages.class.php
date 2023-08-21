<?php
     // class for packages
        class packages
        {
            function add_package($name,$price,$allowed_mods)
            {
                $sql="insert into packages";
                $sql.="(pack_name";
                $sql.=", price";
                $sql.=", allowed_mods)";
                $sql.=" values('$name'";
                $sql.=", '$price'";
                $sql.=", '$allowed_mods')";
                
                $res=mysql_query($sql);
                
                if($res)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }

            function edit_package($id, $name,$price,$allowed_mods)
            {
                $sql="update packages";
                $sql.=" set pack_name='$name'";
                $sql.=", price='$price'";
                $sql.=", allowed_mods='$allowed_mods'";
                $sql.=" where id = $id";
                $res=mysql_query($sql);

                if($res)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }

            function users_exist($id)
            {
                $sql="select count(*) as a from members where pack_id=$id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set["a"];
            }

            function delete_package($id)
            {
                $sql="delete from packages";
                $sql.=" where id = $id";
                $res=mysql_query($sql);

                if($res)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }

            function display_admin_pack()
            {

                    $sql="select * from packages order by id";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["pack_name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_package.php?id=".$RSUser["id"]."'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_package.php?id=".$RSUser["id"]."'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }

             function get_pack($id)
             {
                 $sql="select * from packages where id = '$id'";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }
             function get_all()
             {
                 $sql="select * from packages";
                 $res=mysql_query($sql);
                 return $res;
             }
        }
     // class for packages
?>
