<?php /** @var Array $data */ ?>

<!--content-->
<div class="container" id="gameContent">
    <hr class="divider">
    <?php
    $game = \App\Models\Game::getAll("nameOfGame=?",[$_GET['q']]);
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row" id="Game">
                <h3><?= $game[0]->nameOfGame ?></h3>
                <form class="gameImg">
                    <img class="figure-img img-fluid rounded" src=<?= $game[0]->image;  ?> alt="">

                </form>
                <p>
                    <?= $game[0]->textOfGame;  ?>
                </p>

            </div>

        </div>
        <div class="row">

        </div>

    </div>
    <div class="row">

    </div>

</div>