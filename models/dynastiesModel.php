<?php 
global $bdd;
function liste_dynasties($bdd)
{
	$requete = $bdd->prepare("select * FROM dynastie");
    $requete->execute();
    return $requete->fetchAll();
}
function get_dynastie($bdd,$NroDynastie)
{
	$dynastie=$bdd->prepare("Select * from dynastie where NroDynastie=?");
	$dynastie->execute(array($NroDynastie));
	return $dynastie->fetch();
}
function par_epoque($bdd,$NroEpoque)
{
	$dynasties=$bdd->prepare("Select d.*,e.* from dynastie d, epoque e where d.NroEpoque=e.NroEpoque and d.NroEpoque=?");
	$dynasties->execute(array($NroEpoque));
	return $dynasties->fetchALL();
}
function details($bdd,$NroDynastie)
{
	$dynasties=$bdd->prepare("Select d.*,e.*,p.* from dynastie d, epoque e, pharaon p where d.NroDynastie = p.NroDynastie and d.NroEpoque=e.NroEpoque and d.NroDynastie=?");
	$dynasties->execute(array($NroDynastie));
	return $dynasties->fetchALL();
}
function ajouter_dynastie($bdd,$NroDynastie,$NomDynastie,$DebDynastie,$FinDynastie,$NroEpoque)
{
	$reqAdddynastie=$bdd->prepare("insert into dynastie values(?,?,?,?,?)");
	$reqAdddynastie->execute(array($NroDynastie,$NomDynastie,$DebDynastie,$FinDynastie,$NroEpoque));
}



function modifier_dynastie($bdd,$NomDynastie,$DebDynastie,$FinDynastie,$NroEpoque,$NroDynastie)
{
	$reqUpdatedynastie=$bdd->prepare("update dynastie SET NroDynastie=?,NomDynastie=?,DebDynastie=?,FinDynastie=?,NroEpoque=? where NroDynastie=?");
	$reqUpdatedynastie->execute(array($NroDynastie,$NomDynastie,$DebDynastie,$FinDynastie,$NroEpoque,$NroDynastie));
	}

function delete_dynastie($bdd,$NroDynastie)
{
	$reqDeletedynastie=$bdd->prepare("delete from dynastie where NroDynastie=?");
	$reqDeletedynastie->execute(array($NroDynastie));
	var_dump($reqDeletedynastie);
}

?>