<?php

namespace App\Controllers;

use App\Data;
use App\Core\AControllerBase;
use App\Models\Tournament_user;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {
        return $this->html(
            []);
    }

    public function about()
    {
        return $this->html(
            []
        );
    }
    public function games()
    {
        return $this->html(
            []
        );
    }
    public function login()
    {
        return $this->html(
            []
        );
    }
    public function game()
    {
        return $this->html(
            []
        );
    }
    public function tournaments()
    {
        return $this->html(
            []
        );
    }

   public function joinTournament(){
        $tournamentId1=$this->request()->getValue('tournamentId');
        $user = unserialize($_SESSION['user']);
        $tournament_user=\App\Models\Tournament_user::getAll("tournamentId=? AND userId=?",[$tournamentId1,$user->id]);
        if(sizeof($tournament_user)==0){
            $tournament_user_new=new Tournament_user();
            $tournament_user_new->tournamentId=$tournamentId1;
            $tournament_user_new->userId=$user->id;
            $tournament_user_new->customSave();

        }
       $all=\App\Models\Tournament_user::getAll("tournamentId=?",[$tournamentId1]);
       return $this->json(sizeof($all));

    }

    public function leaveTournament(){
        $tournamentId=$this->request()->getValue('tournamentId');
        $user = unserialize($_SESSION['user']);
        $tournament_user=\App\Models\Tournament_user::getAll("tournamentId=? AND userId=?",[$tournamentId,$user->id]);
        if(sizeof($tournament_user)>0){
            $toDelete=$tournament_user[0];
            $toDelete->customDelete();
            $all=\App\Models\Tournament_user::getAll("tournamentId=?",[$tournamentId]);
        }
        return $this->json(sizeof($all));
    }
}