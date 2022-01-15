<?php /** @var Array $data */ ?>
<div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
    <div class="carousel-indicators">
        <button aria-current="true" aria-label="Slide 1" class="active" data-bs-slide-to="0"
                data-bs-target="#carouselExampleIndicators" type="button"></button>
        <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators"
                type="button"></button>
        <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators"
                type="button"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img alt="..." class="d-block w-100" src="public/images/img.png">
        </div>
        <div class="carousel-item">
            <img alt="..." class="d-block w-100" src="public/images/img_1.png">
        </div>
        <div class="carousel-item">
            <img alt="..." class="d-block w-100" src="public/images/img_2.png">
        </div>
    </div>
    <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators"
            type="button">
        <span aria-hidden="true" class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators"
            type="button">
        <span aria-hidden="true" class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
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
                    <img class="figure-img img-fluid rounded" src=<?= $games[$x]->image;  ?> alt="">
                </form>
                <h2><?= $games[$x]->nameOfGame ?></h2>
                <p><?= $games[$x]->textOfGame ?> </p>
                <p><a class="btn btn-secondary" href=<?="?c=home&a=game&q=".$games[$x]->nameOfGame ?>>View details »</a></p>
            </div>
            <?php }?>
        </div>
</div>
