<?php 
global $bdd;
function liste_lieux($bdd)
{
	$requete = $bdd->prepare("select * FROM lieu");
    $requete->execute();
    return $requete->fetchAll();
}
function get_lieu($Nrolieu)
{
	$lieu=$bdd->prepare("Select * from lieu where Nrolieu=?");
	$lieu->execute(array($Nrolieu));
	return $lieu->fetch();
}
//A faire
function details_lieu($Nrolieu)
{
	$lieux=$bdd->prepare("Select u.*,r.* from lieux u, reservation r where u.Nrolieu=r.Nrolieu and r.Nrolieu=?");
	$lieux->execute(array($Nrolieu));
	return $lieux->fetchALL();
}

function ajouter_lieu($bdd,$NomLieu,$description,$situation)
{
	$reqAddlieu=$bdd->prepare("insert into lieu values(?,?,?)");
	$reqAddlieu->execute(array($NomLieu,$description,$situation));
}



function modifier_lieu($bdd,$NomLieu,$description,$situation)
{
	$reqUpdatelieu=$bdd->prepare("update lieu SET description=?,situation=? where NomLieu=?");
	$reqUpdatelieu->execute(array($description,$situation,$NomLieu));
	var_dump($reqUpdatelieu);
	}

function delete_lieu($bdd,$NomLieu)
{
	$reqDeletelieu=$bdd->prepare("delete from lieu where NomLieu=?");
	$reqDeletelieu->execute(array($NomLieu));
	var_dump($reqDeletelieu);
}

?>