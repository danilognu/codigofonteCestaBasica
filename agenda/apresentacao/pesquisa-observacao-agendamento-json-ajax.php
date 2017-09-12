<?php  	
include("../../comum/comum.php"); 
include("../modelo-agenda.php");
include("../negocio-agenda.php");

$loIdPessoa = null;
$loRetorno = null;
$loUltimaObservacao = null;

if(isset($_REQUEST["id_pessoa"])){ $loIdPessoa = $_REQUEST["id_pessoa"]; }

$loAgendaFiltroVO = new agendaFiltroVO();
$loAgendaBO = new agendaBO();
$loComum = new comumBO();

$loAgendaFiltroVO->mbIdCliente = $loIdPessoa;
$loUltimaObservacao =  $loAgendaBO->BuscaObsAnteriorAgenda($loAgendaFiltroVO);

$loRetorno = array(
    "observacao" => "".utf8_encode($loUltimaObservacao).""
);

echo json_encode($loRetorno);


//echo (trim($loUltimaObservacao)).";".strlen($loUltimaObservacao);
?>




