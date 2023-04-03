<?php

$controller='home';
$method='index';
$param=[];

$dataurl=url();

if (!empty($dataurl)) {
	if (file_exists('app/controller/'.$dataurl[0].'.php')) {
		$controller=$dataurl[0];
		unset($dataurl[0]);
	}
}

require_once 'app/controller/'.$controller.'.php';

if (isset($dataurl[1])) {
	if(function_exists($dataurl[1])){
		$method=$dataurl[1];
		unset($dataurl[1]);
	}
}

if (!empty($dataurl)) {
	$param=array_values($dataurl);
}

call_user_func_array($method,$param);

function url(){
	if (isset($_GET['url'])) {
		$url=$_GET['url'];
		$url=rtrim($url,'/');
		$url=filter_var($url,FILTER_SANITIZE_URL);
		$url=explode('/',$url);
		return $url;
	}
}


