<?php
/*
  hotmail.class.php
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

class hotmail_login
{
    var $_cURL_val;
    var $key_val;

    function hotmail_login($passport, $password, $challenge)
    {
        // check the email address provided
        $i = strpos($passport, "@");
        switch (substr($passport, $i))
        {
            case "@hotmail.com":
                $authURL = "https://loginnet.passport.com/login2.srf";
                break;
            case "@msn.com":
                $authURL = "https://msnialogin.passport.com/login2.srf";
                break;
            default:
                $authURL = "https://login.passport.com/login2.srf";
                break;
        }

        $this->cURL_val = curl_init();
        curl_setopt ($this->cURL_val, CURLOPT_URL, $authURL);
        curl_setopt ($this->cURL_val, CURLOPT_HEADERFUNCTION, "Vastal_read_header");
        curl_setopt ($this->cURL_val, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt ($this->cURL_val, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($this->cURL_val, CURLOPT_HTTPHEADER, Array("Authorization: Passport1.4 OrgVerb=GET,OrgURL=http%3A%2F%2Fmessenger%2Emsn%2Ecom, sign-in=".str_replace("@", "%40", $passport).",pwd=".urlencode($password).",lc=1033,id=507,tw=40,fs=1, ru=http%3A%2F%2Fmessenger%2Emsn%2Ecom,ct=1061523064,kpp=1,kv=5, ver=2.1.0173.1,tpf=".$challenge));
        curl_setopt ($this->cURL_val, CURLOPT_HEADER, 0);
    }

    function getKey()
    {
        curl_exec($this->cURL_val);
        curl_close($this->cURL_val);
        $this->key_val = $GLOBALS["Vastal_Key"];
        unset($GLOBALS["Vastal_Key"]);
        return $this->key_val;
    }
}

function Vastal_read_header($cURL, $header)
{
    $i = strpos($header, ":");

    switch (substr($header, 0, $i)) {
        case "WWW-Authenticate":
            $GLOBALS["Vastal_Key"] = false;
            break;

        case "Authentication-Info":
            $value = substr($header, $i + 2);
            $n = strpos($value, "'");
            $GLOBALS["Vastal_Key"] = substr($value, $n + 1, strrpos($value, "'") - $n - 1);
            break;
    }

    return strlen($header);
}
