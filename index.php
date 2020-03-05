<?php
session_start();	

require_once('models/homeModel.php');
global $bdd;
$bdd=connexion_bd($host,$dbname,$user,$password);
	$baseURL=dirname($_SERVER['SCRIPT_NAME']);

$page = $_SERVER["REQUEST_URI"];
$pieces = explode("/", $page);
$module=$pieces[2];
if(isset($pieces[3])) $action=$pieces[3];



	if (!isset($module) || $module =="")
		$page = "home";
	
	else
		
		
			$page = $_GET['module'];
	
		
	

	ob_start(); // Arrete l'affichage
	include "controllers/{$page}Controller.php";
	$content = ob_get_contents();
	ob_end_clean(); // relance l'affichage
	
	include "layout.php";
	

?>