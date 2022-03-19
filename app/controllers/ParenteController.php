<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Parente;

class ParenteController extends Controller
{
    public function index()
    {
        $objParente = new Parente();
        $dados["lista"] = $objParente->lista();
        $dados["view"] = "Parente/index";

        $this->load("template", $dados);
    }

    public function create()
    {
        $dados["view"] = "Parente/Create";
        $this->load("template", $dados);

    }

    public function salvar()
    {
        $objParente = new Parente();

        $parente = new \stdClass();
        $parente->nome = $_POST["nome"];
        $parente->dtnasc = $_POST["dtnasc"];
        $parente->cpf = $_POST["cpf"];
        $parente->celular = $_POST["celular"];
        $parente->email = $_POST["email"];
        $parente->relacionamento = $_POST["relacionamento"];
        $parente->endereco = $_POST["endereco"];

        $objParente->inserir($parente);

        header("location:".URL_BASE."parente");

    }
}