<?php 

require '../modele/pdo.php';

if (isset($_POST['login']))
{

/* on test si les champ sont bien remplis */
    if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['mail']) and !empty($_POST['password']) and !empty($_POST['passwordConfirm']))
    {
        $connect = $pdo->prepare("SELECT * FROM utilisateur WHERE prenomUtilisateur = :prenom");
        $connect->bindParam(':prenom', $_POST['prenom']);
        $connect->execute();
        $user = $connect->fetch();

        if ($user) {
            echo '<div class="alert alert-primary" role="alert"><p><strong>Ce nom est déjà pris</strong></p></div>';
            exit;
        } else {
            if ($_POST['password'] === $_POST['passwordConfirm']) {
                $creationUtilisateur = $pdo->prepare("INSERT INTO utilisateur SET nomUtilisateur = :nom, prenomUtilisateur = :prenom, motDePasse = :password, emailUtilisateur = :mail, idRole = '2'");
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $creationUtilisateur->bindParam(':nom', $_POST['nom']);
                $creationUtilisateur->bindParam(':prenom', $_POST['prenom']);
                $creationUtilisateur->bindParam(':mail', $_POST['mail']);
                $creationUtilisateur->bindParam(':password', $password);
                $creationUtilisateur->execute();
            }
        }
    }
    header('Location: ../index.php');
}
