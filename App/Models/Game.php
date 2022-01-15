<?php

namespace App\Models;

use App\Core\Model;

class Game extends Model
{
    public $nameOfGame;
    public $image;
    public $textOfGame;

    static public function setDbColumns()
    {
        return ['nameOfGame','image','textOfGame'];
    }

    static public function setTableName()
    {
        return "games";
    }
}