
// Objeto de acesso global
Agenda = {};

(function () {
    var pub = Agenda;

    // Objeto de acesso privado
    var priv = {};



    jQuery(function ($) {
        var optionsPadrao = {
            autoOpen: false
            , modal: true
        };

         $( ".data_calendario" ).datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });

        //Consulta 
        $(".td-dados").click(priv.tdAbrirItem_onClick);


    });

    priv.tdAbrirItem_onClick = function(){

         var id_agenda_locacao = $(this).attr("id");   
         window.location.href = "adicionar-agenda-locacao.php?id_agenda_locacao="+id_agenda_locacao;          

    };

    
})();


