<head>
	<style>
			table, th, td 
			{
				border: 1px solid black;
				border-collapse: collapse;
			}

			table 
			{
				background: #34495E;
			    border-radius: .4em;
			}

			td 
			{
				text-align: center;
				background-color: #eee;
			}

			h1 
			{ 
				font-size: 32px;
  				text-shadow: -1px -1px #0c0, 1px 1px #060, -3px 0 4px #000;
  				font-family:Arial, Helvetica, sans-serif;
  				color: #090;
  				padding:16px;
  				font-weight:lighter;  
  				box-shadow:2px 2px 6px #888;  
  				text-align:center;
  				display:block;
  				margin:16px; 
  			}

  			input[type="text"]
  			{
  				font: 15px/24px "Lato", Arial, sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;
  			}

			input[Type=submit] 
			{

				color: white;
  				background-color: #000080;
  				text-decoration: none;
  				font-weight: bold;
  				text-align: center;
  				padding: 5px;
			}		
	</style>
</head>

<h1>Page de recherche client-serveur</h1>

<form action="client.php" method="post">
    <p>
	<input type="text" name="prenom" placeholder="Tapez votre recherche" />
	<br>
	<br>
    <input type="submit" class="Boutton" value="Valider" />
    </p>
</form>



<?php
if(isset($_POST['prenom'])){
	ini_set('soap.wsdl_cache_enabled', 0);
	$service=new SoapClient("http://localhost/WebServices/server.wsdl");
	$Retour=$service->retourNom($_POST['prenom']);

	if(is_array($Retour)){
		echo '<table style="width:100%" border>';
		echo '<tr>';
		echo '<th>id</th>';
		echo '<th>guid</th>';
		echo '<th>first</th>';
		echo '<th>last</th>';
		echo '<th>street</th>';
		echo '<th>city</th>';
		echo '<th>zip</th>';
		echo '</tr>';
		foreach($Retour as $first){
			echo '<tr>';
			foreach($first as $donne){
				echo '<td>';
				echo $donne;
				echo '</td>';
			}
			echo '</tr>';
		}
	}else{
		echo '</br>Not array</br>';
	}
	error_reporting(1);
}else{
	echo 'Les références de votre recherche seront affichées après avoir cliqué sur valider. (Exemple : Ethel )';
}
?>

