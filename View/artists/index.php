

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>


</style>
<div class=row>
    <?php foreach ($artists as $artist){?>
        <div class=col-md-4>
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
        </div>
        <?php
    }
    ?>
</div>