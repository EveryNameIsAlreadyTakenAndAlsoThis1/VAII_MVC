<?php

namespace App\Models;

use App\Core\Model;

class Game extends Model
{
    public $id;
    public $nameOfGame;
    public $image;
    public $textOfGame;

    static public function setDbColumns()
    {
        return ['id','nameOfGame','image','textOfGame'];
    }

    static public function setTableName()
    {
        return "games";
    }
}