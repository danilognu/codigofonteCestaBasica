<?php

include("../../comum/comum.php");
include("../../pessoa/modelo-pessoa.php");
include("../../pessoa/negocio-pessoa.php");
include("../modelo-agenda-locacao.php");
include("../negocio-agenda-locacao.php");



$loPessoaBO = new pessoaBO();
$loAgendaLocacaoVO = new agendaLocacaoVO();
$loAgendaLocacaoBO = new agendaLocacaoBO();
$loComumBO = new comumBO();




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Cesta Basica Total</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Sistema de controle de Agenda" name="description" />
        <meta content="Danilo Gabriel de Souza" name="author" />
        <!-- danilognu@gmail.com-->

        <?php include("../../comum/includes/css.php"); ?>
        <?php include("../../comum/includes/css-tabela.php"); ?>

        <!--link href="../../comum/js/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet" type="text/css" /-->

        <link href="../../../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
   
    <?php include("../../comum/includes/topo.php"); ?>
           
  <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar navbar-collapse collapse">
                <?php include("../../comum/includes/menu.php"); ?>
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                              <div class="portlet light bordered">
                                <div class="portlet">
                                    <div class="caption font-dark">
                                        <i class="fa fa-calendar"></i>
                                        <span class="caption-subject bold uppercase"> Agenda de Loca&ccedil;&atilde;o </span>
                                    </div>
                                </div>

                          

                                    <div class="portlet-body">
                                        <div class="table-toolbar"> 

                                                <div class="row">
                                                    <div class="col-md-11 form-inline">
                                                        <div class="btn-group btn-group-sm btn-group-solid">
                                                            <button id="btn-pesquisa-adiciona" class="btn sbold dark "> Adicionar
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>



                                                </div>

                                                <br/>

                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                <thead>
                                                    <tr>
            
                                                    <th width="0001%" >ID</th>        
                                                    <th>Dados</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="conteudo-consulta" >

                                                    <?php
                                                    
                                                    $loRetorno = $loAgendaLocacaoBO->ConsultaAgendaLocacao();
                                                    if(count($loRetorno) > 0 ){
                                                    
                                                        foreach ($loRetorno as $row){
                                                    ?>


                                                        <tr class="odd gradeX"  >
                                                            <td><?php echo $row->mbIdAgendaLocacao; ?></td>
                                                            <td class="td-dados" id="10" style="cursor:pointer" >
                                                                <strong><?php echo $row->mbDataInicio; ?></strong> 
                                                                ate    
                                                                <strong><?php echo $row->mbDataFim; ?></strong>
                                                                <br />
                                                                <strong>End:</strong> <?php echo $row->mbEndereco; ?> n: <?php echo $row->mbBairro; ?> - <?php echo  $row->mbNumero; ?> 
                                                                <br /> 
                                                                <strong>Tel:</strong> <?php echo $row->mbTelefone1; ?> <?php echo $row->mbTelefone2; ?> 
                                                            </td>
                                                        </tr>
                                                
                                                    <?php } 
                                                    }?>

                                                </tbody>
                                            </table>

                                        </div><!--table-toolbar FIM-->
                                    </div><!--portlet-body FIM-->

                               </div><!--portlet light bordered FIM-->

                                    


            </div>
        </div>       
        <div id="dialog-message"></div>     
        <!-- END CONTAINER -->
        
        <!-- BEGIN RODA PÉ -->
        <?php include("../../comum/includes/rodape.php"); ?>
        <!-- BEGIN RODA PÉ -->

        <?php include("../../comum/includes/script.php"); ?>
        <?php include("../../comum/includes/script-tabela.php"); ?>

        <!--script src="../../comum/js/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script-->
        <script src="../../../assets/global/plugins/select2/js/select2.full.js" type="text/javascript"></script>
        <script src="js/agenda-locacao.js" type="text/javascript"></script>

    </body>

</html>