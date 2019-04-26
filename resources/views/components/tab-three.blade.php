<div id="observacao" class="tab-pane">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>E-mail</th>
                <th>Cancelar</th>
                <th>De</th>
                <th>Exibir</th>
                <th>Assunto</th>
                <th>Cópia</th>
                <th>Para</th>
                <th>Lista</th>
                <th>Tipo</th>
                <th>Usuário</th>
                <th>Data Envio</th>
                <th style="display: none;"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($observacoes as $observacao)
            <tr>
                <td class="text-center">
                    <a href="#verObs" data-toggle="modal"> email
                        <i class="fa fa-envelope-o fa-2x"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a id="" class="confirModal" href="#">
                        cancelar
                        <i class="fa fa-times fa-2x text-danger"></i>
                    </a>
                </td>
                <td>{{ $observacao->ema_see_ds_de }}</td>
                <td>{{ $observacao->ema_see_ds_exibir }}</td>
                <td>{{ $observacao->ema_see_ds_assunto }}</td>
                <td>{{ $observacao->ema_see_ds_copia }}</td>
                <td>
                    <a href="#verObs" data-toggle="modal">Clique Aqui</a>
                </td>
                <td>lista</td>
                <td>tipo</td>
                <td>usuário</td>
                <td>data envio</td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{--{{ dd($observacoes) }}--}}

    </div>
</div>
