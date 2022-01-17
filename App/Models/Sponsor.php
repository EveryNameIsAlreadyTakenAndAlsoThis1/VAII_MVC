<?php

namespace App\Models;

use App\Core\Model;

class Sponsor extends Model
{

    public $id;
    public $name;
    public $tournamentId;
    public $sponsoring;

    static public function setDbColumns()
    {
        return ['id','name','tournamentId','sponsoring'];
    }

    static public function setTableName()
    {
        return "sponsors";
    }
}