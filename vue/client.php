<?php
    include 'entete.php';

    // Verifier si l'id de l'article est récupérer par url
    if (!empty($_GET['id'])) {
        $client = getClient($_GET['id']);
    }
?>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <form action="<?= !empty($_GET['id']) ? "../model/modifClient.php" : "../model/ajoutClient.php" ?>" method="post">

                    <label for="nom_client">Nom du client</label>
                    <input value= "<?= !empty($_GET['id'])? $client['nom'] : "" ?>" type="text" name="nom_client" id="nom_client" placeholder="Veuillez saisir le nom">
                    <input value= "<?= !empty($_GET['id'])? $client['id'] : "" ?>" type="hidden" name="id" id="id_client">
                    
                    <label for="nom_client">Prénom du client</label>
                    <input value= "<?= !empty($_GET['id'])? $client['prenom'] : "" ?>" type="text" name="prenom_client" id="prenom_client" placeholder="Veuillez saisir le Prénom">

                    <label for="adresse">Adresse</label>
                    <input value= "<?= !empty($_GET['id'])? $client['adresse'] : "" ?>" type="text" name="adresse" id="adresse" placeholder="Veuillez saisir l'adresse">

                    <label for="telephone">Téléphone</label>
                    <input value= "<?= !empty($_GET['id'])? $client['telephone'] : "" ?>" type="text" name="telephone" id="telephone" placeholder="Veuillez saisir le Num. de téléphone">

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
                        $clients = getClient();

                        if(!empty($clients) && is_array($clients)) {
                            foreach( $clients as $key => $value) {
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