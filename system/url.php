<?php
require_once 'app/config/routing/routing.php';
extract($routing);
$def_controller=$controller;
$def_method=$method;
$param=[];

$dataurl=url();
if (!empty($dataurl)) {
	if (file_exists('app/controller/'.$dataurl[0].'.php')) {
		$def_controller=$dataurl[0];
		unset($dataurl[0]);
	}else{
		require_once 'no_controller.php';
		exit;
	}
}

require_once 'app/controller/'.$def_controller.'.php';
if (isset($dataurl[1])) {
	if(function_exists($dataurl[1])){
		$def_method=$dataurl[1];
		unset($dataurl[1]);
	}else{
		require_once 'no_method.php';
		exit;
	}
}

if (!empty($dataurl)) {
	$param=array_values($dataurl);
}

call_user_func_array($def_method,$param);

function url(){
	if (isset($_GET['url'])) {
		$url=$_GET['url'];
		$url=rtrim($url,'/');
		$url=filter_var($url,FILTER_SANITIZE_URL);
		$url=explode('/',$url);
		return $url;
	}
}


