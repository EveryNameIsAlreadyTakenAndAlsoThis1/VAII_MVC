<?php
/** @var Array $data */ ?>

<!--content-->
<div class="container" id="gameContent">
    <hr class="divider">

    <input id="myInput" type="text" placeholder="Search..">
    <br><br>

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
        $tournamentss = \App\Models\Tournament::getAll();
         for ($x = 0; $x < sizeof($tournamentss); $x++){?>
             <tr id=<?="trId".$tournamentss[$x]->id?> >
            <td><?= $tournamentss[$x]->id?></td>
                 <td><a href=<?= "?c=home&a=tournament&q=".$tournamentss[$x]->id?>><?= $tournamentss[$x]->name?></a></td>
            <td><a href=<?= "?c=home&a=game&q=".$tournamentss[$x]->game?>><?= $tournamentss[$x]->game?></a></td>
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
    <hr>
    <?php if(\App\Auth::isAdmin()){?>
        <div id="addTable">
            <input id="nameT" type="text" placeholder="Name of the tournament">
            <input id="gameT" type="text" placeholder="Game">
            <button type="button" class="btn btn-outline-success insert" >Insert</button></td>
        </div>
        <?php }?>
    <hr>


</div>