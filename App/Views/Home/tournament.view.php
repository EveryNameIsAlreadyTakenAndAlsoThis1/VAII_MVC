<?php /** @var Array $data */ ?>

<!--content-->
<div class="container" id="gameContent">
    <hr class="divider">
    <?php
    $tournament = \App\Models\Tournament::getAll("id=?",[$_GET['q']]);
    $sponsors=\App\Models\Sponsor::getAll("tournamentId=?",[$_GET['q']]);
    $pricepool=0;
    foreach ($sponsors as $s){
        $pricepool+=$s->sponsoring;
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row" id="Game">
                <h3><?= $tournament[0]->name ?></h3>
                <p>
                   Game:
                <a href="<?= "?c=home&a=game&q=".$tournament[0]->game?>"><?= $tournament[0]->game?></a>
                    <br>

                </p>
                <p >
                    Price pool: <a id="pricePool"><?= $pricepool?></a> EUR
                </p>
            </div>
        </div>
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>Participant id</th>
                <th>Participant nickname</th>
                <th>Participant email</th>
                <?php
                if(\App\Auth::isAdmin()){
                    ?><th>Remove participant</th><?php

                }
                ?>
            </tr>
            </thead>
            <tbody id="myTable">
            <?php
            $ts=\App\Models\Tournament_user::getAll("tournamentId=?",[$_GET['q']]);
            for ($x = 0; $x < sizeof($ts); $x++){
                $user=\App\Models\User::getAll("id=?",[$ts[$x]->userId]);
                ?>
                <tr id="<?="trId".$user[0]->id?>" >
                    <td><?= $user[0]->id?></td>
                    <td><?= $user[0]->nickname?></td>
                    <td><?= $user[0]->email?></td>
                    <?php
                    if(\App\Auth::isAdmin()){
                        ?><td><button value="<?=$user[0]->id."_".$_GET['q']?>" type="button" class="btn btn-outline-danger remove" >remove</button></td><?php
                    }?>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <hr>
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>Sponsor id</th>
                <th>Sponsor name</th>
                <th>Sponsoring pool</th>
                <?php
                if(\App\Auth::isAdmin()){
                    ?><th>Remove Sponsor</th><?php
                } ?>
            </tr>
            </thead>
            <tbody id="myTable2">
            <?php
            for ($x = 0; $x < sizeof($sponsors); $x++){
                ?>
                <tr id="<?="trId".$sponsors[$x]->id?>" >
                    <td><?= $sponsors[$x]->id?></td>
                    <td><?= $sponsors[$x]->name?></td>
                    <td><?= $sponsors[$x]->sponsoring." EUR"?></td>
                    <?php
                    if(\App\Auth::isAdmin()){
                        ?><td><button value=<?=$sponsors[$x]->id."_".$_GET['q']?> type="button" class="btn btn-outline-danger removeSponsor" >remove</button></td><?php
                    }?>
                </tr>
            <?php }?>
            </tbody>
        </table>
        <?php if(\App\Auth::isAdmin()){?>

            <div id="addTable">
                <input id="nameT" type="text" placeholder="Name of sponsor">
                <input id="poolT" type="text" placeholder="Sponsoring pool">
                <button value="<?=$_GET['q']?>" type="button" class="btn btn-outline-success insertSponsor" >Insert</button>
            </div>
        <?php }?>
        <div class="row">
        </div>
    </div>
    <div class="row">
    </div>
</div>