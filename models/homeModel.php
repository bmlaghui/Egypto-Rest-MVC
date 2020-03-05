<?php
require('config.php');

//connexion à la bdd
 function connexion_bd($host,$dbname,$user,$password){
		try
	      {
			 
		     $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			return $bdd;
	      }
        catch(PDOException $e){
          echo 'Connexion échouée : '.$e->getMessage();
          die();
        }
}
?>
