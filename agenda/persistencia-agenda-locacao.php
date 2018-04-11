<?php

Class agendaLocacaoBOA{

    public function ConsultaAgendaLocacao(){


        $loComumBO = new comumBO();
        $loConexao = new Conexao();
        $pdo = $loConexao->IniciaConexao();

        $loSql = "SELECT 
                    agenda_locacao.id_agenda_locacao
                    ,DATE_FORMAT(agenda_locacao.dt_inicio, '%d/%m/%Y %H:%i') dt_inicio
                    ,DATE_FORMAT(agenda_locacao.dt_fim, '%d/%m/%Y %H:%i') dt_fim
                    ,agenda_locacao.endereco
                    ,agenda_locacao.bairro
                    ,agenda_locacao.numero
                    ,agenda_locacao.nome_contato
                    ,agenda_locacao.nome_contato2
                    ,agenda_locacao.telefone1
                    ,agenda_locacao.telefone2
                    ,cidade.nome as cidade
                    ,estado.uf
                FROM agenda_locacao
                LEFT JOIN cidade ON cidade.id_cidade = agenda_locacao.id_cidade
                LEFT JOIN estado ON estado.id_estado = cidade.id_estado
                WHERE agenda_locacao.ind_ativo = 1 ";

        $query= $pdo->prepare($loSql);
        $query->execute();

        $i = 0;
        $listaAgenda = array(); 
        foreach ($query as $row) {

            $loItem = new agendaLocacaoVO();
            $loItem->mbIdAgendaLocacao  = $row["id_agenda_locacao"];
            $loItem->mbDataInicio       = $row["dt_inicio"];
            $loItem->mbDataFim          = $row["dt_fim"];
            $loItem->mbEndereco         = $row["endereco"];
            $loItem->mbBairro           = $row["bairro"];
            $loItem->mbNumero           = $row["numero"];
            $loItem->mbNomeContato1     = $row["nome_contato"];
            $loItem->mbNomeContato2     = $row["nome_contato2"];
            $loItem->mbTelefone1        = $row["telefone1"];
            $loItem->mbTelefone2        = $row["telefone2"];
            $loItem->mbCidade           = $row["cidade"];
            $loItem->mbEstado           = $row["uf"];
            $listaAgenda[$i] = $loItem;
            $i++;   
        }
        return $listaAgenda; 

    }

   
}

?>