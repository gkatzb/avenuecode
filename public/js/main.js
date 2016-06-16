/**
 * Created by Gabriela Katz
 * Date: 05/05/2016
 */
jQuery(document).ready(function ($) {

    oTable = $('.table').DataTable({
        dom: 'tpr',
        "iDisplayLength": 5
    });

    $('.input_Filtrar').keyup(function(){
        oTable.search($(this).val()).draw();
    });
});

