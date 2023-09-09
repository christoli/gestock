<?php
include "connexion.php";

if (
    !empty($_POST['nom_article'])
    && !empty($_POST['categorie'])
    && !empty($_POST['quantite'])
    && !empty($_POST['prix_unitaire'])
    && !empty($_POST['date_fabrication'])
    && !empty($_POST['date_expiration'])
) {

    $sql = "INSERT INTO article(nom_article, categorie, quantite, prix_unitaire, date_fabrication, date_expiration)
            VALUES(?, ?, ?, ?, ?, ?)";

    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom_article'],
        $_POST['categorie'],
        $_POST['quantite'],
        $_POST['prix_unitaire'],
        $_POST['date_fabrication'],
        $_POST['date_expiration']
    ));

    if ($req->rowCount() != 0) {
        echo "Article ajoutée avec succès";
    } else {
        echo "Une erreur s'est produite lors de l'ajout de l'article";
    }
} else {
    echo "Une information obligatoire non renseignée";
}