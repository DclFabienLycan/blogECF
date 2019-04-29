<?php

require '../modele/pdo.php';

if(isset($_POST['modifier'])) {

    $select = $pdo->prepare("SELECT * FROM article WHERE archiver = '0'");
    $select->execute();
    $select->fetch();

    if(!empty($_POST['nom']) && !empty($_POST['contenuArticle'])) {

        $update = $pdo->prepare("UPDATE article SET nomArticle = :nom, contenuArticle = :contenu, dateArticle = NOW() WHERE idArticle = :id");
        $update->bindParam(':nom', $_POST['nom']);
        $update->bindParam(':contenu', $_POST['contenuArticle']);
        $update->bindParam(':id', $_POST['idArticle']);
        $update->execute();
    }
}

if(isset($_POST['supprimer'])) {

    $select = $pdo->prepare("SELECT * FROM article WHERE archiver = '0'");
    $select->execute();
    $select->fetch();

    if(!empty($_POST['nom']) && !empty($_POST['contenuArticle'])) {

        $delete = $pdo->prepare("DELETE FROM article WHERE idArticle = :id AND archiver = '0' AND statut = '0'");
        $delete->bindParam(':id', $_POST['idArticle']);
        $delete->execute();
    }
}

if(isset($_POST['publier'])) {

    $select = $pdo->prepare("SELECT * FROM article WHERE archiver = '0'");
    $select->execute();
    $select->fetch();

    if(!empty($_POST['nom']) && !empty($_POST['contenuArticle'])) {

        $post = $pdo->prepare("UPDATE article SET statut = '1' WHERE statut ='0' AND idArticle = :id");
        $post->bindParam(':id', $_POST['idArticle']);
        $post->execute();
    }
}

if(isset($_POST['archiver'])) {

    $select = $pdo->prepare("SELECT * FROM article WHERE archiver = '0'");
    $select->execute();
    $select->fetch();

    if(!empty($_POST['nom']) && !empty($_POST['contenuArticle'])) {

        $post = $pdo->prepare("UPDATE article SET archiver = '1' WHERE archiver ='0' AND idArticle = :id");
        $post->bindParam(':id', $_POST['idArticle']);
        $post->execute();
    }
}

header('Location: ../vue/modifie.php');