<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public $id;
    public $nickname;
    public $fullName;
    public $email;
    public $pssword;
    public $mobile;
    public $adress;
    public $profilePicture;

    static public function setDbColumns()
    {
        return ['id','nickname','fullName','email','pssword','mobile','adress','profilePicture'];
    }

    static public function setTableName()
    {

        return "users";
    }
}