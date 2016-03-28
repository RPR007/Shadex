<?php

require('config.php');

try
{
    
    if(empty($_GET["arg"])) {
     die("Erreur");
    }
   
	$json = $_GET["arg"];
    $signin = json_decode($json);

    $arg_username = $signin->{'username'};
    $arg_password = $signin->{'password'};
	
	// On se connecte
	$bdd = new PDO("mysql:host=$servername;dbname=$db", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
	
	// On prépare la requête
    $requete = $bdd->prepare("SELECT * FROM Users WHERE username = :username AND password = :password;");
    
	// On lie les variables
	$requete->bindValue(':username', $arg_username, PDO::PARAM_STR);
    $requete->bindValue(':password', $arg_password, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
	if (!(empty($result)))
	{
		echo '{ "ok" : true, "r_error" : ""}';
	} else {
	    echo '{ "ok" : false, "r_error" : "wrong username or password"}';
	}
} catch (Exception $e)
{
	die('{ "ok" : false, "r_error" : "' . $e->getMessage() . '"}');
}