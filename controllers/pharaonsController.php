<?php
require_once 'models/pharaonsModel.php';
include 'views/pharaonsView.php';
if (isset($_GET['action'])) {
    $action=$_GET['action'];
} else {
    $action='liste';
}
switch ($action) {
    case 'liste': $pharaons=liste_pharaons($bdd); afficher_pharaons($bdd,$pharaons); break;
    case 'add': $NroDynastie= $_REQUEST['NroDynastie']; $NroOrdre= $_REQUEST['NroOrdre']; $NomPh= $_REQUEST['NomPh']; $NomUsuel= $_REQUEST['NomUsuel']; $commentPh= $_REQUEST['commentPh']; ajouter_pharaon($bdd,$NroDynastie,$NroOrdre,$NomPh,$NomUsuel,$commentPh); header('Location:index.php?module=pharaons');   break;
    case 'par_epoque': afficher_pharaons_epoques($bdd); break;
    case 'modifier': $NroDynastie= $_REQUEST['NroDynastie']; $NroOrdre= $_REQUEST['NroOrdre']; $NomPh= $_REQUEST['NomPh']; $NomUsuel= $_REQUEST['NomUsuel']; $commentPh= $_REQUEST['commentPh'];; modifier_pharaon($bdd,$NomPh,$NomUsuel,$commentPh,$NroDynastie,$NroOrdre); header('Location:index.php?module=pharaons');   break;
    case 'delete': $NroDynastie=$_REQUEST['NroDynastie'];  $NroOrdre=$_REQUEST['NroOrdre']; delete_pharaon($bdd,$NroDynastie,$NroOrdre); header('Location:index.php?module=pharaons'); break;

    }
