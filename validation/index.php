<?php require('session.php');
require('croquettes.php'); ?>
<!DOCTYPE html>
	<html>
		<head>
			<html lang="fr">
			<meta charset="utf-8">
			<title>a-chat en ligne de croquettes</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<link rel="stylesheet" href="style.css">
		</head>
	<body>
		<header>
			<div class="row">
				<div class="col-md-8">
					<H1>les croquettes a-chat</H1>
				</div>
				<div class="col-md-4 py-2">
					<?php if(!isset($_SESSION['pseudo'])) : ?>
					<form method="post" class="form-inline">
					  <label class="sr-only" for="inlineFormInputName2">Pseudonyme</label>
					  <input type="text" class="form-control mb-2 mr-sm-2" name="pseudo" id="pseudo" placeholder="votre pseudo">

					  <label class="sr-only" type="password" for="inlineFormInputGroupUsername2">Mot de passe</label>
					  <div class="input-group mb-2 mr-sm-2">
					    <input type="password" class="form-control" name="mdp" 	id="mdp" placeholder="Mot de passe">
					  </div>
					  	<input type="hidden" name="login">

					  <button type="submit" class="btn btn-primary mb-2">Connexion</button>
					</form>
					<a href="">Inscription</a>
					<?php else : ?>	
						<a href="deconnexion.php" class="btn btn-secondary btn-sm mx-5" >Se déconnecter</a>
					<?php endif; ?>
					 <?php if($error==true){ ?>
					 	<p>vos identifiants sont erronés, veuillez rééssayer</p>
					<?php }; ?>	
				</div>
			</div>
		<!--	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="images/croquettesnoel.jpg" alt="Promo de noël">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/croquetteschat.jpg" alt="croquettes de luxe">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Précédent</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Suivant</span>
			  </a>
			</div>-->
		</header>
		<div class ="row">
			<div class="content col-md-7 justify-center">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			  		<li class="nav-item">
			   		 	<a class="nav-link active" id="pills-croquettes-tab" data-toggle="pill" href="#pills-croquettes" role="tab" aria-controls="pills-croquettes" aria-selected="true">Croquettes</a>
			  		</li>
					<li class="nav-item">
					    <a class="nav-link" id="pills-panier-tab" data-toggle="pill" href="#pills-panier" role="tab" aria-controls="pills-panier" aria-selected="false">Panier</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
			  		<div class="tab-pane fade show active" id="pills-croquettes" role="tabpanel" aria-labelledby="pills-croquettes-tab">
			  			<h3>Choisissez vos croquettes</h3>
			  			<div class="card border-light mb-3" style="max-width: 18rem;">
						<div class="card-header"><?php echo $croquette_chaton['Nom'] ?></div>
  						<div class="card-body">
  							<img style="max-width:10rem;" src=<?php echo $croquette_chaton['Image'] ?>>
    						<h5 class="card-title"><?php echo $croquette_chaton['Prix'] ?></h5>
    						<p class="card-text"><?php echo $croquette_chaton['Description'] ?></p>
    						<form method="post">
    							<input type="hidden" name="croquette1">
    							<button type="submit" class="btn btn-primary mb-2">Ajouter au panier</button>
    						</form>

  						</div>
			  			<div class="card border-light mb-3" style="max-width: 18rem;">
						<div class="card-header"><?php echo $croquette_senior['Nom'] ?></div>
  						<div class="card-body">
  							<img style="max-width:10rem;" src=<?php echo $croquette_senior['Image'] ?>>
    						<h5 class="card-title"><?php echo $croquette_senior['Prix'] ?></h5>
    						<p class="card-text"><?php echo $croquette_senior['Description'] ?></p>
    						<form method="post">
    							<input type="hidden" name="croquette2">
    							<button type="submit" class="btn btn-primary mb-2">Ajouter au panier</button>
    						</form>
  						</div>

			  		</div>
			  		<div class="tab-pane fade" id="pills-panier" role="tabpanel" aria-labelledby="pills-panier-tab">

			  			<h3> Vos croquettes selectionnées </h3>
			  		</div>
				</div>

			</div>
		</div>
	</body>
			<footer>
			<p> Copyright @Poussemagik 2018</p>
		</footer>
	</html>