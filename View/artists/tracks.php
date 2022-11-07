<?php
use App\Autoloader;
use App\Entity\Track;

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<div>
    <div class="list-group">
        <?php foreach ($tracks as $track){?>
            <div class=col-md-4>
                <div class="card-body">
                    
                    <p class="card-text"><?= $track->getTrack_number()?> <?= $track->getName()?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>