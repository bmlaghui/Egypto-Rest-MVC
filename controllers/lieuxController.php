<?php
require_once 'models/lieuxModel.php';
include 'views/lieuxView.php';
if (isset($_GET['action'])) {
    $action=$_GET['action'];
} else {
    $action='liste';
}
switch ($action) {
    case 'liste': $lieux=liste_lieux($bdd); afficher_lieux($bdd,$lieux); break;
    case 'get':$idlieu=$_GET['idlieu']; get_lieu($bdd, $idlieu); break;
    case 'add':  $NomLieu= $_REQUEST['NomLieu']; $description= $_REQUEST['description']; $situation= $_REQUEST['situation'];  ajouter_lieu($bdd,$NomLieu,$description,$situation); header('Location:index.php?module=lieux'); break;
   // case 'details':$idlieu=$_REQUEST['idlieu']; form_details_lieu($bdd, $idlieu); break;
    case 'modifier': $NomLieu= $_REQUEST['NomLieu']; $description= $_REQUEST['description']; $situation= $_REQUEST['situation'];  modifier_lieu($bdd,$NomLieu,$description,$situation); header('Location:index.php?module=lieux');   break;
    case 'delete': $NomLieu=$_REQUEST['NomLieu']; delete_lieu($bdd,$NomLieu); header('Location:index.php?module=lieux'); break;

    }
