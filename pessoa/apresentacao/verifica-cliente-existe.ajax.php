<?php 
include("../../comum/comum.php"); 
include("../modelo-pessoa.php");
include("../negocio-pessoa.php");


$loPessoaVO = new pessoaVO();
if(isset($_POST["nomeCliente"])){ $loPessoaVO->mbNome = $_POST["nomeCliente"]; }
if(isset($_POST["telefone1Cliente"])){ $loPessoaVO->mbTelefone1 = $_POST["telefone1Cliente"]; }


$loPessoa = new pessoaBO();
$loRetorno = $loPessoa->VerificaPessoaExiste($loPessoaVO);

$loDados = array(
    "conta_pessoa" => $loRetorno
);

echo json_encode($loDados);
?>

