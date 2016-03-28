<?php

require('config.php');

try
{
    
    if(empty($_GET["arg"])) {
     die("Erreur");
    }
   
	$json = $_GET["arg"];
    $user = json_decode($json);

    $arg_username = $user->{'username'};
    $arg_password = $user->{'password'};
	
	// On se connecte
	$bdd = new PDO("mysql:host=$servername;dbname=$db", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
	
	// On prépare la requête
    $requete = $bdd->prepare("SELECT * 
                              FROM Users 
                              WHERE username = :username 
                                AND password = :password;");
    
	// On lie les variables
	$requete->bindValue(':username', $arg_username, PDO::PARAM_STR);
    $requete->bindValue(':password', $arg_password, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
   /* for($i = 0; $i < sizeof($result); $i++) {
        echo $result[$i];
        echo '<br />';
    } */
    
  //  print_r($result);
    $result['product'] = getProduct($bdd, $result['userid']);
    
	if (!(empty($result)))
	{
	    //echo json_encode($result);
		echo '{ "ok" : true, "r_error" : "", "user" : ' . json_encode($result) . '}';
	} else {
	    echo '{ "ok" : false, "r_error" : "wrong username or password"}';
	}
} catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}


function getProduct($bdd, $userid) {
    $requete = $bdd->prepare("SELECT * 
                              FROM Products 
                              WHERE userid = :userid");
    
	// On lie les variables
	$requete->bindValue(':userid', $userid, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
    
    return $result;
}

function getTags($bdd, $productid) {
     $requete = $bdd->prepare("SELECT * 
                              FROM Products 
                              WHERE userid = :userid");
    
	// On lie les variables
	$requete->bindValue(':userid', $userid, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
    
    return $result;
}

function getVideos($bdd, $userid) {
     $requete = $bdd->prepare("SELECT * 
                              FROM Videos 
                              WHERE userid = :userid");
    
	// On lie les variables
	$requete->bindValue(':userid', $userid, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
    
    return $result;
}

function getImages($bdd, $userid) {
     $requete = $bdd->prepare("SELECT * 
                              FROM Images 
                              WHERE userid = :userid");
    
	// On lie les variables
	$requete->bindValue(':userid', $userid, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
    
    return $result;
}

function getFollowers($bdd, $userid) {
     $requete = $bdd->prepare("SELECT * 
                              FROM Followers 
                              WHERE userid = :userid");
    
	// On lie les variables
	$requete->bindValue(':userid', $userid, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
    
    return $result;
}

function getFollowed($bdd, $userid) {
     $requete = $bdd->prepare("SELECT * 
                              FROM Followed 
                              WHERE userid = :userid");
    
	// On lie les variables
	$requete->bindValue(':userid', $userid, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
    
    return $result;
}