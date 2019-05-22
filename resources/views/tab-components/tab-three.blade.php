<div id="observacao" class="tab-pane">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col">Ver Email</th>
                <th scope="col">Cancelar Envio</th>
                <th scope="col">De</th>
                <th scope="col">Tipo</th>
                <th scope="col">Usuário</th>
                <th scope="col">Data Envio</th>
                <th scope="col">Editar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($observacoes as $observacao)
                <tr class="text-center">
                    <td>
                        <a href="{{ route('see.show', ['id' => $observacao->ema_see_cd_observacao]) }}" target="_blank">
                            <i class="fas fa-envelope fa-2x text-info"></i>
                        </a>
                    </td>
                    <td>
                        @if($observacao->ema_see_fl_status == 0)
                            <a href="#" data-toggle="modal" data-target="#modalCancelarEnvio"
                               data-whatever="{{ $observacao->ema_see_cd_observacao }}">
                                <i id="icon-{{ $observacao->ema_see_cd_observacao }}" data-toggle="tooltip"
                                   title="agendado" class="fas fa-times-circle fa-2x text-danger"></i>
                            </a>
                        @elseif($observacao->ema_see_fl_status == 2)
                            <a href="javascript:void(0);">
                                <i class="fas fa-check-circle fa-2x text-success" data-toggle="tooltip" title="enviado"></i>
                            </a>
                        @endif
                    </td>
                    <td>{{ $observacao->ema_see_ds_de }}</td>
                    <td>{{ $observacao->ema_see_ds_tipo }}</td>
                    <td>{{ $observacao->ema_see_ds_login }}</td>
                    <td>{{ $observacao->dt_envio_formatted }}</td>
                    <td>
                        <a href="{{ route('see.edit', ['id' => $observacao->ema_see_cd_observacao]) }}"
                           class="btn btn-outline-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
