<?php 
include("../../comum/comum.php"); 
include("../modelo-grupo-acesso.php");
include("../negocio-grupo-acesso.php");

$loDados = $_POST["dados"];

$loGrupoAcessoBO = new grupoAcessoBO();
$loGrupoAcesso = $loGrupoAcessoBO->GravarPermissao($loDados);

echo json_encode($loGrupoAcesso);
?>
