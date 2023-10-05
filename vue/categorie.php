<?php
    include 'entete.php';

    // Verifier si l'id de l'article est récupérer par url
    if (!empty($_GET['id'])) {
        $article = getCategorie($_GET['id']);
    }
?>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <form action="<?= !empty($_GET['id']) ? "../model/modifCategorie.php" : "../model/ajoutCategorie.php" ?>" method="post">
                    <label for="libelle_categorie">Nom de l'article</label>
                    <input value= "<?= !empty($_GET['id'])? $article['libelle_categorie'] : "" ?>" type="text" name="libelle_categorie" id="libelle_categorie" placeholder="Veuillez saisir le nom">
                    <input value= "<?= !empty($_GET['id'])? $article['id'] : "" ?>" type="hidden" name="id" id="id_article">

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
                        <th>Libelle</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $categories = getCategorie();

                        if(!empty($categories) && is_array($categories)) {
                            foreach( $categories as $key => $value) {
                    ?>
                                <tr>
                                    <td><?=$value['libelle_categorie'] ?></td>
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