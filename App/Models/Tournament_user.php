<?php

namespace App\Models;

use App\Core\Model;

class Tournament_user extends Model
{

    public $userId;
    public $tournamentId;

    static public function setDbColumns()
    {
        return ['userId','tournamentId'];
    }

    static public function setTableName()
    {
        return "users_tournaments";
    }
}