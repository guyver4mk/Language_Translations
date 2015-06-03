<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(E_ALL);
ini_set('memory_limit','1G');


include(realpath(dirname(__FILE__).'/../').'/includes/configuration.php');
include(realpath(dirname(__FILE__).'/../').'/includes/lang/language.php');
include('cURL.php');

class Lang
{
	private $_gb;
	private $_lang = array();
	private $_db;
	private $_versions;
	private $_updates;
	private $_gb_version;

	public function __construct($list=null)
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
		if($list==null || !is_array($list))
		{
			$this->_updates = array('en','de','fr','pl','ru','it');		
		}
		else
		{
			$this->_updates = $list;
		}

		$this->getLang();
		return "Languages Updated";	

	}

	private function getLang()
	{

		$str = '<?php '."\n\n".'$lang = array();'."\n\n";

		/*
			Each of the shortcodes which have been specified then need to be mapped
			to the relevent ISO 3166-1 language code.
			A list of current codes can be found here http://en.wikipedia.org/wiki/ISO_3166-1#Current_codes
		*/
		foreach($this->_updates as $l)
		{

			if($l == 'en')
			{
				$name = 'en_GB';
			}
			elseif($l == 'sq')
			{
				$name = "sq_SQ";
				
			}
			elseif($l == 'ar')
			{
				$name = "ar_AR";
				
			}
			elseif($l == 'hy')
			{
				$name = "hy_HY";
				
			}
			elseif($l == 'az')
			{
				$name = "az_AZ";
				
			}
			elseif($l == 'be')
			{
				$name = "be_BE";
				
			}
			elseif($l == 'bs')
			{
				$name = "bs_BS";
				
			}
			elseif($l == 'bg')
			{
				$name = "bg_BG";
				
			}
			elseif($l == 'ca')
			{
				$name = "ca_CA";
				
			}
			elseif($l == 'zh')
			{
				$name = "zh_ZH";
				
			}
			elseif($l == 'hr')
			{
				$name = "hr_HR";
				
			}
			elseif($l == 'cs')
			{
				$name = "cs_CS";
				
			}
			elseif($l == 'da')
			{
				$name = "da_DA";
				
			}
			elseif($l == 'nl')
			{
				$name = "nl_NL";
				
			}
			elseif($l == 'et')
			{
				$name = "et_ET";
				
			}
			elseif($l == 'fi')
			{
				$name = "fi_FI";
				
			}
			elseif($l == 'fr')
			{
				$name = "fr_FR";
				
			}
			elseif($l == 'ka')
			{
				$name = "ka_KA";
				
			}
			elseif($l == 'de')
			{
				$name = "de_DE";
				
			}
			elseif($l == 'el')
			{
				$name = "el_EL";
				
			}
			elseif($l == 'he')
			{
				$name = "he_HE";
				
			}
			elseif($l == 'hu')
			{
				$name = "hu_HU";
				
			}
			elseif($l == 'is')
			{
				$name = "is_IS";
				
			}
			elseif($l == 'id')
			{
				$name = "id_ID";
				
			}
			elseif($l == 'it')
			{
				$name = "it_IT";
				
			}
			elseif($l == 'ja')
			{
				$name = "ja_JA";
				
			}
			elseif($l == 'ko')
			{
				$name = "ko_KO";
				
			}
			elseif($l == 'lv')
			{
				$name = "lv_LV";
				
			}
			elseif($l == 'lt')
			{
				$name = "lt_LT";
				
			}
			elseif($l == 'mk')
			{
				$name = "mk_MK";
				
			}
			elseif($l == 'ms')
			{
				$name = "ms_MS";
				
			}
			elseif($l == 'mt')
			{
				$name = "mt_MT";
				
			}
			elseif($l == 'no')
			{
				$name = "no_NO";
				
			}
			elseif($l == 'fa')
			{
				$name = "fa_FA";
				
			}
			elseif($l == 'pl')
			{
				$name = "pl_PL";
				
			}
			elseif($l == 'pt')
			{
				$name = "pt_PT";
				
			}
			elseif($l == 'ro')
			{
				$name = "ro_RO";
				
			}
			elseif($l == 'ru')
			{
				$name = "ru_RU";
				
			}
			elseif($l == 'sr')
			{
				$name = "sr_SR";
				
			}
			elseif($l == 'sk')
			{
				$name = "sk_SK";
				
			}
			elseif($l == 'sl')
			{
				$name = "sl_SL";
				
			}
			elseif($l == 'es')
			{
				$name = "es_ES";
				
			}
			elseif($l == 'sv')
			{
				$name = "sv_SV";
				
			}
			elseif($l == 'tt')
			{
				$name = "tt_TT";
				
			}
			elseif($l == 'th')
			{
				$name = "th_TH";
				
			}
			elseif($l == 'tr')
			{
				$name = "tr_TR";
				
			}
			elseif($l == 'uk')
			{
				$name = "uk_UK";
				
			}
			elseif($l == 'vi')
			{
				$name = "vi_VI";
				
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

		$url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key='.$api_key.'&lang='.$lang.'&text='.$text;

		$response = $cc->get($url);
	
		return $response;
	}
}

$l = new Lang();
