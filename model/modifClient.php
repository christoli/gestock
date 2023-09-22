<?php
session_start();
include "connexion.php";

if (
    !empty($_POST['nom_client'])
    && !empty($_POST['prenom_client'])
    && !empty($_POST['adresse'])
    && !empty($_POST['telephone'])
    && !empty($_POST['id'])
) {

    $sql = "UPDATE client SET nom=?, prenom=?, adresse=?, telephone=?
            WHERE id=?";

    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom_client'],
        $_POST['prenom_client'],
        $_POST['adresse'],
        $_POST['telephone'],
        $_POST['id']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Client modifié avec succès";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Rien n'a été modifié";
        $_SESSION['message']['type'] = "warning";
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée";
    $_SESSION['message']['type'] = "danger";
}

// Rediretion vers la page d'ajout du client
header('Location: ../vue/client.php');