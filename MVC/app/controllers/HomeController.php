<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuario;

class HomeController extends Controller
{
    public function index()
    {
        $nome = 'jhonata';
        $idade = 35;

        $this->view('home/index', ['nome' => $nome,'idade' => $idade]);
    }

    public function contact() {
        $this->view('home/contact');
    }
}