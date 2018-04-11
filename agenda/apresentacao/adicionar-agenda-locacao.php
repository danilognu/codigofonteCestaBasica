<?php
	include("../../comum/comum.php");
    include("../modelo-agenda.php");
    include("../negocio-agenda.php");

    include("../../produtos/modelo-produto.php");
    include("../../produtos/negocio-produto.php");

    include("../../pessoa/modelo-pessoa.php");
    include("../../pessoa/negocio-pessoa.php");

//teste commit
$loIdAgenda             = NULL;
$loIdPessoaCliente      = NULL;
$loNomeCliente          = NULL;
$loDataVisita           = NULL;
$loIndVisitado          = 0;
$loDtCad                = NULL;
$DtAlt                  = NULL;
$IdPessoaCad            = NULL;
$NomePessoaCad          = NULL;
$loIdPessoaAlt          = NULL;
$loNomePessoaAlt        = NULL;
$loStatus               = 1;
$loTelefone1Cliente     = NULL;
$loIdProduto            = NULL;
$loObservacao           = NULL;
$loQtdProduto           = NULL;
$loDataParaVisita       = NULL;


$loAgendaFiltroVO = new agendaFiltroVO();
$loProduto = new produtoBO();
$loPessoa = new pessoaBO();
$loAgenda = new agendaBO();

