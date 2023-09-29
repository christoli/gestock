<?php
    include 'entete.php';

    // Verifier si l'id de l'article est récupérer par url
    if (!empty($_GET['id'])) {
        $fournisseur = getFournisseur($_GET['id']);
    }
?>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <form action="<?= !empty($_GET['id']) ? "../model/modifFournisseur.php" : "../model/ajoutFournisseur.php" ?>" method="post">

                    <label for="nom_fournisseur">Nom du fournisseur</label>
                    <input value= "<?= !empty($_GET['id'])? $fournisseur['nom'] : "" ?>" type="text" name="nom_fournisseur" id="nom_fournisseur" placeholder="Veuillez saisir le nom">
                    <input value= "<?= !empty($_GET['id'])? $fournisseur['id'] : "" ?>" type="hidden" name="id" id="id_fournisseur">
                    
                    <label for="nom_fournisseur">Prénom du fournisseur</label>
                    <input value= "<?= !empty($_GET['id'])? $fournisseur['prenom'] : "" ?>" type="text" name="prenom_fournisseur" id="prenom_fournisseur" placeholder="Veuillez saisir le Prénom">

                    <label for="adresse">Adresse</label>
                    <input value= "<?= !empty($_GET['id'])? $fournisseur['adresse'] : "" ?>" type="text" name="adresse" id="adresse" placeholder="Veuillez saisir l'adresse">

                    <label for="telephone">Téléphone</label>
                    <input value= "<?= !empty($_GET['id'])? $fournisseur['telephone'] : "" ?>" type="text" name="telephone" id="telephone" placeholder="Veuillez saisir le Num. de téléphone">

                    <button type="submit">Valider</button>

                    <?php
                        if(!empty($_SESSION['message']['text'])) {
                    ?>
                        <div class="alert <?=$_SESSION['message']['type']?>">
                            <?= $_SESSION['message']['text']; ?>
                        </div>
                    <?php
                        }
                    ?>
                </form>
            </div>
            <div class="box">
                <table class="mtable">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $fournisseurs = getFournisseur();

                        if(!empty($fournisseurs) && is_array($fournisseurs)) {
                            foreach( $fournisseurs as $key => $value) {
                    ?>
                                <tr>
                                    <td><?=$value['nom'] ?></td>
                                    <td><?=$value['prenom'] ?></td>
                                    <td><?=$value['adresse'] ?></td>
                                    <td><?=$value['telephone'] ?></td>
                                    <td><a href="?id=<?=$value['id'] ?>"><i class='bx bx-edit-alt'></i></a></td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </section>

<?php
    include 'pied.php';
?>