<?php
namespace app\controllers;
use app\core\Controller;
use app\models\Contato;

class ContatoController extends Controller{
    
   public function index(){

        $objContato = new Contato();
        $dados["lista"] = $objContato->lista();
        $dados["view"] =  "Contato/index";

        //echo "<pre>";
        //print_r($dados);
        //exit;

        $this->load("template", $dados);
   }

   //Método apresenta o formulário
   public function create()
   {
      //Método faz uma chamada do arquivo create.php que está na pasta view
      $dados["view"] =  "Contato/Create";
      $this->load("template", $dados);
   }

   public function salvar()
   {
      //Criar um objeto de Contato do models
      $objContato = new Contato();

      //Classe padrão stdClass que cria um array e atribui a um objeto
      $contato = new \stdClass();
      $contato->nome     = $_POST["nome"];
      $contato->cep     = $_POST["cep"];
      $contato->endereco   = $_POST["endereco"];
      $contato->complemento = $_POST["complemento"];
      $contato->numero    = $_POST["numero"];
      $contato->bairro    = $_POST["bairro"];
      $contato->cidade    = $_POST["cidade"];
      $contato->estado    = $_POST["estado"];
      $contato->celular   = $_POST["celular"];
      $contato->email    = $_POST["email"];
      $contato->dtnasc    = $_POST["dtnasc"];
      $contato->cpf     = $_POST["cpf"];
      $contato->idcontato   = $_POST["idcontato"];

      if(!$contato->idcontato)
      {
         //Chamar o método inserir() que está no model Contato
         $objContato->inserir($contato);
      }else{
         $objContato->editar($contato);
      }
      

      header("location:".URL_BASE."contato");
   }

   public function edit($id)
   {
      $objContato = new Contato();
      $dados["contato"] = $objContato->getContato($id);
      $dados["view"] =  "Contato/Create";
      //echo "<pre>";
      //print_r($dados);
      //exit;
      $this->load("template", $dados);
   }

   public function excluir($id)
   {
      $objContato = new Contato();
      $objContato->excluir($id);
      header("location:".URL_BASE."contato");
   }
}