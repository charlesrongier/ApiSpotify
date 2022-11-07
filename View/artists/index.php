<?php
use App\Autoloader;
use App\Entity\Artist;
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<h2>Search Bar</h2>
<form action="/artist/index/" method="get" class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-danger mb-3" type="submit">Search</button>
</form>

<div class=row>
    <?php foreach ($artists as $artist){?>
        <div class=col-md-4>
            <a href="/artist/profil/?id=<?= $artist->getId() ?>">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php if($artist->getPicture()!==null){ echo($artist->getPicture()); } 
                    else{ echo("https://i.insider.com/58f66e6bc75d4a20058b537c?width=1000&format=jpeg&auto=webp");} ?>" alt="Image d album">
                    <div class="card-body">
                        <h5 class="card-title">Name : <?= $artist->getName()?></h5>
                        <p class="card-text">Followers : <?= $artist->getFollowers()?></p>
                        <p class="card-text">Id : <?= $artist->getId() ?></p>
                        <p class="card-text">Link : <?= $artist->getLink() ?></p>
                        <p class="card-text">Genres : <?= $artist->getGenders() ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>
