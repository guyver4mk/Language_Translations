<?php


class languages
{

	private $_lang; 

	public function __construct()
	{

		$lang = array();

		/* 
			START OF PLANS PAGE
		*/

		$lang["en_GB"] = array();
		$lang["en_GB"]["HELLO"] = "Hello";
		$lang["en_GB"]["WELCOME_TO"] = "Welcome to my translation test site";
		$lang["en_GB"]["PLEASE_FEEL"] = "Please feel Free to take a look around";
		$lang["en_GB"]["DONT_TOUCH"] = " But don't touch anything!";


		$this->_lang = $lang;

	}

	public function getLang()
	{
		return $this->_lang["en_GB"];
		
	}

}