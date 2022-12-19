<?php

namespace Controllers;

use Jenssegers\Blade\Blade;

class HomeController
{
    private $blade;

    public function __construct()
    {
        $this->blade = new Blade(DIRREQ . '/views', DIRREQ . '/lib/cache');
        $verificaSession = new LoginController();
        $verificaSession->sessionVerify();
    }
    public function index()
    {
        echo $this->blade->render('home');
        return;
    }

    public function tag()
    {
        echo $this->blade->render('tags');
        return;
    }

    public function contato()
    {
        echo $this->blade->render('contato');
        return;
    }


}