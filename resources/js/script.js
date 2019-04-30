$(document).ready(function () {
    /**
     * LIMPAR TEXTAREA E-MAIL
     */
    function btnLimparTextarea() {
        $('#txtEmail').val('');
    }

    /**
     * LIMPAR DADOS DE
     */
    function btnLimparForm() {
        $("input[type='text']").val('');
        $('#txtParaLista').val('');
        $("input[type='checkbox']").prop('checked', false);
        $('#lblPara option').prop("selected", false);
    }

    /**
     * CLICK OPTION BOLETIM BLOQUEIA CAMPOS
     */
    function optDiversos() {
        $('#txtDe').prop('readonly', false);
        $('#txtExibir').prop('readonly', false);
        $("input[type='checkbox']").prop('disabled', false);
        $('#lblPara').prop('disabled', false);
        $('#txtParaLista').prop('readonly', false);
    }

    function optBoletim() {
        $('#txtDe').prop('readonly', true);
        $('#txtExibir').prop('readonly', true);
        $("input[type='checkbox']").prop('disabled', true);
        $('#lblPara').prop('disabled', true);
        $('#txtParaLista').prop('readonly', true);
    }

    document.getElementById('btnLimparTexto').addEventListener('click', btnLimparTextarea);
    document.getElementById('btnLimparForm').addEventListener('click', btnLimparForm);
    document.getElementById('optDiversos').addEventListener('click', optDiversos);
    document.getElementById('optBoletim').addEventListener('click', optBoletim);
});
