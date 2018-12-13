<?php require 'include.php'; ?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>WoW -- Guilde NO STRESS | Intendance </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header class="row justify-content-md-center">
			<div class ="col-md-9">
				<div class="row">
					<div class="col-md-8">
						<h1> Intendance - No Stress - Culte de la rive noire </h1>
					</div>
					<div class="col-md-4">
						<div class="dropdown text-right">
							<?php 
								if(!isset($_SESSION['pseudo'])) : ?>
									<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
									<div class="dropdown-menu">
										<form method="post" class="px-4 py-3">
											<div class="form-group">
												<label for="email">Adresse mail</label>
												<input type="email" class="form-control" name="email" id="email" placeholder="email@example.com">
												<input type="hidden" name="logpost">
											</div>
											<div class="form-group">
												<label for="mdp">Mot de passe</label>
												<input type="password" class="form-control" name="mdp" id="mdp" placeholder="Password">
											</div>
											<button type="submit" class="btn btn-primary">Connexion</button>
										</form>
										<div class="dropdown-divider"></div>
									</div>
							<?php else : ?>	
									<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello <?= $_SESSION['pseudo']; ?></a>
									<div class="dropdown-menu"> 
										<a href="deconnexion.php" class="btn btn-secondary btn-sm mx-5" >Se déconnecter</a>

									</div>


							<?php endif; ?>	
						</div>
					</div>
				</div>
			</div>	
		</header>
		<div class="row justify-content-md-center mt-10">
			<div class="col-md-8">
				<div class="row px-3 py-3 pt-5 rounded content">
					<div class="col-md-12">
						<?php if (isset($erreurLogin)) : ?>
						<p class="error"> <?=  $erreurLogin; ?> </p>
						<?php endif; ?>
					</div>
					<div class="col-md-8">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="accueil-tab" data-toggle="tab" href="#accueil" role="tab" aria-controls="accueil" aria-selected="true">Accueil</a>
							</li>
							<?php if(isset($_SESSION['pseudo'])) : ?>
							<li class="nav-item">
								<a class="nav-link" id="donation-tab" data-toggle="tab" href="#donation" role="tab" aria-controls="donation" aria-selected="false">Donation</a>
							</li>
							<?php endif; ?>
							<?php if(isset($_SESSION['pseudo']) && $_SESSION['role'] > 0) : ?>
							<li class="nav-item">
								<a class="nav-link" id="historique-tab" data-toggle="tab" href="#historique" role="tab" aria-controls="historique" aria-selected="false">Historique</a>
							</li>
						<?php endif; ?>
						</ul>
						<div class="tab-content pt-3" id="myTabContent">
							<div class="tab-pane fade show active" id="accueil" role="tabpanel" aria-labelledby="accueil-tab">
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col"></th>
											<th scope="col">Bilan des stocks</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Besoin prioritaire</th>
											<td>Ancoracée, Mousse étoilée, Croc-pointu frénétique, Brin de mer</td>
										</tr>
										<tr>
											<th scope="row">Besoin secondaire</th>
											<td> Cuissot charnu, saumon de minuit</td>
										</tr>
										<tr>
											<th scope="row">Déjà en stock</th>
											<td>Mâche d'Akunda, Rivebulbe, Bise d'hiver, Loche à caudale rouge, Filet filandreux</td>
										</tr>
										<tr>
											<th scope="row">Festins en stock</th>
											<td>4 jours de raid</td>
										</tr>
										<tr>
											<th scope="row">Chaudrons en stock</th>
											<td>10 jours de raid</td>
										</tr>
									</tbody>
								</table>
							</div>
			<div class="tab-pane fade" id="donation" role="tabpanel" aria-labelledby="donation-tab">
				<h3>Ajout de composants </h3>
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-flacon" role="tab" aria-controls="pills-home" aria-selected="true">Plantes</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-festin" role="tab" aria-controls="pills-profile" aria-selected="false">Nourriture</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-pf-tab" data-toggle="pill" href="#pills-pf" role="tab" aria-controls="pills-pf" aria-selected="false">Flacons et festins</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link disabled" id="pills-contact-tab" data-toggle="pill" href="#pills-rune" role="tab" aria-controls="pills-contact" aria-selected="false">Runes</a>
					  </li>
				</ul>
				<div class="tab-content py-4" id="pills-tabContent">
				  	<div class="tab-pane fade show active" id="pills-flacon" role="tabpanel" aria-labelledby="pills-home-tab">
						<form method="post">
							<?php
								$compo = fetch(1);
								if (!is_array($compo)) :
								echo $compo;
								else :
									foreach($compo as $line) : ?>
										<div class="form-group row" id="row-<?= $line->id_composant; ?>">
											
							    			<div class="col-md-6"><?= $line->nom;  ?> </div>
											<div class="col-md-6">
												<label for="qty-<?= $line->id_composant; ?>" class="form-label-inline pr-4">Quantité : </label>
												<input type="text" class="form-control-inline " id="qty-<?= $line->id_composant; ?>" name="qty[<?= $line->id_composant; ?>]">
												<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
											</div>
											
										</div>
										
								<?php	
								endforeach;
								endif;
								?>
							<div class="form-group row">
										    <div class="col-sm-10">
										    <input type="hidden" name="compoPost">
										      <button type="submit" class="btn btn-primary">Go !</button>
										    </div>
										</div>	
						</form>
				  	</div> <!-- Fin flacon -->
				  	<div class="tab-pane fade" id="pills-festin" role="tabpanel" aria-labelledby="pills-profile-tab">
				  		<form method="post">
							<?php
								$compo = fetch(2);
								if (!is_array($compo)) :
								echo $compo;
								else :
									foreach($compo as $line) : ?>
										<div class="form-group row">
											<div class="col-md-6"><?= $line->nom;  ?> </div>
											<div class="col-md-6">
												<label for="qty-<?= $line->id_composant; ?>" class="form-label-inline pr-4">Quantité : </label>
												<input type="text" class="form-control-inline " id="qty-<?= $line->id_composant; ?>" name="qty[<?= $line->id_composant; ?>]">
												<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
											</div>
										</div>
										
								<?php	
								endforeach;
								endif;
								?>
							<div class="form-group row">
										    <div class="col-sm-10">
										    <input type="hidden" name="compoPost">
										      <button type="submit" class="btn btn-primary">Go !</button>
										    </div>
										</div>	
						</form>
				  	</div> <!-- Fin festin -->
				  	<div class="tab-pane fade show" id="pills-pf" role="tabpanel" aria-labelledby="pills-pf-tab">
						<form method="post">
							<?php
								$pf = fetchPf();
								if (!is_array($pf)) :
								echo $pf;
								else :
									foreach($pf as $line) : ?>
										<div class="form-group row">
											<div class="col-md-6"><?= $line->libelle;  ?> </div>
											<div class="col-md-6">
												<label for="qty-<?= $line->id_pf; ?>" class="form-label-inline pr-4">Quantité : </label>
												<input type="text" class="form-control-inline " id="qty-<?= $line->id_pf; ?>" name="qty[<?= $line->id_pf; ?>]">
											</div>
										</div>
								<?php	
									endforeach;
								endif;
								?>
							<div class="form-group row">
							    <div class="col-sm-10">
							    	<input type="hidden" name="pfPost">
							      	<button type="submit" class="btn btn-primary">Go !</button>
							    </div>
							</div>	
						</form>
				  	</div> <!-- Fin flacon -->
				  	<div class="tab-pane fade" id="pills-rune" role="tabpanel" aria-labelledby="pills-contact-tab">
				  	</div> <!-- Fin rune -->
				</div>
				<!--</div> Fin div pour padding -->
			</div>
			<div class="tab-pane fade" id="historique" role="tabpanel" aria-labelledby="historique-tab">...</div>
		</div>
	</div><!-- col8 -->
	<div class="col-md-4">
		<h2 class="rounded pl-2">RECRUTEMENT</h2>
		Etiam efficitur ipsum eu dui dictum ultricies. Nulla dolor eros, tristique sed faucibus a, ultricies quis nunc. Etiam imperdiet interdum tellus eget fermentum. Praesent tempus varius dui et rutrum. Ut auctor nulla purus, at suscipit orci tincidunt non. Morbi convallis malesuada diam, sit amet egestas nisl mattis dictum. Duis vel odio lacus. Donec ultrices a risus sit amet porta. Maecenas at imperdiet lorem. Aliquam facilisis congue felis, in blandit sem sagittis quis. Etiam vel tincidunt ipsum. Suspendisse eu leo id sapien molestie scelerisque at in enim. Sed ac pretium elit.
	</div>

	</div><!-- raw2 -->
	</div> <!-- colmd7 -->
	</div> <!-- first raw -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="script.js"></script>
	</body>
</html>
