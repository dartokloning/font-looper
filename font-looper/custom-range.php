<?php
	if(isset($_GET['range_start'])  && is_numeric($_GET['range_start']) && isset($_GET['range_end']) && is_numeric($_GET['range_end'])){
		$custom_char = range($_GET['range_start'],$_GET['range_end']);
		
		$all_chars = array();
		foreach($bytes as $i){
			$all_chars[$i] = mb_convert_encoding(pack('n', $i), 'UTF-8', 'UTF-16BE');
		}
	}
?>