<?php
/// -----------------------------------------------------------------------------
/// Copyright 2006-2010, Svetlozar Petrov. All rights reserved.
/// http://svetlozar.net
///
/// Confidential and Proprietary, Not For Public Release.
///
/// No redistribution allowed without prior permission (see licence for details)
/// The above notice must remain unmodified in every source code file
/// -----------------------------------------------------------------------------

require_once 'SPContacts.base.php';

class Yahoo extends SPContacts
{
	public $accept_screenname = false; //!< if true, screen names will be converted to email addresses by adding the screenname domain
	public $screenname_domain = "yahoo.com";

	public function __get($name)
	{
		return parent::__get($name);
	}

	protected function GetContactsData()
	{
		if ((isset($this->username) && trim($this->username)=="") || (isset($this->password) && trim($this->password)==""))
		{
			$this->Error = ContactsResponses::ERROR_NO_USERPASSWORD;
			return false;
		}

		$this->client->get("http://address.yahoo.com");
		if (!preg_match_all('/<input type\="hidden" name\="([^"]+)" value\="([^"]*)">/si', $this->client->http_response_body, $matches))
		{
			$this->Error = ContactsResponses::ERROR_UNKNOWN;
			return false;
		}

		$params = array_combine($matches[1], $matches[2]);
		$params['login'] = $this->username;
		$params['passwd'] = $this->password;

		//! attempt login
		$this->client->post("http://login.yahoo.com/config/login?", $params);

		if ($this->client->get_simple_cookie('F') == null)
		{
			$this->Error = ContactsResponses::ERROR_INVALID_LOGIN;
			return false;
		}

		$params = array();
		$params[".src"] = "";
		$params["VPC"] = "print";
		$params["field[allc]"] = "1";
		$params["field[catid]"] = "0";
		$params["field[style]"] = "quick";
		$params["submit[action_display]"] = "Display for Printing";

		$url = "http://address.yahoo.com/?_src=&VPC=tools_print";
		if(!$this->client->post($url, $params))
		{
			$this->Error = ContactsResponses::ERROR_UNKNOWN;
			return false;
		}
		else
		{
			$this->RawSource = $this->client->http_response_body;
			return true;
		}
	}

	protected function ParseContactsData()
	{
		if (preg_match_all('/(?><table class="qprintable2"[^>]*>)(.+?)(?><\/table>)/si', $this->RawSource, $tableM))
		{
			foreach ($tableM[0] as $m)
			{
				$name = $email = "";
				if(preg_match('/(?><tr class="phead">)(.*?)<\/tr>(?>.*?<tr>)((?>[^@]+)@[^<]+)/si', $m, $rowM))
				{
					if(preg_match('/(?:<b>(.*?)<\/b>)[^<]*(?:<small>(.*?)<\/small>)?/si', $rowM[1], $nameM))
					{
						$name = trim($nameM[1]);
						if (isset($nameM[2]) && $name == "")
						{
							$name = isset($nameM[2]) ? trim($nameM[2]) : "";
						}
					}

					if(preg_match('/>((?>[^>@]+)@[^<]+)/si', $rowM[2], $emailM))
					{
						$email = $emailM[1];
						if ($name == "")
						{
							$name = current(explode("@", $email));
						}
					}
				}
				else if ($this->accept_screenname && preg_match('/(?><tr class="phead">)(.*?)<\/tr>(?>.*?<tr>)/si', $m, $rowM))
				{
					if(preg_match('/(?:<b>(.*?)<\/b>)[^<]*(?:<small>(.*?)<\/small>)?/si', $rowM[1], $nameM))
					{
						$name = trim($nameM[1]);
						if (isset($nameM[2]) && $name == "")
						{
							$name = trim($nameM[2]);
						}

						if (isset($nameM[2]) && trim($nameM[2]) != "")
						{
							$email = trim($nameM[2]) . "@" . $this->screenname_domain;
						}
					}

					if(preg_match('/>((?>[^>@]+)@[^<]+)/si', $rowM[1], $emailM))
					{
						$email = $emailM[1];
						if ($name == "")
						{
							$name = current(explode("@", $email));
						}
					}
				}

				$this->__add_contact_item($name, $email);
			}
		}

		if ($this->ContactsCount)
		{
			return true;
		}

		$this->Error = ContactsResponses::ERROR_NO_CONTACTS;
		return false;
	}
}
?>