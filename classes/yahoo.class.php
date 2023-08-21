<?php
/*
  yahoo.class.php
  The class used to import address from yahoo.
  Author Ankur Jain (ankurjain@vastal.com)
  version 0.9.9
  created on 25/12/2005
  
  Copyright Vastal I-Tech & Co. (www.vastal.com)
  All rights reserved.

  This software is the confidential and proprietary property of Vastal I-Tech & Co.. ("Confidential Information").
  You shall not disclose such Confidential Information and
  shall use it only in accordance with the terms of the license agreement
  you entered into with Vastal I-Tech & Co..
*/

     // class for importing contacts from yahoo
        class yahoo_import
        {
         function gen_random()
         {
	         mt_srand((double)microtime()*100000);
	         $num1=mt_rand(65,90);
	         $num2=mt_rand(97,122);
	         $num3=mt_rand(65,90);
	         $num4=mt_rand(48,57);
	         $num5=mt_rand(48,57);
	         $num6=mt_rand(65,90);
	         $num7=mt_rand(97,122);
	         $num8=mt_rand(97,122);
	         $ram1=chr($num1);
	         $ram2=chr($num2);
	         $ram3=chr($num3);
	         $ram4=chr($num4);
	         $ram5=chr($num5);
	         $ram6=chr($num6);
	         $ram7=chr($num7);
	         $ram8=chr($num8);
             $fname="$ram1$ram2$ram3$ram4$ram5";
	         return $fname;
          }
            // function to open curl
            function run_curl($url,$cookie="",$post="",$ref="")
            {
            	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_USERAGENT, $agent);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
                curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
                if($ref!=Null)
                {
                 curl_setopt($ch, CURLOPT_REFERER, $ref);
                }

                $result = curl_exec ($ch);
                curl_close ($ch);

                return $result;
             }


            // function to login to the gmail
            function login($user_name,$password,$file_location)
            {
                $file_name=$this->gen_random();
                $file_name=$file_name.".txt";
                $file_path=$file_location.$file_name;
                //print $file_path;

                // login to gmail

                      $login_url = "https://login.yahoo.com/config/login?";
                      $post = ".tries=1";
                      $post.= "&.src=ab";
                      $post.= "&.md5=";
                      $post.= "&.hash=";
                      $post.= "&.js=";
                      $post.= "&.last=";
                      $post.= "&promo=";
                      $post.= "&.intl=us";
                      $post.= "&.bypass=";
                      $post.= "&.partner=";
                      $post.= "&.u=cs72ge91qtm8a";
                      $post.= "&.v=0";
                      $post.= "&.challenge=._6T6TGvRS12FpLPBmF1nArpPAh5";
                      $post.= "&.yplus=";
                      $post.= "&.emailCode=";
                      $post.= "&pkg=";
                      $post.= "&stepid=";
                      $post.= "&.ev=";
                      $post.= "&hasMsgr=0";
                      $post.= "&.chkP=Y";
                      $post.= "&.done=http://address.yahoo.com/yab/us?.rand=2131087509&v=SA";
                      $post.= "&login=$user_name";
                      $post.= "&passwd=$password";
                      $post.="&.persistent=y";
                      $post.="&null=Sign in";
                      $ref = "http://www.yahoo.com/";

                      $get_res=$this->run_curl($login_url,$file_path,$post,$ref);

                         //print $get_res;
	                     if(strpos($get_res, "yregertxt") > 0)
                         {
                             return "invalid login";
                         }
	                     else
                         {
                            return $file_name;
                            // go to contacts page
                         }
                // login to gmail


            }
            // function to login to the gmail



            function run_curl_after_login($url,$cookie="",$post="",$ref="")
            {
            	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_USERAGENT, $agent);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
                curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
                if($res!=Null)
                {
                 curl_setopt($ch, CURLOPT_REFERER, $ref);
                }

                $result = curl_exec ($ch);
                curl_close ($ch);
                return $result;
             }

             function get_emails($file_name,$file_location,$site_url,$sess_id,$member_id)
             {
                 $gmail=new yahoo_import;
                 $file_path=$file_location.$file_name;

                               $url="http://address.yahoo.com/yab/us/Yahoo.csv?.rand=1756952029&A=Y&Yahoo.csv";
                               $post="Yahoo=Export Now";
                               $get_res=$gmail->run_curl_after_login($url,$file_path,$post);
                               //print $get_res;

                               $file_name="temp_".$file_name.".csv";
                               $file=$file_location.$file_name;
                               $fp=fopen($file, "w");
                               fwrite($fp,$get_res);
                               fclose($fp);


                               $file_url=$file_location.$file_name;
                               $sr_no=0;

                               $file_handle=fopen($file_url, "r");
                               $buffer=fgets($file_handle);
                               $date=$buffer;
                               
                               while ($data = fgetcsv ($file_handle, 1000, ","))
                               {
                                   if($sr_no>0)
                                   {
                                       $first_name=trim($data[0]);
                                       $middle_name=trim($data[1]);
                                       $last_name=trim($data[2]);
                                       $nick_name=trim($data[3]);
                                       $email=trim($data[4]);
                                       $mess_id=trim($data[7]);

                                       if($email==Null)
                                       {
                                        $email=$mess_id."@yahoo.com";
                                       }

                                         // insert into database
                                              $sql="select count(*) as a from address_book where member_id = $member_id and email like '$email'";
                                              $res=mysql_query($sql);
                                              $data_set=mysql_fetch_array($res);
                                              
                                              if($data_set["a"]==0)
                                              {

                                                  $sql="insert into address_book";
                                                  $sql.="(member_id, ";
                                                  $sql.=" name, ";
                                                  $sql.=" email)";
                                                  $sql.="values ($member_id,";
                                                  $sql.=" '$first_name',";
                                                  $sql.=" '$email')";
                                                  $result=mysql_query($sql);
                                                  
                                                  /*
                                                  $sql="insert into yahoo_mails";
                                                  $sql.="(sess_id";
                                                  $sql.=", first_name";
                                                  $sql.=", middle_name";
                                                  $sql.=", last_name";
                                                  $sql.=", nick_name";
                                                  $sql.=", email";
                                                  $sql.=", mess_id)";
                                                  
                                                  $sql.=" values('$sess_id'";
                                                  $sql.=", '$first_name'";
                                                  $sql.=", '$middle_name'";
                                                  $sql.=", '$last_name'";
                                                  $sql.=", '$nick_name'";
                                                  $sql.=", '$email'";
                                                  $sql.=", '$mess_id')";
                                                  */
                                                  
                                                  $res=mysql_query($sql);
                                              }

                                         // insert into database
                                   }
                                   $sr_no=$sr_no+1;
                               }



                                  // parse it for contacts

                                  unlink($file_path);
                                  unlink($file);


                                  return 1;

                               //print $get_res;
             }

             function display_emails($sess_id)
             {
                 $sql="select * from yahoo_mails where sess_id = '$sess_id'";
                 $res=mysql_query($sql);
                 $sr_no=1;
                 while($data_set=mysql_fetch_array($res))
                 {
                         print "<br>-------------------------------------<br>";
                         print "<b>Email #</b> $sr_no";
                         print "<br>";
                         print "<b>Name:</b> $data_set[first_name]&nbsp;$data_set[middle_name]&nbsp;$data_set[last_name]";
                         print "<br>";
                         print "<b>Email:</b> $data_set[email]";
                         print "<br>";
                         print "<b>Messanger ID:</b> $data_set[mess_id]";
                         $sr_no=$sr_no+1;
                 }
             }
        }
     // class for importing contacts from gmail
?>
