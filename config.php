<?php

session_name('EPE3BD');
session_start();

set_time_limit(300);
date_default_timezone_set('America/Santiago');

$dev = true;
$_SESSION["dev"] = $dev;

if($dev){
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(0);
	$base_url = "http://localhost:8088";
	// $base_url = "https://qa.finvoice.cl";
}else{
	$base_url = "https://epebd.000webhostapp.com/";
}


?>
