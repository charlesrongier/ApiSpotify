<?php
use App\Autoloader;
use App\Entity\Artist;
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<div class=row>
    <?php foreach ($albums as $album){?>
        <div class=col-md-4>
            <a href="/artist/tracks/?idAlbum=<?= $album->getId_album_spotify() ?>">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php if($album->getPicture()!==null){ echo($album->getPicture()); } 
                    else{ echo("https://i.insider.com/58f66e6bc75d4a20058b537c?width=1000&format=jpeg&auto=webp");} ?>" alt="Image d album">
                    <div class="card-body">
                        <h5 class="card-title">Name : <?= $album->getName()?></h5>
                        <p class="card-text">Date de sortie : <?= $album->getRelease_date()?></p>
                        <p class="card-text">Id : <?= $album->getId_album_spotify() ?></p>
                        <p class="card-text">Nombre de titre : <?= $album->getTotal_tracks() ?></p>
                        <p class="card-text">Type : <?= $album->getType() ?></p>
                        <form action="/artist/add_favoris_album" method="post" class="d-flex">
                            <input type="hidden" name="album" value='<?= str_replace("'", "`",json_encode($album))?>'>
                            <button class="btn btn-danger mb-3" type="submit">Ajouter au favoris</button>
                        </form>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>
