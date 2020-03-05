<?php 
global $bdd;
function liste_pharaons($bdd)
{
	$requete = $bdd->prepare("select * FROM pharaon");
    $requete->execute();
    return $requete->fetchAll();
}
function get_pharaon($NroDynastie,$NroOrdre)
{
	$pharaon=$bdd->prepare("Select * from pharaon where NroDynastie=?  and NroOrdre=?");
	$pharaon->execute(array($NroDynastie,$NroOrdre));
	return $pharaon->fetch();
}
function par_epoque2($bdd,$NroEpoque)
{
	$pharaons=$bdd->prepare("Select d.*,e.* from pharaon d, epoque e where d.NroEpoque=e.NroEpoque and d.NroEpoque=?");
	$pharaons->execute(array($NroEpoque));
	return $pharaons->fetchALL();
}
function details_pharaon($bdd,$NroDynastie,$NroOrdre)
{
	$pharaon=$bdd->prepare("SELECT d.decouverte,s.NomSite, s.NomLieu, dy.NomDynastie,ph.NomPh,ph.NroDynastie,ph.NroOrdre FROM site s, decouvrir d, dynastie dy, pharaon ph where d.NroSite=s.NroSite and d.NroOrdre=ph.NroOrdre and d.NroDynastie=ph.NroDynastie and ph.NroDynastie=dy.NroDynastie
 and ph.NroDynastie=?  and ph.NroOrdre=?");
	$pharaon->execute(array($NroDynastie,$NroOrdre));
	return $pharaon->fetchALL();
}
function ajouter_pharaon($bdd,$NroDynastie,$NroOrdre,$NomPh,$NomUsuel,$commentPh)
{
	$reqAddpharaon=$bdd->prepare("insert into pharaon values(?,?,?,?,?)");
	$reqAddpharaon->execute(array($NroDynastie,$NroOrdre,$NomPh,$NomUsuel,$commentPh));
}



function modifier_pharaon($bdd,$NomPh,$NomUsuel,$commentPh,$NroDynastie,$NroOrdre)
{
	$reqUpdatepharaon=$bdd->prepare("update pharaon SET NomPh=?,NomUsuel=?,commentPh=? where NroDynastie=? and NroOrdre=?");
	$reqUpdatepharaon->execute(array($NomPh,$NomUsuel,$commentPh,$NroDynastie,$NroOrdre));
		var_dump($reqUpdatepharaon);

	}

function delete_pharaon($bdd,$NroDynastie,$NroOrdre)
{
	$reqDeletepharaon=$bdd->prepare("delete from pharaon where NroDynastie=? and NroOrdre=?");
	$reqDeletepharaon->execute(array($NroDynastie,$NroOrdre));
	var_dump($reqDeletepharaon);
}

?>