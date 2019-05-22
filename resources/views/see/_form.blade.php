<div class="row justify-content-center">
    <div class="col-12">
        <ul class="nav nav-pills mb-3 text-center" id="pills-tab" role="tablist">
            <li class="nav-item col-4">
                <a class="nav-link active" id="email" data-toggle="pill" href="#tab-one" role="tab"
                   aria-controls="pills-home" aria-selected="true">
                    <i class="fas fa-envelope">&nbsp;</i>E-mail
                </a>
            </li>
            <li class="nav-item col-4">
                <a class="nav-link" id="de" data-toggle="pill" href="#tab-two" role="tab"
                   aria-controls="pills-profile" aria-selected="false">
                    <i class="fas fa-arrow-alt-circle-right">&nbsp;</i>De
                </a>
            </li>
            <li class="nav-item col-4">
                <a class="nav-link" id="observacao" data-toggle="pill" href="#tab-three" role="tab"
                   aria-controls="pills-contact" aria-selected="false">
                    <i class="fas fa-pencil-alt">&nbsp;</i>Observação
                </a>
            </li>
        </ul>
        <div class="tab-content container" id="pills-tabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                @component('tab-components.tab-one')
                    <div class="mt-3 float-right col-4">
                        <button type="button" id="btnLimparTexto" class="btn btn-block btn-warning">Limpar</button>
                    </div>
                @endcomponent
            </div>
            <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                @component('tab-components.tab-two', ['enviarCopia' => $enviarCopia, 'selectOption' => $selectOption])
                    <div class="row">
                        <div class="col-4">
                            <button type="button" data-toggle="modal" data-target="#emailTeste" id="btnEnviarTeste"
                                    class="btn btn-block btn-outline-secondary">Enviar Teste
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-block btn-primary">Agendar Envio</button>
                        </div>
                        <div class="col-4">
                            <button type="button" id="btnLimparForm" class="btn btn-block btn-warning"
                                    onclick="btnLimparForm()">Limpar
                            </button>
                        </div>
                    </div>
                @endcomponent
            </div>
            <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                @component('tab-components.tab-three', ['observacoes' => $observacoes])@endcomponent
            </div>
        </div>

        {{--TOAST ERROR--}}
        @if($errors->any())
            @foreach ($errors->all() as $error)
                {{ toastr()->error($error) }}
            @endforeach
        @endif
    </div>
</div>
