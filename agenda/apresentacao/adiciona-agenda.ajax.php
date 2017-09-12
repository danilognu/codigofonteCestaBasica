<?php 
include("../../comum/comum.php"); 
include("../modelo-agenda.php");
include("../negocio-agenda.php");

$loDados = $_POST["dados"];
$loObs = $_POST["observacao"];

$loAgenda = new agendaBO();
$loRetorno = $loAgenda->AdicionaAgenda($loDados,$loObs);

echo json_encode($loRetorno);
?>




