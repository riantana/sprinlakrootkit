<?php

function load_view($file,$data=[]){
	if (!empty($data)) {
		extract($data);
	}
	if (file_exists('app/views/'.$file.'.php')) {
		require_once 'app/views/'.$file.'.php';
	}else{
		require_once 'page_def.php';
	}

	
}