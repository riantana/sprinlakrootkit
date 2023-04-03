<?php

$controller='home';
$method='index';
$param=[];


$dataurl=url();

if (file_exists()) {

}





function url(){
	$url=$_GET['url'];
	$url=rtrim($url,'/');
	$url=filter_var($url,FILTER_SANITIZE_URL);
	$url=explode('/',$url);
	return $url;
}


