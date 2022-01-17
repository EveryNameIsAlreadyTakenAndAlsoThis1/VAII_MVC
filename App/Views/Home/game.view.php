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
                    <img alt="" class="figure-img img-fluid rounded" src=<?= $game[0]->image;  ?>>

                </form>
                <p>
                    <?= $game[0]->textOfGame;  ?>
                </p>
            </div>
        </div>
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Name of the tournament</th>
                <th>Game</th>
                <th>Number of players</th>
                <?php if(\App\Auth::isLogged()){
                    ?><th>Join/Leave</th>
                <?php }
                if(\App\Auth::isAdmin()){
                    ?><th>Delete</th><?php

                }
                ?>
            </tr>
            </thead>
            <tbody id="myTable">
            <?php
            $tournamentss = \App\Models\Tournament::getAll("game=?",[$game[0]->nameOfGame]);
            for ($x = 0; $x < sizeof($tournamentss); $x++){?>
                <tr id=<?="trId".$tournamentss[$x]->id?> >
                    <td><?= $tournamentss[$x]->id?></td>
                    <td><a href=<?= "?c=home&a=tournament&q=".$tournamentss[$x]->id?>><?= $tournamentss[$x]->name?></a></td>
                    <td><?= $tournamentss[$x]->game?></td>
                    <td id=<?="numberOfPlayers".$tournamentss[$x]->id?>><?= sizeof($t=\App\Models\Tournament_user::getAll("tournamentId=?",[$tournamentss[$x]->id])) ?></td>
                    <?php if(\App\Auth::isLogged()){
                    ?><td><button value=<?= $tournamentss[$x]->id?> type="button" class="btn btn-outline-success join" >join</button>
                        <button value=<?= $tournamentss[$x]->id?> type="button" class="btn btn-outline-danger leave" >leave</button></td>
                    <?php }
                    if(\App\Auth::isAdmin()){
                    ?><td><button value=<?= $tournamentss[$x]->id?> type="button" class="btn btn-outline-danger delete" >delete</button></td><?php
                    }?>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <div class="row">
        </div>
    </div>
    <div class="row">
    </div>
</div>