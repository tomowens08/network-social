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

include("hotmaillogin.class.php");

class hotmail_imports
{
    var $passport;
    var $password;
    var $time;
    var $result;
    var $list = Array("Allow" => NULL, "Block" => NULL, "Foward" => NULL, "Reverse" => NULL);
    var $listCount = Array("Allow" => 0, "Block" => 0, "Foward" => 0, "Reverse" => 0);
    var $_timer;
    var $_socket;
    var $_totalLsts;
    var $_receivedLsts;

    function hotmail_imports()
    {
        $this->_startTimer();
    }

    function Grab($server = "messenger.hotmail.com")
    {
        $this->_socket = fsockopen($server, 1863);
        $this->_sendData("VER 0 MSNP8");

        while (!feof($this->_socket)) {
            $data = substr(fgets($this->_socket, 1024), 0, -2);
            $this->_processData($data);
        }

        if($server != "messenger.hotmail.com" && $this->result == NULL) {
            $this->result = "ERR_SERVER_UNAVAILABLE";
        }

        $this->_endTimer();
    }

    function _sendData($data)
    {
        fputs($this->_socket, $data."\r\n");
    }

    function _processData($data)
    {
        $params = explode(" ", $data);

        switch ($params[0]) {
            case "VER":
                $this->_sendData("CVR 1 0x0409 winnt 5.1 i386 MSNMSGR 6.0.0254 MSMSGS ".$this->passport);
                break;

            case "CVR":
                $this->_sendData("USR 2 TWN I ".$this->passport);
                break;

            case "XFR":
                $subparams = explode(":", $params[3]);
                $this->Grab($subparams[0]);
                break;

            case "USR":
                if ($params[2] == "TWN") {
                    $msnpauth = new hotmail_login($this->passport, $this->password, $params[4]);
                    $hash = $msnpauth->getKey();

                    if (!$hash) {
                        $this->result = "Invalid passport or password";
                        $this->_sendData("OUT");
                        return false;
                    }

                    $this->_sendData("USR 3 TWN S ".$hash);

                } elseif ($params[2] == "OK") {
                    $this->_sendData("SYN 4 0");
                }
                break;

            case "SYN":
                $this->_totalLsts = $params[3];
                break;

            case "LST":
                $this->_receivedLsts++;

                if (($params[3] & 2) > 0) {
                    $this->listCount["Allow"]++;
                    $this->list["Allow"][$params[1]]["Email"] = $params[1];
                    $this->list["Allow"][$params[1]]["FriendlyName"] = $params[2];
                }

                if (($params[3] & 1) > 0) {
                    $this->listCount["Foward"]++;
                    $this->list["Foward"][$params[1]]["Email"] = $params[1];
                    $this->list["Foward"][$params[1]]["FriendlyName"] = $params[2];
                }

                if (($params[3] & 4) > 0) {
                    $this->listCount["Block"]++;
                    $this->list["Block"][$params[1]]["Email"] = $params[1];
                    $this->list["Block"][$params[1]]["FriendlyName"] = $params[2];
                }

                if (($params[3] & 8) > 0) {
                    $this->listCount["Reverse"]++;
                    $this->list["Reverse"][$params[1]]["Email"] = $params[1];
                    $this->list["Reverse"][$params[1]]["FriendlyName"] = $params[2];
                }

                if ($this->_totalLsts == $this->_receivedLsts) {
                    $this->_sendData("OUT");
                    $this->result = "OK";
                }
                break;
        }
    }

    function _startTimer()
    {
        $mtime = microtime();
        $mtime = explode (" ", $mtime);
        $mtime = $mtime[1] + $mtime[0];
        $this->_timer = $mtime;
    }

    function _endTimer()
    {
        $mtime = microtime();
        $mtime = explode (" ", $mtime);
        $mtime = $mtime[1] + $mtime[0];
        $endtime = $mtime;
        $totaltime = round(($endtime - $this->_timer), 5);
        $this->time = $totaltime;
    }
}
