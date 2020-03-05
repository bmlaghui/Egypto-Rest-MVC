<?php
require_once 'models/epoquesModel.php';
include 'views/epoquesView.php';

$page = $_SERVER["REQUEST_URI"];
$pieces = explode("/", $page);
if(isset($pieces[3])) 
{
	$action=$pieces[3];
	
}
if(isset($pieces[4])) $id=$pieces[4];


if (!isset($action)) {
   
    $action='liste';
}

switch ($action) {
    case 'liste': $epoques=liste_epoques($bdd); afficher_epoques($bdd,$epoques); break;
    case 'get':$idepoque=$_GET['idepoque']; get_epoque($bdd, $idepoque); break;
	case 'new': if(!isset ($_REQUEST['NomEpoque'])) {form_add_epoque($bdd); } else {  $NomEpoque= $_REQUEST['NomEpoque']; $CommentEp= $_REQUEST['CommentEp'];
	ajouter_epoque($bdd,$NomEpoque,$CommentEp); 
	header('Location:'.$baseURL.'/epoques');
	} 	break;
	case 'update':   if(!isset ($_REQUEST['NomEpoque'])) { form_update_epoque($bdd,$id);} else { $NroEpoque=$_REQUEST['NroEpoque']; $NomEpoque= $_REQUEST['NomEpoque']; $CommentEp= $_REQUEST['CommentEp']; modifier_epoque($bdd,$NomEpoque,$CommentEp,$NroEpoque); 	header('Location:'.$baseURL.'/epoques');
}  break;
   case 'show': show_epoque($bdd, $id); break;
    case 'delete':  delete_epoque($bdd,$id); header('Location:/epoques'); header('Location:'.$baseURL.'/epoques'); break;

    }


