#!bin/bash
# Web Path = Path to Lang Directory on Server to store array.
web_path=$1
config_file=$2

search='define("LANG_DIR",null);'
replace='define("LANG_DIR",'
replace="$replace \"$config_file\");"

echo "s@$search@$replace@g" > $PWD/includes/sar.txt

case "$PWD" in 
	*guyver4mk/language_translate*) 
		echo "Using Directory $web_path as Install Directory"
		api_key=$(cat $PWD/includes/lang/api_key.txt)

		php classes/Lang.php $web_path $api_key
		echo "Updating Configuration File"
		sed -i -f "$PWD/includes/sar.txt"  $config_file;;
	*) 
		echo "You Must run this command from the vendor folder.";;
esac