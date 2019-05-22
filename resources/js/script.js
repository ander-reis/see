$(document).ready(function () {
    /**
     * TOOLTIP
     */
    $('[data-toggle="tooltip"]').tooltip();

    /**
     * LIMPAR TEXTAREA E-MAIL
     */
    $('#btnLimparTexto').click(() => {
        $('#txtEmail').val('');
    });

    /**
     * LIMPAR DADOS DE
     */
    $('#btnLimparForm').click(() => {
        $("input[type='text']").val('');
        $('#txtParaLista').val('');
        $("input[type='checkbox']").prop('checked', false);
        $('#lblPara option').prop("selected", false);
    });

    /**
     * CLICK OPTION BOLETIM BLOQUEIA CAMPOS
     */
    $('#optDiversos').click(() => {
        $('#txtDe').prop('readonly', false);
        $('#txtExibir').prop('readonly', false);
        $("input[type='checkbox']").prop('disabled', false);
        $('#lblPara').prop('disabled', false);
        $('#txtParaLista').prop('readonly', false);
    });

    /**
     * CLICK OPTION BOLETIM DESBLOQUEIA CAMPOS
     */
    $('#optBoletim').click(() => {
        $('#txtDe').prop('readonly', true);
        $('#txtExibir').prop('readonly', true);
        $("input[type='checkbox']").prop('disabled', true);
        $('#lblPara').prop('disabled', true);
        $('#txtParaLista').prop('readonly', true);
    });

    /**
     * CLICK CAMPOS MODAL HIDDEN
     */
    $('#de').click(() => {
        let email = $('#txtEmail').val();
        let de = $('#txtDe').val();
        if (email.length <= 20) {
            $('#btnEnviarTeste').prop('disabled', true);
        } else {
            $('#btnEnviarTeste').prop('disabled', false);
            $("[name='teste_see_ds_email']").val(email);
            $("[name='teste_see_ds_de']").val(de);
        }
    });

    /**
     * CLICK OPEN MODAL MATÉRIAS
     */
    $("[value='materia']").click(() => {
        $('#modalMaterias').modal('toggle');
    });

    /**
     * CLICK AJAX ENVIAR EMAIL TESTE
     */
    $('#enviarEmailTeste').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/email-teste",
            method: 'post',
            dataType: 'json',
            data: {
                teste_see_ds_email_teste: $('#txtEmailTeste').val(),
                teste_see_ds_email: $('#txtEmail').val(),
                teste_see_ds_de: $('#txtDe').val()
            },
            success: function (result) {
                if (result) {
                    $('#emailTeste').modal('hide');
                    toastr.success('Teste enviado com sucesso');

                }
            },
            error: function (errors) {
                const data = errors.responseJSON.errors;
                const error = Object.values(data);
                for (var i = 0; i < error.length; i++) {
                    toastr.error(error[i]);
                }
            }
        });
    });

    /**
     * INCLUI ID NO INPUT
     */
    $('#modalCancelarEnvio').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        var modal = $(this);
        modal.find('#id-observacao').val(recipient);
    });
});
