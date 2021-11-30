<?php

namespace App\Controllers;

use App\Core\AControllerBase;

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
}