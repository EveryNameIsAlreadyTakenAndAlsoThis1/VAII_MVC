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
            <th>Join</th>
        </tr>
        </thead>
        <tbody id="myTable">
        <?php
        $tournamentss = \App\Models\Tournament::getAll();
         for ($x = 0; $x < sizeof($tournamentss); $x++){?>
        <tr>
            <td><?= $tournamentss[$x]->id?></td>
            <td><?= $tournamentss[$x]->name?></td>
            <td><?= $tournamentss[$x]->game?></td>
            <td id=<?="numberOfPlayers".$tournamentss[$x]->id?>><?= sizeof($t=\App\Models\Tournament_user::getAll("tournamentId=?",[$tournamentss[$x]->id])) ?></td>
            <td><button value=<?= $tournamentss[$x]->id?> type="button" class="btn btn-outline-success join" >join</button>
                <button value=<?= $tournamentss[$x]->id?> type="button" class="btn btn-outline-danger leave" >leave</button></td>
        </tr>
         <?php }?>
        </tbody>
    </table>

</div>