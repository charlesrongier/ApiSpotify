<?php
use App\Autoloader;
use App\Entity\Artist;
?>

<div class=row>
    <?php foreach ($albums as $album){?>
        <div class=col-md-4>
            <a href="/artist/tracks/?idAlbum=<?= $album->getId() ?>">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php if($album->getPicture()!==null){ echo($album->getPicture()); } 
                    else{ echo("https://i.insider.com/58f66e6bc75d4a20058b537c?width=1000&format=jpeg&auto=webp");} ?>" alt="Image d album">
                    <div class="card-body">
                        <h5 class="card-title">Name : <?= $album->getName()?></h5>
                        <p class="card-text">Date de sortie : <?= $album->getRelease_date()?></p>
                        <p class="card-text">Id : <?= $album->getId() ?></p>
                        <p class="card-text">Nombre de titre : <?= $album->getTotal_tracks() ?></p>
                        <p class="card-text">Type : <?= $album->getType() ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>
