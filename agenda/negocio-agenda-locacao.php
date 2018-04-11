<?php 
include("persistencia-agenda-locacao.php");

Class agendaLocacaoBO{

    public function ConsultaAgendaLocacao(){

        $loAgenda = new agendaLocacaoBOA();
        $loDados = $loAgenda->ConsultaAgendaLocacao();

        return $loDados;
    }

}

?>