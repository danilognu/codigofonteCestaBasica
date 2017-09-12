<?php 
include("../../comum/comum.php"); 


$loRetorno = $loAgenda->ConsultaAgenda($loAgendaFiltroVO);
if(count($loRetorno) > 0 ){

    foreach ($loRetorno as $row){
        
    ?>

    <tr class="odd gradeX"  >
            <td style='width: 01%' > </td>
            <td class="abrir-produto" id="<?php echo $row->mbIdAgenda; ?>" style='cursor:pointer; width: 05%' onClick="Agenda.AbrirAgenda_onClick(<?php echo $row->mbIdAgenda; ?>)" > 
                <?php echo $row->mbIdAgenda; ?> 
            </td>
            <td class="abrir-produto" id="<?php echo $row->mbIdAgenda; ?>" style='cursor:pointer; width: 15%' onClick="Agenda.AbrirAgenda_onClick(<?php echo $row->mbIdAgenda; ?>)" > 
                <?php echo $row->mbDataVisita; ?> 
            </td>
            <td class="abrir-produto" id="<?php echo $row->mbIdAgenda; ?>" style='cursor:pointer; width: 20%' onClick="Agenda.AbrirAgenda_onClick(<?php echo $row->mbIdAgenda; ?>)" > 
                <?php echo $row->mbNomeCliente; ?> 
            </td>
            <td class="abrir-produto" id="<?php echo $row->mbIdAgenda; ?>" style='cursor:pointer; width: 15%' onClick="Agenda.AbrirAgenda_onClick(<?php echo $row->mbIdAgenda; ?>)" > 
                <?php if(strlen($row->mbTelefone1Cliente) > 0){echo $loComumBO->MascaraTelefone($row->mbTelefone1Cliente);} ?> 
            </td>
            <td class="abrir-produto" id="<?php echo $row->mbIdAgenda; ?>" style='cursor:pointer;' onClick="Agenda.AbrirAgenda_onClick(<?php echo $row->mbIdAgenda; ?>)" > 
                <?php echo $row->mbNomeProdutos; ?> 
            </td>
            <td class="abrir-produto" id="<?php echo $row->mbIdAgenda; ?>" style='cursor:pointer;' onClick="Agenda.AbrirAgenda_onClick(<?php echo $row->mbIdAgenda; ?>)" > 
                <?php echo $row->mbNomePessoaCad; ?> 
            </td>            
            <td style='width: 05%' > 
                <div class="btn-group btn-group-sm btn-group-solid" >

                    <?php 
                    if($row->mbIndVisitado == 1){ 
                        echo "<span class='label label-success'> Visitado </span>"; 
                    }else{ 
                        echo "<button type='button' id=".$row->mbIdAgenda." class='btn blue btn-agenda-visitada'>
                                    Reagendar Cliente
                            </button>";
                    } 
                    ?>

               </div>
             </td>
    </tr>
<?php

    }
    
}

?>




