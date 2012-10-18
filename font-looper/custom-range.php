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
		
		foreach($all_chars as $i => $k){
			echo "<div>",$k,'<span data-unicode=\'',str_pad(dechex($i),4,0,STR_PAD_LEFT),'\' data-decimal=\'',$i,'\'>',$k,"</span><label>Code:",str_pad(dechex($i),4,0,STR_PAD_LEFT),"</div>";		
		}
	}
	
	if(isset($_GET['pua_skim']) && $_GET['pua_skim'] == 'true'){
		$ps_skim = array();
		for($i=0;$i<32;$i++){
			$shot = $i + 61440 + ($i * 200);
			$ps_skim[$i * 3] = $shot;
			$ps_skim[$i * 3 + 1] = $shot + 1;
			$ps_skim[$i * 3 + 2] = $shot + 3;
			
		}
		$all_chars = array();
		foreach($ps_skim as $i){
			$all_chars[$i] = mb_convert_encoding(pack('n', $i), 'UTF-8', 'UTF-16BE');
		}
		
		foreach($all_chars as $i => $k){
			echo "<div class=\"pua\" id=\"pua-code-",$i,"\">",$k,'<span data-unicode=\'',str_pad(dechex($i),4,0,STR_PAD_LEFT),'\' data-decimal=\'',$i,'\'>',$k,"</span><label>Code:",str_pad(dechex($i),4,0,STR_PAD_LEFT),"</div>";		
		}
	}
	
	
	

?>