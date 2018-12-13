<?php
	$db_dsn  = "mysql:dbname=projet;host=localhost;charset=utf8";
    $db_username = "root";
    $db_password = "toor";
	$pdo = new PDO(
        $db_dsn,
        $db_username,
        $db_password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET lc_time_names = \'fr_FR\''));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * Récupère les produits dans la base et les retourne sous la forme d'un tableau d'objets
     * Si pas de produits renvoie un message
     * 
    **/     
    function fetch($cat_id){
    	global $pdo;
    	$sql = "SELECT  id_composant, nom, famille.libelle 
        FROM composants
        LEFT JOIN famille ON composants.id_famille = famille.id_famille
        WHERE composants.id_famille = ?";
		$req = $pdo->prepare($sql);  
		$req->execute(array($cat_id));
         // fetchAll c'est pour dire récupère toute les lignes
		// il existe fetch pour une seule ligne 
		$composants = $req->fetchAll(PDO::FETCH_OBJ);
		$nb_composants = count($composants);

		if($nb_composants >0) return $composants;
		else return '<p> Aucun produit dans la base !</p>';
    }   
    function fetchPf(){
        global $pdo;
        $sql = "SELECT  id_pf, libelle
        FROM produit_fini";
        $req = $pdo->prepare($sql);  
        $req->execute(array());
         // fetchAll c'est pour dire récupère toute les lignes
        // il existe fetch pour une seule ligne 
        $composants = $req->fetchAll(PDO::FETCH_OBJ);
        $nb_composants = count($composants);

        if($nb_composants >0) return $composants;
        else return '<p> Aucun produit dans la base !</p>';
    }   
    
    /** verifie que l'utilisateur est bien dans la bdd
     * @param  [string] $email
     * @param  [string] $mdp
     * @return [array] 
     */
    function getUser($email, $mdp){
        global $pdo;
        $sql = "SELECT * FROM user WHERE email = ? AND mdp = ?";
        $req = $pdo->prepare($sql);
        $req->execute(array($email,$mdp));
        $user= $req->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    /**
     * Ajoute un produit dans la base
     * Renvoi un message de succès ou d'erreur en fonction
     **/
    function create(array $data) {
    	global $pdo;
    	
    	// 1- On créé une chaine avec des marqueurs ? pour une requête préparée et sécurisée
    	// Autant de marqueurs que de champs
  		$markers = implode(',', array_fill(0, count($data), '?'));
    	
    	// 2- On créé la requête sql avec les champs, les valeurs
    	// Les champs sont les clés du tableau
    	$fields = implode(', ', array_keys($data)); 

    	// 3- Besoin d'un tableau indexé numériquement pour valeurs
    	$values = array_values($data);    	
    	$sql = "INSERT INTO produit ({$fields}) VALUES ({$markers})";    	
    	$req = $pdo->prepare($sql);

    	// 4- On exécute la requête, si $result est à true on envoie un message de succès
    	// sinon message erreur;
		$result = $req->execute($values);
		if($result === true):
			$r = "<p class=\"h4\" style=\"color:green;\">Le produit {$data['rubrique']} {$data['intitule']} [REF: {$data['reference']}] a bien été ajouté</p>";
			return $r;
		else :
			return '<p style="color:green;">Erreur lors de l\'enregistrement du produit</p>';
		endif;    	
    }

    function insertThings(array $data, array $fields, $pf = false) {
        global $pdo;
      
        $markers = implode(',', array_fill(0, count($data), '?'));
        
        
        $fields =  implode(', ', $fields);
        if ($pf === true) {
            $sql = "INSERT INTO apport_pf({$fields}) VALUES ({$markers})";     
        }
        else {
            $sql = "INSERT INTO apport_compo ({$fields}) VALUES ({$markers})";     

        }
          
        $req = $pdo->prepare($sql);
        return $req->execute($data);
          
    }
?>