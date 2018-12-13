	<?php 
	session_start();
	require 'dao.php'; 
	// Au log
	if (isset($_POST['logpost']))
	{

	$email = $_POST['email'];
	$mdp = $_POST['mdp'];
	$user = getUser($email,$mdp);
	if($user==false)
	{
	$erreurLogin = 'Merci de verifier vos identifiants';
	}
	else {
		$_SESSION['pseudo'] = $user->pseudo;
		$_SESSION['role'] = $user->role;
		$_SESSION['id_user'] = $user->id_user;
	}
	}
	// Au post de composants
	if (isset($_POST['compoPost']))
	{ 
		$err_array = [];
		$args = array(
		     'qty'    => array(
                            'filter' => FILTER_VALIDATE_INT,
                            'flags'  => FILTER_REQUIRE_ARRAY,
                            'options' => array('min-range' => 1 )
        ));

		$myinputs = filter_input_array(INPUT_POST, $args);
		//die(var_dump($myinputs));
		foreach ($myinputs['qty'] as $k => $v) {
			// On envoi un tableau numerique donc dans l'ordre les chjamps Janine
			if($v!==false && $v >0) {
				$result = insertThings(array($k, $_SESSION['id_user'], date('Y-m-d'), $v), array('id_composant', 'id_user', 'date_ajout', 'qty'));
				if (!$result ) $err_array[] = $k;

			}
		}
	}
// Au post de produits finis
	if (isset($_POST['pfPost']))
	{ 
		$err_array = [];
		$args = array(
		     'qty'    => array(
                            'filter' => FILTER_VALIDATE_INT,
                            'flags'  => FILTER_REQUIRE_ARRAY,
                            'options' => array('min-range' => 1 )
        ));

		$myinputs = filter_input_array(INPUT_POST, $args);
		//die(var_dump($myinputs));
		foreach ($myinputs['qty'] as $k => $v) {
			// On envoi un tableau numerique donc dans l'ordre les chjamps Janine
			if($v!==false && $v >0) {
				$result = insertThings(array($k, $_SESSION['id_user'], date('Y-m-d'), $v), array('id_pf', 'id_user', 'date_ajout', 'qty'), true);
				if (!$result ) $err_array[] = $k;

			}
		}
	}
	?>