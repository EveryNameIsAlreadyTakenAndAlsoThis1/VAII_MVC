<?php

namespace App\Controllers;

use App\Auth;
use App\Data;
use App\Core\AControllerBase;
use App\Models\Sponsor;
use App\Models\Tournament_user;
use App\Models\Tournament;

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
    public function tournament()
    {
        return $this->html(
            []
        );
    }

   public function joinTournament(){
       if (!Auth::isLogged()) {
           $this->redirect('home');
       }
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
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $tournamentId=$this->request()->getValue('tournamentId');
        $user = unserialize($_SESSION['user']);
        $tournament_user=\App\Models\Tournament_user::getAll("tournamentId=? AND userId=?",[$tournamentId,$user->id]);
        if(sizeof($tournament_user)>0){
            $toDelete=$tournament_user[0];
            $toDelete->customDelete();
        }
        $all=\App\Models\Tournament_user::getAll("tournamentId=?",[$tournamentId]);
        return $this->json(sizeof($all));
    }

    public function deleteTournament(){
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }
        $tournamentId=$this->request()->getValue('tournamentId');
        $tournament_user=\App\Models\Tournament_user::getAll("tournamentId=?",[$tournamentId]);
        $tournament=\App\Models\Tournament::getAll("id=?",[$tournamentId]);
        foreach ($tournament_user as $ts){
            $ts->customDelete();
        }
        foreach ($tournament as $ts){
            $ts->delete();
        }
        return true;

    }

    public function removeParticipant(){
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }
        $participantId=$this->request()->getValue('participantId');
        $tournamentId=$this->request()->getValue('tournamentId');
        $participant=\App\Models\Tournament_user::getAll("userId=? AND tournamentId=?",[$participantId,$tournamentId]);
        foreach ($participant as $p){
            $p->customDelete();
        }
        return true;
    }

    public function removeSponsor(){
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }
        $sponsorId=$this->request()->getValue('sponsorId');
        $tournamentId=$this->request()->getValue('tournamentId');
        $sponsors=\App\Models\Sponsor::getAll("id=?",[$sponsorId]);
        foreach($sponsors as $s){
            $s->delete();
        }
        $pricepool=0;
        $remainingPriceSponsors=\App\Models\Sponsor::getAll("tournamentId=?",[$tournamentId]);
        foreach ($remainingPriceSponsors as $r){
            $pricepool+=$r->sponsoring;
        }
        return $this->json($pricepool);
    }

    public function addTournament(){
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }
        $tournamentName=$this->request()->getValue('tournamentName');
        $tournamentGame=$this->request()->getValue('tournamentGame');

        $tournament=new Tournament();
        $tournament->name=$tournamentName;
        $tournament->game=$tournamentGame;
        $tournament->save();
        return $this->html("home","tournaments");
    }

    public function addSponsor(){
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }
        $sponsorName=$this->request()->getValue('sponsorName');
        $sponsorPool=$this->request()->getValue('sponsorPool');
        $tournamentId=$this->request()->getValue('tournamentId');

        $sponsor=new Sponsor();
        $sponsor->name=$sponsorName;
        $sponsor->sponsoring=$sponsorPool;
        $sponsor->tournamentId=$tournamentId;
        $sponsor->save();
        $_GET['q']=$tournamentId;
        return $this->html("home","tournament");
    }
}