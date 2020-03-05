<?php 
global $bdd;
function liste_epoques($bdd)
{
	$requete = $bdd->prepare("select * FROM epoque");
    $requete->execute();
    return $requete->fetchAll();
}
function get_epoque($bdd,$NroEpoque)
{
	$Epoque=$bdd->prepare("Select * from epoque where NroEpoque=?");
	$Epoque->execute(array($NroEpoque));
	return $Epoque->fetch();
}
//A faire
function details_epoque($bdd,$NroEpoque)
{
	$Epoques=$bdd->prepare("Select e.*,d.* from epoque e, dynastie d where e.NroEpoque=d.NroEpoque and e.NroEpoque=?");
	$Epoques->execute(array($NroEpoque));
	return $Epoques->fetchALL();
}

function ajouter_epoque($bdd,$NomEpoque,$CommentEp)
{
	$reqAddEpoque=$bdd->prepare("insert into epoque(NomEpoque,CommentEp) values(?,?)");
	$reqAddEpoque->execute(array($NomEpoque,$CommentEp));
}



function modifier_epoque($bdd,$NomEpoque,$CommentEp,$NroEpoque)
{
	$reqUpdateEpoque=$bdd->prepare("update epoque SET NomEpoque=?,CommentEp=? where NroEpoque=?");
	$reqUpdateEpoque->execute(array($NomEpoque,$CommentEp,$NroEpoque));
	}

function delete_epoque($bdd,$NroEpoque)
{
	$reqDeleteEpoque=$bdd->prepare("delete from epoque where NroEpoque=?");
	$reqDeleteEpoque->execute(array($NroEpoque));
	var_dump($reqDeleteEpoque);
}

?>