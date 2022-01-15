<?php

namespace App\Models;

use App\Core\Model;


class Tournament extends Model
{
    public $id;
    public $name;
    public $game;

    static public function setDbColumns()
    {
         return ['id','name','game'];
    }

    static public function setTableName()
    {
        return "tournameents";
    }
}