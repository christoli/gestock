<?php
    include 'entete.php';
?>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <form action="../model/ajoutArticle.php" method="post">
                    <label for="nom_article">Nom de l'article</label>
                    <input type="text" name="nom_article" id="nom_article" placeholder="Veuillez saisir le nom">
                    
                    <label for="categorie">Categorie</label>
                    <select name="categorie" id="categorie">
                        <option value="Ordinateur">Ordinateur</option>
                        <option value="Imprimante">Imprimante</option>
                        <option value="Accessoire">Accessoire</option>
                    </select>

                    <label for="quantite">Quantité</label>
                    <input type="number" name="quantite" id="quantite" placeholder="Veuillez saisir la quantité">

                    <label for="prix_unitaire">Prix unitaire</label>
                    <input type="text" name="prix_unitaire" id="prix_unitaire" placeholder="Veuillez saisir le prix">

                    <label for="date_fabrication">Date de fabrication</label>
                    <input type="datetime-local" name="date_fabrication" id="date_fabrication">

                    <label for="date_expiration">Date d'expiration'</label>
                    <input type="datetime-local" name="date_expiration" id="date_expiration">

                    <button type="submit">Valider</button>
                </form>
            </div>
        </div>
    </div>
    </section>

<?php
    include 'pied.php';
?>