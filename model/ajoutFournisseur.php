<?php
session_start();
include "connexion.php";

if (
    !empty($_POST['nom_fournisseur'])
    && !empty($_POST['prenom_fournisseur'])
    && !empty($_POST['adresse'])
    && !empty($_POST['telephone'])
) {

    $sql = "INSERT INTO fournisseur(nom, prenom, adresse, telephone)
            VALUES(?, ?, ?, ?)";

    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom_fournisseur'],
        $_POST['prenom_fournisseur'],
        $_POST['adresse'],
        $_POST['telephone']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Fournisseur ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout du fournisseur";
        $_SESSION['message']['type'] = "danger";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée";
    $_SESSION['message']['type'] = "danger";
}

// Rediretion vers la page d'ajout du fournisseur
header('Location: ../vue/fournisseur.php');