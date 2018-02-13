$(function () {
    $('[data-toggle="tooltip"]').tooltip()
    $('[data-toggle="popover"]').popover();
    $('.mask-cpf').mask('000.000.000-00', {clearIfNotMatch: true});
    $('.mask-date').mask('00/00/0000', {clearIfNotMatch: true});
    $('.datepicker').datetimepicker({format: 'DD/MM/YYYY'});
})