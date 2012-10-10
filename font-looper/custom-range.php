<?php
	if(isset($_GET['range_start'])  && is_numeric($_GET['range_start']) && isset($_GET['range_end']) && is_numeric($_GET['range_end'])){
		if(($_GET['range_end'] - $_GET['range_start']) > 500){
			$limited_range_end = $_GET['range_start'] + 500;
		}else{
			$limited_range_end = $_GET['range_end'];
		}
		$custom_char = range($_GET['range_start'],$limited_range_end);
		
		$all_chars = array();
		foreach($custom_char as $i){
			$all_chars[$i] = mb_convert_encoding(pack('n', $i), 'UTF-8', 'UTF-16BE');
		}
	}
	
	foreach($all_chars as $i => $k){
		echo "<div>",$k,'<span data-unicode=\'',str_pad(dechex($i),4,0,STR_PAD_LEFT),'\'>',$k,"</span></div>";		
	}
	

?>