<div class="modal fade" id="modalCancelarEnvio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-exclamation-circle fa-2x text-danger" aria-hidden="true"></i>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['route' => ['see.destroy', 'id' => 'excluir'], 'method' => 'DELETE']) }}
            {{ Form::hidden('ema_see_cd_observacao', null, ['class' => 'form-control', 'id' => 'id-observacao']) }}
            <div class="modal-body">
                <h3>Cancelar Envio?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <button type="submit" class="btn btn-danger">Sim</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
