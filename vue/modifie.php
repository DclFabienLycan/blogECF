<?php

// On démarre une session si aucune n'est présente
if(session_status() == PHP_SESSION_NONE) {
    session_start();
    $user = new stdClass();
    $user = $_SESSION['auth'];
}

// Appel de la BDD
require '../modele/pdo.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Blog</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #303030;">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">More</button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="articles.php">Articles</a>
                    </li>
                    <?php if ($_SESSION['auth']){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <?php if($user->idRole == 2 || $user->idRole == 1){ ?>
                                <a class="dropdown-item" href="modifie.php">Modifier un article</a>
                                <a class="dropdown-item" href="proposition.php">Proposer un article</a>
                                <?php if($user->idRole == 1){ ?>
                                <a class="dropdown-item" href="#">Archiver un article</a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 boutonSearch" type="submit">Search</button>
                </form>
                <div class="formBouton">
                    <?php if($_SESSION) { ?>
                        <a name="logout" id="logout" class="btn btn-primary" href="../controller/logout.php" role="button">Déconnexion</a>
                    <?php } else { ?>
                        <a name="SignIn" id="register" class="btn btn-primary" href="register.php" role="button">Inscription</a>
                        <a name="Login" id="log" class="btn btn-primary" href="login.php" role="button">Connexion</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container afficherArticle mb-4 pt-2">
            <?php
                if($user->idRole == 2) {
                    $id = $user->idUtilisateur;
                    $resultat = $pdo->prepare("SELECT * FROM article NATURAL JOIN utilisateur WHERE statut = '0' AND archiver = '0' AND idUtilisateur = :id");
                    $resultat->bindParam(':id', $id);
                    $resultat->execute();
                    $selectResultats = $resultat->fetchAll();
                } else {
                    $resultat = $pdo->prepare("SELECT * FROM article NATURAL JOIN utilisateur WHERE statut = '0' AND statut = '1' OR archiver = '0'");
                    $resultat->execute();
                    $selectResultats = $resultat->fetchAll();
                }    

                foreach($selectResultats as $selectResultat) { ?>
                <div class="articleResult">
                    <h1 class="text-center">Article publié par : <?= $selectResultat->prenomUtilisateur ?></h1>
                    <form action="../controller/traitementArticle.php" method="POST" class="mt-4">
                    <div class="container">
                        <div class="form-row">
                            <div class="col-sm-3 offset-md-3">
                                <label for="nom">Nom :</label>
                                <input name="nom" type="text" value="<?= $selectResultat->nomArticle ?>">
                                <input type="hidden" name="idArticle" value="<?= $selectResultat->idArticle ?>">
                            </div>
                            <div class="col-sm-3">
                                <label for="">Date de publication :</label>
                                <div><?= $selectResultat->dateArticle ?></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 offset-md-3">
                                <label for="contenuArticle" class="col-form-label">Contenu de l'article :</label>
                                <textarea name="contenuArticle" id="article" cols="30" rows="10" maxlenght="500"><?= $selectResultat->contenuArticle ?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="modifier" id="sub" class="btn btn-outline-info offset-md-3 mr-2 mt-2">Modifier</button>
                    <?php if($user->idUtilisateur == 1){ ?>
                    <button type="submit" name="publier" id="sub" class="btn btn-outline-info mr-2 mt-2">Publier</button>
                    <button type="submit" name="supprimer" id="sub" class="btn btn-danger mr-5 mt-2">Supprimer</button>
                    <button type="submit" name="archiver" id="sub" class="btn btn-danger mt-2">Archiver</button>
                    <?php } ?>
                    </form>
                </div>
            <?php } ?>
        </div>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
