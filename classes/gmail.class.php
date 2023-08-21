<?php
/*
  gmail.class.php
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

     // class for importing contacts from gmail
        class gmail_import
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
                $gmail=new gmail_import;
                
                $file_name=$gmail->gen_random();
                $file_name=$file_name.".txt";
                $file_path=$file_location.$file_name;
                //print $file_path;
                
                // login to gmail

                      $login_url = "https://www.google.com/accounts/ServiceLoginAuth";
                      $post = "continue=http://mail.google.com/mail/?";
                      $post.= "&service=mail";
                      $post.= "&rm=false";
                      $post.= "&Email=$user_name";
                      $post.= "&Passwd=$password";
                      $post.="&PersistentCookie=yes";
                      $post.="&null=Sign in";
                      $ref = "https://www.google.com/accounts/ServiceLoginBox?service=mail&continue=https://gmail.google.com/gmail";

                      $get_res=$gmail->run_curl($login_url,$file_path,$post,$ref);

                         //print $get_res;
	                     if(strpos($get_res, "errormsg") > 0)
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
             
             function get_emails($file_name,$file_location,$site_url,$sess_id)
             {
                 $gmail=new gmail_import;
                 $file_path=$file_location.$file_name;
                 
                               $url="http://mail.google.com/mail/h/1jy6m9yr119w9/?pnl=a&v=cl";
                               $get_res=$gmail->run_curl_after_login($url,$file_path);
                               //print $get_res;

                               $file_name="temp_".$file_name.".html";
                               $file=$file_location.$file_name;
                               $fp=fopen($file, "w");
                               fwrite($fp,$get_res);
                               fclose($fp);


                               $file_url=$site_url."/cookies/".$file_name;
                               $sr_no=0;
                               // get_res has the contents of the contacts page
                                  // parse it for contacts
                                     include ("htmlparser.inc");
                                     $parser = HtmlParser_ForURL ($file_url);
                                     $sr_no=0;
                                     while($sr_no!=39)
                                     {
                                      $parser->parse();
                                         $value=trim($parser->iNodeValue);
                                         if($value!=Null&&$value!=" "&&$value!="   ")
                                         {
                                          $sr_no=$sr_no+1;
                                         }
                                     }
                                     while($sr_no!=41)
                                     {
                                      $parser->parse();
                                         $value=trim($parser->iNodeValue);
                                         if($value!=Null&&$value!=" "&&$value!="   ")
                                         {
                                             if($sr_no==39)
                                             {
                                              $total_emails=$value+1;
                                             }
                                          $sr_no=$sr_no+1;
                                         }
                                     }

                                     $sr_no=1;
                                     $sr_no1=0;
                                     $contact=1;
                                     // loop till the loop variable not not (total_emails*2)-1
                                     $loop_till=($total_emails*2);
                                     $emails=array();
                                     
                                     while($sr_no<=$loop_till)
                                     {
                                         $value=trim($parser->iNodeValue);
                                         if($value!=Null && $value!=" " && (strpos($value,"-")===false))
                                         {
                                             if((strpos($value,"@")!=false))
                                             {
                                              //print "<br>";
                                              //print $sr_no;
                                              //print $value;
                                              //print "<br>";
                                                $email=$value;
                                             }
                                             else
                                             {
                                                //print "<br>";
                                                //print $sr_no;
                                                //print $value;
                                                //print "<br>";
                                                $name=$value;
                                             }
                                             
                                             if($name!="&nbsp;")
                                             {
                                              $sql="select count(*) as a from address_book where member_id = $member_id and email like '$email'";
                                              $res=mysql_query($sql);
                                              $data_set=mysql_fetch_array($res);
                                              print mysql_error();

                                              if($data_set["a"]==0)
                                              {
                                                  $sql="insert into address_book";
                                                  $sql.="(member_id, ";
                                                  $sql.=" name, ";
                                                  $sql.=" email)";
                                                  $sql.="values ($member_id,";
                                                  $sql.=" '$first_name',";
                                                  $sql.=" '$email')";
                                               $res=mysql_query($sql);
                                               print mysql_error();
                                              }
                                             }

                                              $sr_no=$sr_no+1;
                                         }
                                         $parser->parse();
                                     }

                                  // parse it for contacts
                                  unlink($file_path);
                                  unlink($file);
                                  return 1;

                               //print $get_res;
             }
             
             function display_emails($sess_id)
             {
                 $sql="select * from gmail_mails where sess_id = '$sess_id'";
                 $res=mysql_query($sql);
                 $sr_no=1;
                 while($data_set=mysql_fetch_array($res))
                 {
                     if($data_set["email_address"]!=Null&&$data_set["email_address"]!=""&&$data_set["email_address"]!="&nbsp;")
                     {
                         print "<br>-------------------------------------<br>";
                         print "<b>Email #</b> $sr_no";
                         print "<br>";
                         print "<b>Name:</b> $data_set[email_name]";
                         print "<br>";
                         print "<b>Email:</b> $data_set[email_address]";
                         $sr_no=$sr_no+1;
                     }
                 }
             }
        }
     // class for importing contacts from gmail
?>
