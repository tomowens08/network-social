<?php
     // class for emails
        class emails
        {
            function send_message_notification($member_id,$member_email,$site_url,$site_name,$from_name,$from_email)
            {
                    $sql="select * from members where member_id = $member_id";
                    $res=mysql_query($sql);
                    $data_set=mysql_fetch_array($res);
                    $to=$member_email;
                    $subject="A new message posted for you on $site_name";

                    $message = "<html><head><title>$site_name</title></head><body>";
                    $message.= "<p>Dear $data_set[member_name]&nbsp;$data_set[member_lname],<br>&nbsp;<br>";
                    $message.= "A new message was sent to you on $site_name. ";
                    $message.= "Please login to your account to check the message.";
                    $message.= "<br><br><b>Privacy -</b><br> Your privacy is extremely important to us. We do not sell or give your information to anybody without your permission. <br>";
                    $message.= "&nbsp;<br>Please click here to see our <u><a href='$site_url/privacy_policy.php' target='_blank'>Privacy Policy</a></u>.<br>";
                    $message.= "&nbsp;<br>$site_name First Russian Friends Network - Free Profiles - Video Blogs - Image Video Hosting - Connect to Friends, or meet new ones!<br>";
                    $message.= "&nbsp;<br>&nbsp;<br>Thank you,<br>";
                    $message.= "&nbsp;<br>$site_name Team<br></p>";
                    $message.= "</body></html>";

                    $headers  = "From:$from_name <$from_email>\r\n". "Content-Type: text/html; charset=ISO-8859-1\r\n". "Return-Path: <$from_email>\n";
                    mail($to, $subject, $message, $headers);
            }

            function send_bulletin_notification($member_id,$member_name,$member_email,$site_url,$site_name,$from_name,$from_email)
            {
                    $to=$member_email;
                    $subject="A new journal message posted for you on $site_name";

                    $message = "<html><head><title>$site_name</title></head><body>";
                    $message.= "<p>Dear $data_set[member_name]&nbsp;$data_set[member_lname],<br>&nbsp;<br>";
                    $message.= "A new journal message from one of your approved friends was sent to you on $site_name. ";
                    $message.= "Please login to your account to read your friends journal.";
                    $message.= "<br><br><b>Privacy -</b><br> Your privacy is extremely important to us. We do not sell or give your information to anybody without your permission.<br>";
                    $message.= "&nbsp;<br>Please click here to see our <u><a href='$site_url/privacy_policy.php' target='_blank'>Privacy Policy</a></u>.<br>";
                    $message.= "&nbsp;<br>$site_name Free Profiles - Video Blogs - Image Video Hosting - Connect to Friends, or meet new ones!<br>";
                    $message.= "&nbsp;<br>&nbsp;<br>Thank you,<br>";
                    $message.= "&nbsp;<br>$site_name Team<br></p>";
                    $message.= "</body></html>";

                    $headers  = "From:$from_name <$from_email>\r\n". "Content-Type: text/html; charset=ISO-8859-1\r\n". "Return-Path: <$from_email>\n";
                    mail($to, $subject, $message, $headers);
                    
                    return 1;
            }

            function send_group_add_notification($member_id,$creator_name,$creator_email,$member_name,$member_email,$site_url,$site_name,$from_name='$site_name',$from_email='support@$site_name')
            {
                    $to=$member_email;
                    $subject = "A new membership invitation posted for you on $site_name";

                    $message = "<html><head><title>$site_name</title></head><body>";
                    $message.= "<p>Dear $member_name,<br>&nbsp;<br>";
                    $message.= "A $creator_name has added you to their group on $site_name.<br>";
                    $message.= "You may contact $creator_name at $creator_email.<br>";
                    $message.= "Please login to your account to check the group.<br>";
                    $message.= "<br><br><b>Privacy -</b> <br>Your privacy is extremely important to us. We do not sell or give your information to anybody without your permission.<br>";
                    $message.= "&nbsp;<br>Please click here to see our <u><a href='$site_url/privacy_policy.php' target='_blank'>Privacy Policy</a></u>.<br>";
                    $message.= "&nbsp;<br>Free Profiles - Video Blogs - Image Video Hosting - Connect to Friends, or meet new ones!<br>";
                    $message.= "&nbsp;<br>&nbsp;<br>Thank you,<br>";
                    $message.= "&nbsp;<br>$site_name Team<br></p>";
                    $message.= "</body></html>";

								 		 $h = '';
										 $h .= "From:$site_name <support@site_name>\r\n";
										 $h .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
										 $h .= "Return-Path: <support@$site_name>\n";
								     mail($to, $subject, $message, $h);

                    return 1;
            }

        }
     // class for emails
?>
