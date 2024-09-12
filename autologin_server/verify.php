<?php
# this file gets its variables $username and $password through the file 'send_registration_to_database.php' where it is called
exec(".venv/bin/python3 is_valid_4_php.py \"".$username."\" \"".$password."\"", $is_valid_return);
if ("boolean: true" == $is_valid_return[0]) {
	$is_valid = true;
} elseif ("boolean: false" == $is_valid_return[0]) {
	$is_valid = false;
} else {
	echo "the interaction with python didnt go well. just leave this service as it is crap\n";
	echo "return string of python script: ".$is_valid_return[0]."\n";
}
?>
