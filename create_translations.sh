#!bin/bash
# Web Path = Path to Lang Directory on Server to store array.
dir_path=$(`echo pwd`);
web_path = $1

echo  $dir_path;

if[[ $dir_path == *"guyver4mk/language_translate"*]] then;
	echo true;
	#php classes/Lang.php $web_path

	#sed -i "s/define('LANG_DIR',null);/define('LANG_DIR',\'$web_path\');/g" /var/www/projects/dfcdata/2/includes/configuration.php
else
	echo "You Must run this command from the vendor folder.";
fi;