if(isset($_REQUEST["id_agenda"])){

    $loIdAgenda = $_REQUEST["id_agenda"];
    $loAcao = "U";    
    $loAgendaFiltroVO->mbIdAgenda = $loIdAgenda;    
    $loListaAgenda =  $loAgenda->ConsultaAgenda($loAgendaFiltroVO);

    foreach ($loListaAgenda as $row) {

        $loIdAgenda             = $row->mbIdAgenda;            
        $loIdPessoaCliente      = $row->mbIdPessoaCliente;
        $loNomeCliente          = $row->mbNomeCliente;
        $loDataVisita           = $row->mbDataVisita;
        $loIndVisitado          = $row->mbIndVisitado;
        $loDtCad                = $row->mbDtCad;
        $DtAlt                  = $row->mbDtAlt;
        $IdPessoaCad            = $row->mbIdPessoaCad;
        $NomePessoaCad          = $row->mbNomePessoaCad;
        $loIdPessoaAlt          = $row->mbIdPessoaAlt;
        $loNomePessoaAlt        = $row->mbNomePessoaAlt;
        $loStatus               = $row->mbAtivo;
        $loTelefone1Cliente     = $row->mbTelefone1Cliente;
        $loIdProduto            = $row->mbIdProdutos;
        $loObservacao           = $row->mbObservacao;   
        $loQtdProduto           = $row->mbQtdProduto;  
        $loDataParaVisita       = $row->mbDataParaVisita; 

    }

}


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
        <link href="../../comum/js/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet" type="text/css" />

        <link href="../../../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css" rel="stylesheet" type="text/css" />

    </head>

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
                   
                    <!-- CONTEUDO FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-inbox font-red"></i>
                                        <span class="caption-subject font-red bold uppercase"> Loca&ccedil;&atilde;o </span>
                                    </div>
                   
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                        


                                        <div class="form-group">
                                                <label class="col-md-2 control-label">Data Inicio</label>
                                                <div class="col-md-2">
                                                    <input type="text" id="data-incio" class="form-control mask_date_hora" value=""   >
                                                  </div>
                                                  <label class="col-md-1 control-label">Data Fim</label>
                                                  <div class="col-md-2">
                                                    <input type="text" id="data-dim" class="form-control mask_date_hora"  value=""  >
                                                  </div>
                                        </div>                                           


                                        <div class="form-group avulso">
                                                <label class="col-md-2 control-label">Mesa</label>
                                                <div class="col-md-2">
                                                    <input type="text" id="qtd-mesa" class="form-control" placeholder="Quantidade" value="" >
                                                  </div>
                                        </div>


                                        <div class="form-group avulso">
                                                <label class="col-md-2 control-label">Cadeira</label>
                                                <div class="col-md-2">
                                                    <input type="text" id="qtd-cadeira" class="form-control" placeholder="Quantidade" value="" >
                                                  </div>
                                        </div>

                                        <div class="form-group conjunto">
                                                <label class="col-md-2 control-label">Conjuntos</label>
                                                <div class="col-md-2">
                                                    <input type="text" id="qtd-conjunto" class="form-control" placeholder="Quantidade" value="" >
                                                  </div>
                                        </div>    
                                        
                                        <div class="form-group conjunto">
                                                <label class="col-md-2 control-label">Nome</label>
                                                <div class="col-md-3">
                                                    <input type="text" id="nome" class="form-control" placeholder="" value="" >
                                                </div>
                                        </div>    

                                        <div class="form-group conjunto">
                                                <label class="col-md-2 control-label">Endereco</label>
                                                <div class="col-md-3">
                                                    <input type="text" id="endereco" class="form-control" placeholder="" value="" >
                                                </div>
                                                <label class="col-md-1 control-label">N&sup1;</label>
                                                <div class="col-md-1">
                                                    <input type="text" id="numero" class="form-control" placeholder="" value="" >
                                                </div>                                                
                                        </div>                                            
                                          
                                        <div class="form-group conjunto">
                                                <label class="col-md-2 control-label">Bairro</label>
                                                <div class="col-md-3">
                                                    <input type="text" id="bairro" class="form-control" placeholder="" value="" >
                                                </div>
                                        </div>                                         

                                        <div class="form-group">
                                                <label class="col-md-2 control-label">Estado</label>
                                                <div class="col-md-1">

                                                    <select class="form-control" nome="estado" id="estado" onchange="loacalizaCidadeSelect('');">
                                                    
                                                    <?php 

                                                        $loListaEstado = new comumBO();
                                                        
                                                        $loDados = NULL;
                                                        $loLista =  $loListaEstado->ListaEstado($loDados);
                                                       
                                                       echo "<option value='' ></option>" ;      
                                                        
                                                        foreach ($loLista as $row){
                                                            
                                                            $loSelected = "";
                                                            if($row->mbIdEstado == $loIdEstado){
                                                                    $loSelected = "selected";
                                                            }

                                                            echo "<option value=".$row->mbIdEstado." ".$loSelected." >".$row->mbUF."</option>" ;      

                                                        }     
                                                    ?>
                                                    
                                                    </select>

                                                  </div>
                                                  <label class="col-md-2 control-label">Cidade</label>
                                                  <div class="col-md-2">

                                                    <select class="form-control" nome="cidade" id="cidade" class="cidade" >
                                                    </select>


                                                  </div>
                                        </div> 

                                        <div class="form-group">
                                                <label class="col-md-2 control-label">Telefone1</label>
                                                <div class="col-md-2">
                                                    <input type="text" id="telefone1" class="form-control mask_telefone" value=""   >
                                                  </div>
                                                  <label class="col-md-1 control-label">Telefone2</label>
                                                  <div class="col-md-2">
                                                    <input type="text" id="telefone2" class="form-control mask_telefone"  value=""  >
                                                  </div>
                                        </div>                                            

                                        <div class="form-group">
                                                <label class="col-md-1 control-label"></label>
                                                <div class="col-md-4">
                                                    <strong>Valor da Loca&ccedil;&atilde;o:</strong> R$ 0,00
                                                </div>
                                        </div>                                            
                                        <!-- -->


                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="button" class="btn blue" id="btn-adicionar" >Adicionar</button>
                                                    <button type="button" id="btn-imprimir" class="btn btn-primary"> <i class="fa fa-file-pdf-o"></i> Contrato PDF</button>
                                                    <button type="button" id="btn-voltar" class="btn default"><i class="fa fa-mail-reply"></i> Voltar </button>
                                                    <input type="hidden" id="acao" value="<?php echo $loAcao; ?>" /> 
                                                    <input type="hidden" id="id_agenda" value="<?php echo $loIdAgenda; ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- CONTEUDO FORM PORTLET-->

                                    


            </div>
        </div>     





        <div id="dialog-message"></div>     
        <!-- END CONTAINER -->
        
        <!-- BEGIN RODA PÉ -->
        <?php include("../../comum/includes/rodape.php"); ?>
        <!-- BEGIN RODA PÉ -->

        <?php include("../../comum/includes/script.php"); ?>
        <?php //include("../../comum/includes/script-tabela.php"); ?>

        <script src="../../comum/js/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>
        <script src="../../../assets/global/plugins/select2/js/select2.full.js" type="text/javascript"></script>
        <script src="js/agenda.js" type="text/javascript"></script>


        <script src="../../../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../../../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../../../assets/pages/scripts/table-datatables-managed-agenda.js" type="text/javascript"></script>

        <script src="../../../assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
        <script src="../../../assets/pages/scripts/components-bootstrap-touchspin.min.js" type="text/javascript"></script>        

    </body>

</html>