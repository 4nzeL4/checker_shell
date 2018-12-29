<?php 
	echo "-----------------------------------------\n";
	echo "|Thanks to: IndoSec               	   |\n";
	echo "|Coded By : Akazh						   |\n";
	echo "-----------------------------------------\n\n";
	echo "Masukan list: ";
	
	$input = trim(fgets(STDIN));
	$list = file_get_contents($input);

	$file = explode("\r\n", $list);

	foreach ($file as $shell) {
		
		echo "\n[+]Checking ...\n";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $shell);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$x = curl_exec($ch);
		curl_close($ch);
				
		if (preg_match('/200 OK/', $x)) {
			echo "\n[+] Shell Found!\n => $shell\n\n";
		}
		else{
			echo "[-] Shell tidak di temukan!\n";
		}
	}
?>