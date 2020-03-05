<?php
require_once 'models/dynastiesModel.php';
include 'views/dynastiesView.php';
if (isset($_GET['action'])) {
    $action=$_GET['action'];
} else {
    $action='liste';
}
switch ($action) {
    case 'liste': $dynasties=liste_dynasties($bdd); afficher_dynasties($bdd,$dynasties); break;
    case 'get':$iddynastie=$_GET['iddynastie']; get_dynastie($bdd, $iddynastie); break;
    case 'add': $NroDynastie= $_REQUEST['NroDynastie']; $NomDynastie= $_REQUEST['NomDynastie']; $DebDynastie= $_REQUEST['DebDynastie']; $FinDynastie= $_REQUEST['FinDynastie']; $NroEpoque= $_REQUEST['NroEpoque']; ajouter_dynastie($bdd,$NroDynastie,$NomDynastie,$DebDynastie,$FinDynastie,$NroEpoque); header('Location:index.php?module=dynasties');  break;
    case 'par_epoque': afficher_dynasties_epoques($bdd); break;
    case 'modifier': $NomDynastie= $_REQUEST['NomDynastie']; $DebDynastie= $_REQUEST['DebDynastie']; $FinDynastie= $_REQUEST['FinDynastie']; $NroEpoque= $_REQUEST['NroEpoque']; $Nrodynastie= $_REQUEST['NroDynastie']; modifier_dynastie($bdd,$NomDynastie,$DebDynastie,$FinDynastie,$NroEpoque,$Nrodynastie); header('Location:index.php?module=dynasties');   break;
    case 'delete': $NroDynastie=$_REQUEST['NroDynastie']; delete_dynastie($bdd,$NroDynastie); header('Location:index.php?module=dynasties'); break;

    }
