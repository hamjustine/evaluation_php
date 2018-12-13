<?php 
session_start();
//require(connexion.php);
$nickname ='Pousse';
$pwd ='Essai39@@';
$error=false;
if (isset($_POST['login']) && preg_match("^(?=.*[\p{Ll}])(?=.*[\p{Lu}])(?=.*\d)(?=.*[$@$!%*?&])[\p{Ll}\p{Lu}\d$@$!%*?&]{6,}", $_POST['mdp'])){
		if ($_POST['pseudo']==$nickname && $_POST['mdp']==$pwd) {
	 		$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			$_SESSION['pseudo'] = $pseudo;
		}else{
		$error=true;}
};
 ?>