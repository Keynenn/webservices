<?php

function retourNom($keyword)
{	
	$pdo = new PDO('mysql:host=localhost;dbname=webservice', 'root', '');
	
	$sql = "SELECT * FROM clients WHERE first = '" . $keyword . "'";
	$req = $pdo->query($sql);

	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

	return $resultat;
}

ini_set('soap.wsdl_cache_enabled', 0);
$serversoap=new SoapServer("http://localhost/WebServices/server.wsdl");
$serversoap->addFunction("retourNom");
$serversoap->handle();

?>