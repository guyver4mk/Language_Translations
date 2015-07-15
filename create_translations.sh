#!bin/bash
# local_path = Path to the Lang Folder
# Web Path = Directory on Server to store array.
local_path = $1
web_path = $2

php $local_path/language.php $2
