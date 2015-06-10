# Language Translations
A PHP Class to create a static array of translations, to use on your website

##General Usage
Pull the latest code or Download the Zip  file, then  add to your project.
<br />
You will need to register for a free API Key from [Here](http://api.yandex.com/key/form.xml?service=trnsl)
<br />
In `includes/configuration.php` file, Change the API Key to the one you receive from Yandex, and change the `LANG_PATH` definition to a world writable folder for your file to be output to.
<br />
Then you can open and edit the `includes/lang/language.php` file, with the array of sentences / paragraphs / words you would like to translate.
<br />
Once you have created your array of phrases, simply call the `classes/Lang.php` file from your browser or your command line ( `php classes/Lang.php` )
to create your static array.

##Currently Supported Languages
Here is a list of the currently supported languages using this method;

          
|Language Code|Language|
|---------|---------|---------|
|sq|Albanian|
|ar|Arabic|
|hy|Armenian|
|az|Azerbaijani|
|be|Belarusian|
|bs|Bosnian|
|bg|Bulgarian|
|ca|Catalan|
|zh|Chinese|
|hr|Croatian|
|cs|Czech|
|da|Danish|
|nl|Dutch|
|et|Estonian|
|fi|Finnish|
|fr|French|
|ka|Georgian|
|de|German|
|el|Greek|
|he|Hebrew|
|hu|Hungarian|
|is|Icelandic|
|id|Indonesian|
|it|Italian|
|ja|Japanese|
|ko|Korean|
|lv|Latvian|
|lt|Lithuanian|
|mk|Macedonian|
|ms|Malay|
|mt|Maltese|
|no|Norwegian|
|fa|Persian|
|pl|Polish|
|pt|Portuguese|
|ro|Romanian|
|ru|Russian|
|sr|Serbian|
|sk|Slovak|
|sl|Slovenian|
|es|Spanish|
|sv|Swedish|
|tt| Tatar|
|th|Thai|
|tr|Turkish|
|uk|Ukrainian|
|vi|Vietnamese|
