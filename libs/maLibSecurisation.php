<?php

include_once "maLibUtils.php";	// Car on utilise la fonction valider()
include_once "bdd.php";	// Car on utilise la fonction connecterUtilisateur()

/**
 * @file login.php
 * Fichier contenant des fonctions de vérification de logins
 */

/**
 * Cette fonction vérifie si le login/passe passés en paramètre sont légaux
 * Elle stocke le pseudo de la personne dans des variables de session : session_start doit avoir été appelé...
 * Elle enregistre aussi une information permettant de savoir si l'utilisateur qui se connecte est administrateur ou non
 * Elle enregistre l'état de la connexion dans une variable de session "connecte" = true
 * @pre login et passe ne doivent pas être vides
 * @param string $login
 * @param string $password
 * @return false ou true ; un effet de bord est la création de variables de session
 */
function verifUser($login,$password)
{
	// NE PAS ETRE UN LOSER
	$sql = "SELECT id, pseudo FROM users WHERE pseudo='$login' AND passe='$password' ";
	$rs = SQLSelect($sql);
	if ($rs)
	{
		// connexion acceptee
		$tabUsers = parcoursRs($rs);
		$dataUser = $tabUsers[0];
		$_SESSION["connecte"] = true;
		$_SESSION["pseudo"] = $dataUser["pseudo"];
		$_SESSION["idUser"] = $dataUser["id"];
		$_SESSION["heureConnexion"] = date("H:i:s");
		return true;
	}
	else
	{
		session_destroy();
		return false;
	}
}




/**
 * Fonction à placer au début de chaque page privée
 * Cette fonction redirige vers la page $urlBad en envoyant un message d'erreur 
	et arrête l'interprétation si l'utilisateur n'est pas connecté
 * Elle ne fait rien si l'utilisateur est connecté, et si $urlGood est faux
 * Elle redirige vers urlGood sinon
 */
function securiser($urlBad,$urlGood=false)
{
	// ou 	if (valider("connecte","SESSION") == false)
	if (valider("pseudo","SESSION") == false)
	{
		// intrus !
		
		// on redirige en envoyant un message!!
		header("Location:$urlBad?message=" .  urlencode("Hors d'ici !") );
		die("");	// arreter l'interprétation du code
		return;
	
	}
	
	// Utilisateur autorisé et urlGood n'est pas faux
	if ($urlGood)
	{
		// on redirige puisque urlGood n'est pas faux
		header("Location:$urlGood");
		die("");	// arreter l'interprétation du code
	
	}
}

?>
