<?php
	// Create an array containing a range of ASCII elements.
	// Kudos to Emre Yazici on Stackoverflow - http://stackoverflow.com/users/220726/emre-yazici 
	$bytes_a =  range (33 , 126);
	$bytes_b = range(161, 255);
	$bytes = array_merge((array)$bytes_a,(array)$bytes_b);
	//$all_chars = array_map('chr', $bytes);
	$all_chars = array();
	foreach($bytes as $i){
		$all_chars[$i] = mb_convert_encoding(pack('n', $i), 'UTF-8', 'UTF-16BE');
	}
	
	foreach($all_chars as $k => $v){
		if(strlen(trim($v)) < 1){
		//	unset($all_chars[$k]);
		}
	}
	
	// Start of legacy code, from when the tool was just for me, still used to set up the first font on the page
	
	$column_limit = 12;
	
	$dir = "fonts";
	$exclude_list = array(".", "..");
	$font_extensions = array(
		'eot' =>'eot',
		'svg' => 'svg',
		'ttf' => 'ttf',
		'woff' => 'woff'
	);
	
	$font_folders = scandir($dir);
	foreach($font_folders as $k => $v){
		if(in_array($v,$exclude_list)){
			unset($font_folders[$k]);
		}
	}
	
	
	if(isset($_GET['font_folder']) && strlen($_GET['font_folder']) > 4){
		$active_font = $dir.'/'.$_GET['font_folder'];
		$folder_name = $_GET['font_folder'];
	}else{
		$active_font = $dir.'/'.reset($font_folders);
		$folder_name = reset($font_folders);
	}
	
	
	$scan_active = scandir($active_font);
	$font_files = array();
	foreach($scan_active as $k => $v){
		$ext = explode('.',$v);
		if(in_array($ext[1],$font_extensions)){
			$font_files[$ext[1]] = $v;
		}
	}
	
	// End of legacy code

?>
