<?php
require_once(__DIR__ . '/../core/Controller.php');

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