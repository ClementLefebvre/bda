<?php

/*
Dans ce fichier, on définit diverses fonctions permettant de récupérer des données utiles pour notre TP d'identification. Deux parties sont à compléter, en suivant les indications données dans le support de TP
*/


/********* EXERCICE 2 : prise en main de la base de données *********/


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");

function listerUtilisateurs($classe = "both")
{
	// Cette fonction liste les utilisateurs de la base de données 
	// et renvoie un tableau d'enregistrements. 
	// Chaque enregistrement est un tableau associatif contenant les champs 
	// id,pseudo,blacklist,connecte,couleur

	// Lorsque la variable $classe vaut "both", elle renvoie tous les utilisateurs
	// Lorsqu'elle vaut "bl", elle ne renvoie que les utilisateurs blacklistés
	// Lorsqu'elle vaut "nbl", elle ne renvoie que les utilisateurs non blacklistés

	$clause = "";
	$SQL = "select * from users";
	if ($classe == "bl") $clause = " where blacklist = 1";
	if ($classe == "nbl") $clause = " where blacklist = 0";

	return parcoursRs(SQLSelect($SQL . $clause));

}

function interdireUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à vrai 
	$SQL = "UPDATE users SET blacklist = 1 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function autoriserUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à faux 
	$SQL = "UPDATE users SET blacklist = 0 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function supprimerUtilisateur($idUser)
{
	// cette fonction supprime un utilisateur
	$SQL = "DELETE FROM users WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function ajouterUtilisateur($login,$passe)
{
	// cette fonction crée un utilisateur 
	$SQL = "INSERT INTO users(pseudo,passe) VALUES ('$login','$passe')";
	return SQLInsert($SQL);
}

/********* EXERCICE 5 *********/

function listerConversations($mode="tout")
{
	// Liste toutes les conversations ($mode="tout")
	// OU uniquement celles actives  ($mode="actives"), ou inactives  ($mode="inactives")
	$clause = "";
	$SQL = "select * from conversations";
	if ($mode == "actives") $clause = " where active = 1";
	if ($mode == "inactives") $clause = " where active = 0";

	return parcoursRs(SQLSelect($SQL . $clause));
}

function archiverConversation($idConversation)
{
	// rend une conversation inactive
	$SQL = "UPDATE conversations SET active = 0 WHERE id='$idConversation'";
	SQLUpdate($SQL);
}

function reactiverConversation($idConversation)
{
	// rend une conversation inactive
	$SQL = "UPDATE conversations SET active = 1 WHERE id='$idConversation'";
	SQLUpdate($SQL);
}

function creerConversation($theme)
{
	// crée une nouvelle conversation et renvoie son identifiant
	$SQL = "INSERT INTO conversations(theme) VALUES ('$theme')";
	return SQLInsert($SQL);
}

function supprimerConversation($idConv)
{
	// supprime une conversation et ses messages
	$SQL = "DELETE FROM messages WHERE idConversation='$idConv'";
	SQLUpdate($SQL);

	$SQL = "DELETE FROM conversations WHERE id='$idConv'";
	SQLUpdate($SQL);
}


/********* EXERCICE 6 *********/

function enregistrerMessage($idConversation, $idAuteur, $contenu)
{
	// Enregistre un message dans la base en encodant les caractères spéciaux HTML : <, > et & 
	// pour interdire les messages HTML

	$SQL = "INSERT INTO messages(idConversation,idAuteur,contenu) "; 
	$SQL .= " VALUES('$idConversation', '$idAuteur', '" . htmlspecialchars($contenu) . "')";	
	return SQLInsert($SQL);	
}

function supprimerMessage($idMesg)
{
	// supprime une conversation et ses messages
	$SQL = "DELETE FROM messages WHERE id='$idMesg'";
	SQLUpdate($SQL);
}

function listerMessages($idConv,$format="asso")
{
	// Liste les messages de cette conversation, au format JSON ou tableau associatif
	// Champs à extraire : contenu, auteur, couleur 
	// en ne renvoyant pas les utilisateurs blacklistés
	$SQL = "SELECT m.contenu, u.pseudo as auteur, u.couleur ";
	$SQL .= "FROM messages m, users u "; 
	$SQL .= "WHERE m.idConversation = '$idConv' AND m.idAuteur=u.id ";
	$SQL .= "AND u.blacklist=0";

	return parcoursRS(SQLSelect($SQL));

}

function listerMessagesFromIndex($idConv,$index)
{
	// Liste les messages de cette conversation, 
	// dont l'id est superieur à l'identifiant passé
	// Champs à extraire : contenu, auteur, couleur 
	// en ne renvoyant pas les utilisateurs blacklistés
	$SQL = "SELECT m.id, m.contenu, u.pseudo as auteur, u.couleur ";
	$SQL .= "FROM messages m, users u "; 
	$SQL .= "WHERE m.idConversation = '$idConv' AND m.idAuteur=u.id ";
	$SQL .= "AND u.blacklist=0 "; 
	$SQL .= "AND m.id > '$index' "; 
	$SQL .= "ORDER BY m.id ASC";
	return parcoursRS(SQLSelect($SQL));
}


function getConversation($idConv)
{	
	// Récupère les données de la conversation (theme, active)
	$SQL = "SELECT theme, active FROM conversations WHERE id='$idConv'";
	$listConversations = parcoursRs(SQLSelect($SQL));

	// Attention : parcoursRS nous renvoie un tableau contenant potentiellement PLUSIEURS CONVERSATIONS
	// Il faut renvoyer uniquement la première case de ce tableau, c'est à dire la case 0 
	// OU false si la conversation n'existe pas
	 
	if (count($listConversations) == 0) return false;
	else return $listConversations[0];
}

function getArticles()
{	
	$SQL = "SELECT * FROM articles ORDER BY id DESC"; 
	return parcoursRs(SQLSelect($SQL));
}
?>
