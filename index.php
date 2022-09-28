<?php
require_once('connectionDb.php');
include('header.php');
$db=connect();

$requete = $db->prepare("SELECT * FROM disc d JOIN artist a ON d.disc_id = a.artist_id ");
$requete->execute();
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);



?>

    <!-- Grille Responsive -->
    <div class="container py-5 bg-light">
    <h1>Liste des disques (15)</h1>
        <div class="row justify-content-around">
            <a href="formulaireAjout.php"class="formulaireAjout btn btn-outline-danger w-100" name = "disc_id" role="button" aria-pressed="true" >Ajouter un disque</a>
            <?php foreach ($tableau as $row)
            {
                ?>
                
                <!-- 576 XS - > 576px S > 768px M > 992px L > 1200px Extra Large-->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="assets/img/<?=$row->disc_picture; ?>" class=" card-image card-img-top mr-1 ml-1 " width="20rem" height="239px" alt="<?=$row->disc_picture; ?>" class="img-fluid rounded-start" alt="<?=$row->disc_picture; ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?=$row->disc_title;?></h5>
                                <p class="card-text">Label :<?= $row->disc_label;?></p>
                                <p class="card-text">Nom :<?= $row->artist_name;?></p>
                                <p class="card-text">Year :<?= $row->disc_year;?></p>
                                <p><a href="details.php?disc_id=<?=$row->disc_id?>" class="btn btn-primary">Détails</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            
        </div>
    </div>
    
    
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

