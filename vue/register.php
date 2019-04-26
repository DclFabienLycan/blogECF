<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>SignIn</title>
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
                        <a class="nav-link" href="#">Articles</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Modifier un article</a>
                            <a class="dropdown-item" href="#">Proposer un article</a>
                            <a class="dropdown-item" href="#">Archiver un article</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <a name="SignIn" id="register" class="btn btn-primary" href="vue/register.php" role="button">Inscription</a>
            </div>
        </nav>
    </header>
    <form action="../controller/traitementRegister.php" method="POST">
        <div class="container formulaire">
            <div class="form-row">
                <div class="col-sm-3 offset-md-2">
                    <label for="" class="col-form-label">Nom :</label>
                    <input type="text" class="form-control" name="nom" placeholder="Votre Nom" required>
                </div>
                <div class="col-sm-3">
                    <label for="" class="col-form-label">Prénom :</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Votre Prénom" value="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-3 offset-md-2">
                    <label for="" class="col-form-label">Email :</label>
                    <input type="email" class="form-control" name="mail" placeholder="Votre email" value="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-3 offset-md-2">
                    <label for="" class="col-form-label">Mot de passe :</label>
                    <input type="password" class="form-control" name="password" placeholder="Votre Mot de passe" value="" required>
                </div>
                <div class="col-sm-3">
                    <label for="" class="col-form-label">Confirmation mot de passe :</label>
                    <input type="password" class="form-control" name="passwordConfirm" placeholder="Confirmez votre mot de passe" value="" required>
                </div>
            </div>
            <button type="submit" name="login" id="login" class="btn btn-outline-info offset-md-2 mt-2">Inscription</button>
        </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>