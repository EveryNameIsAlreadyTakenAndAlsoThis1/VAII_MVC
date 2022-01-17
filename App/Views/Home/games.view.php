<?php /** @var Array $data */ ?>

<!--content-->

<div class="container " id="contentGames">
    <hr class="divider">
    <?php
    $games = \App\Models\Game::getAll();
    ?>
        <div class="row">
            <?php   for ($x = 0; $x < sizeof($games); $x++) {?>
            <div class="col-lg-4">
                <form class="gameImg">
                    <img alt="" class="figure-img img-fluid rounded" src=<?= $games[$x]->image;  ?>>
                </form>
                <h2><?= $games[$x]->nameOfGame ?></h2>
                <p><?= $games[$x]->textOfGame ?> </p>
                <p><a class="btn btn-secondary" href="<?="?c=home&a=game&q=".$games[$x]->nameOfGame ?>">View details »</a></p>
            </div>
            <?php }?>
        </div>
</div>
