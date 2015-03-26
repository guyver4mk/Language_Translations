<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(E_ALL);
ini_set('memory_limit','1G');


include('includes/configuration.php');
include('includes/lang/language.php');
include('classes/cURL.php');

class Lang
{
	private $_gb;
	private $_lang = array();
	private $_db;
	private $_versions;
	private $_updates;
	private $_gb_version;

	public function __construct()
	{
		// Check if array already exists
		if(file_exists(LANG_PATH.'languages.array'))
		{
			// If so, delete it.
			shell_exec('rm -f '.LANG_PATH.'/languages.array');
		}

		$gb = new languages();

		$this->_lang = $gb->getLang();

		// Specify the languages in 2 letter shortcode that you want to translate to
		$this->_updates = array('en','de','fr','pl','ru','it');

		$lang = $this->getLang();

		echo "Languages Updated";
	}


	private function getLang()
	{

		$str = '<?php '."\n\n".'$lang = array();'."\n\n";

		/*
			Each of the shortcodes which have been specified then need to be mapped
			to the relevent ISO 3166-1 language code.
		*/
		foreach($this->_updates as $l)
		{

			if($l == 'en')
			{
				$name = 'en_GB';
			}
			elseif($l == 'de')
			{
				$name = 'de_DE';
			}
			elseif($l == 'fr')
			{
				$name = 'fr_FR';
			}
			elseif($l == 'pl')
			{
				$name = 'pl_PL';
			}
			elseif($l == 'ru')
			{
				$name = 'ru_RU';
			}
			elseif($l == 'it')
			{
				$name = 'it_IT';
			}


			// Initialise the empty array to store the outputted data to
			$str .= '$lang["'.$name.'"] = array();' . "\n\n";

			
			foreach($this->_lang as $key => $val)
			{	
				// Change this dependant on your default language. I'm British-English, so I'm using en_GB :)  
				if($name=='en_GB')
				{
					$str .= '$lang["'.$name.'"]["'.$key.'"] = "'.$val.'";'. "\n";							
				}
				else
				{
					// This is where the magic happens
					$trans = $this->translateText($val, $l);
					$ttext = json_decode($trans);

					$trans_text = htmlentities($ttext->text[0],ENT_QUOTES);

					$str .= '$lang["'.$name.'"]["'.$key.'"] = "'.$trans_text.'";'. "\n";
				}
			}
		
		}

		// Take the contents of the array, and output to static file
		file_put_contents(LANG_PATH.'/languages.array', $str);

		return true; 
	}

	public function translateText($text,$lang)
	{
		$api_key = API_KEY;
		$text = urlencode($text);
		$cc = new cURL();

		$url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$api_key.'&lang=en-'.$lang.'&text='.$text;

		$response = $cc->get($url);
	
		return $response;
	}
}

$l = new Lang();
