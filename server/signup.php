<?php

require('config.php');

try
{
    
    if(empty($_GET["arg"])) {
     die("Erreur");
    }
   
	$json = $_GET["arg"];
    $signup = json_decode($json);

    $arg_username = $signup->{'username'};
    $arg_password = $signup->{'password'};
	$arg_email = $signup->{'email'};
	
	// On se connecte
	$bdd = new PDO("mysql:host=$servername;dbname=$db", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
	
	// On prépare la requête
    $requete = $bdd->prepare("INSERT INTO Users " .
                             "SET username = :username," .
                                 "password = :password," .
                                 "email = :email;");
    
	// On lie les variables
	$requete->bindValue(':username', $arg_username, PDO::PARAM_STR);
    $requete->bindValue(':password', $arg_password, PDO::PARAM_STR);
    $requete->bindValue(':email', $arg_email, PDO::PARAM_STR);
    
	//On exécute la requête
	
	try {
	    $requete->execute();
	} catch(PDOException $e) {
        handle_sql_errors($e);
    }

	// On récupère le résultat
	
    $result = $requete->fetch();
	if ($result)
	{
		echo '{ "ok" : true, "r_error" : { "e_email" : "", "e_default" : "" }}';
	} else {
	    echo '{ "ok" : false, "r_error" : { "e_email" : "", "e_default" : "' .  $result->error . '}}';
	}
} catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

function handle_sql_errors($e)
{
    switch($e->getCode()) {
        case 23000 :
            print '{ "ok" : false, "r_error" : { "e_email" : "", "e_default" : "This address email is already in use"}}';
            break;
    }
    
    die;
}
?>