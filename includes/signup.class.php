<?php
     class signup
     {
         function check_email($email)
         {
             // check if email already exists
                $sql="select member_email from members where member_email like '$email'";
                $res=mysql_query($sql);
                $num_rows=mysql_num_rows($res);

                return $num_rows;
             // check if email already exists
         }

         function check_username($username)
         {
             // check if email already exists
                $sql="select user_name from music_member_profile where user_name like '$username'";
                $res=mysql_query($sql);
                $num_rows=mysql_num_rows($res);

                return $num_rows;
             // check if email already exists
         }

         function step1($package,$country, $email, $first_name,$last_name,$password,$city,$state,$postal_code,$gender,$dob, $month,$day,$year,$here_for)
         {

                
             // create the account
                $sql="insert into members";
                $sql.="(member_name";
                $sql.=", member_lname";
                $sql.=", member_email";
                $sql.=", member_password";
                $sql.=", gender";
                $sql.=", dob";
                $sql.=", birth_day";
                $sql.=", birth_month";
                $sql.=", birth_year";
                $sql.=", country";
                $sql.=", city";
                $sql.=", current_state";
                $sql.=", zip_code";
                $sql.=", email_verify";
                $sql.=", pack_id";
                $sql.=", here_for";
                $sql.=", flag)";
                $sql.=" values('$first_name'";
                $sql.=", '$last_name'";
                $sql.=", '$email'";
                $sql.=", '$password'";
                $sql.=", '$gender'";
                $sql.=", '$dob'";
                $sql.=", '$day'";
                $sql.=", '$month'";
                $sql.=", '$year'";
                $sql.=", '$country'";
                $sql.=", '$city'";
                $sql.=", '$state'";
                $sql.=", '$postal_code'";
                $sql.=", '0'";
                $sql.=", '$package'";
                $sql.=", '$here_for'";
                $sql.=", '0')";

                $res=mysql_query($sql);
                print mysql_error();
                $user_id=mysql_insert_id();


/*
                if(!$res)
                {
                    $user_id=0;
                }
             // create the account
             
             if($user_id!=0)
             {
                $join_on=time();

                $new_password = stripslashes($password);
                $new_password = md5($new_password);

                $sql="insert into phpbb_users";
                $sql.="(user_id,";
                $sql.="user_active, ";
                $sql.="username, ";
                $sql.="user_password, ";
                $sql.="user_regdate, ";
                $sql.="user_level, ";
                $sql.="user_email)";
                $sql.=" values($user_id,";
                $sql.="1,";
                $sql.="'$email',";
                $sql.="'$new_password',";
                $sql.="'$join_on',";
                $sql.=" 0,";
                $sql.="'$email')";
                $result1=mysql_query($sql);
                print mysql_error();
            }
*/
            return $user_id;
         }
         
         function send_verification_email($first_name, $email,$password,$verify_code,$email_name,$site_email, $site_name, $site_url)
         {
          // E-Mail Code
          $to= "$first_name <$email>";
          $subject1= "Welcome to $site_name";
          $message= "<html><head><title>Welcome to $site_name</title></head>";
          $message.="<body>";
          $message.="<p>Dear $first_name,</p>";
          $message.="<p>Thank you for joining <a href='$site_url' target='_blank'>$site_name</a>.</p>";
          $message.="<p>With $site_name you can do following :</p>";
          $message.="<ul>";
          $message.="<li>Connect with your friends from your high school.</li>";
          $message.="<li>Connect with your friends from your company.</li>";
          $message.="<li>Connect with your friends who are in your friend list.</li>";
          $message.="<li>Connect with your friends friends and so on.</li>";
          $message.="<li>Send messages to your friends.</li>";
          $message.="<li>Forward your friends a friends profile's.</li>";
          $message.="<li>Manage your address book.</li>";
          $message.="<li>Manage your message board.</li>";
          $message.="<li>And much more...</li>";
          $message.="</ul>";
          $message.="<hr><p>Your login information is as below :</p>";
          $message.="<p>User Name : $email</p>";
          $message.="<p>Password : $password</p>";
          $message.="<hr><p>Please click below to verify your email :</p>";
          $message.="<p><a href='$site_url/email_verify.php?code=$verify_code'>$site_url/email_verify.php?code=$verify_code</a></p>";
          $message.="<p>Regards,</p>";
          $message.="<p>$site_name.com Team</p>";
          $message.="<p>Note :- You have received this email because you signed up with our website <a href='$site_url'>$site_url</a></p>";
          $message.="</body></html>";
          
          $headers  = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
          $headers .= "From: $email_name <$site_email>";
          $result_mail=mail($to,$subject1,$message,$headers);
         }
         
         function music_step1($country,$email,$band_name,$password,$postal_code,$genre)
         {

             // create the account
                $sql="insert into members";
                $sql.="(member_name";
                $sql.=", member_email";
                $sql.=", member_password";
                $sql.=", country";
                $sql.=", zip_code";
                $sql.=", genre";
                $sql.=", email_verify";
                $sql.=", music";
                $sql.=", flag)";
                $sql.=" values('$band_name'";
                $sql.=", '$email'";
                $sql.=", '$password'";
                $sql.=", '$country'";
                $sql.=", '$postal_code'";
                $sql.=", $genre";
                $sql.=", '0'";
                $sql.=", '1'";
                $sql.=", '0')";
	
                $res=mysql_query($sql);
                print mysql_error();
                $user_id=mysql_insert_id();
                
                $sql="insert into music_profile";
                $sql.="(member_id)";
                $sql.=" values($user_id)";
                $ins=mysql_query($sql);

                return $user_id;
         }

         function music_step2($user_id, $username,$genre1,$genre2,$genre3,$url,$label, $gabelType,$here_for)
         {


             // create the account
                $sql="insert into music_member_profile";
                $sql.="(user_id";
                $sql.=", user_name";
                $sql.=", genre1";
                $sql.=", genre2";
                $sql.=", genre3";
                $sql.=", website";
                $sql.=", here_for";
                $sql.=", label";
                $sql.=", label_type)";
                $sql.=" values($user_id";
                $sql.=", '$username'";
                $sql.=", $genre1";
                $sql.=", $genre2";
                $sql.=", $genre3";
                $sql.=", '$url'";
                $sql.=", '$here_for'";
                $sql.=", '$label'";
                $sql.=", '$gabelType')";
                

                $res=mysql_query($sql);
                print mysql_error();
                $user_id=mysql_insert_id();

                return $user_id;
         }

     }
?>
