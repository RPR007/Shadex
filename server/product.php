<?php

require('config.php');

try
{
    
    if(empty($_GET["arg"])) {
     die("Erreur");
    }
   
	$json = $_GET["arg"];
    $product = json_decode($json);

    $arg_id = $product->{'id'};
    
    if(property_exists($product, 'modifie'))
    	$arg_modifie = $product->{'modifie'};
	
	// On se connecte
	$bdd = new PDO("mysql:host=$servername;dbname=$db", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
	
	// On prépare la requête
    $requete = $bdd->prepare("SELECT * 
                              FROM Products
                              WHERE productid = :id");
    
	// On lie les variables
	$requete->bindValue(':id', $arg_id, PDO::PARAM_STR);
    
	//On exécute la requête
	$requete->execute();
	
	// On récupère le résultat
	
    $result = $requete->fetch();
	if (!(empty($result)))
	{
	    //echo json_encode($result);
		echo '{ "ok" : true, "r_error" : "", "product" : ' . json_encode($result) . '}';
	} else {
	    echo '{ "ok" : false, "r_error" : "wrong username or password"}';
	}
} catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}