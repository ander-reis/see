<!-- Modal -->
<div class="modal fade" id="{{ $idModal }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ (isset($modalSize)) ? $modalSize : 'modal-lg' }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {!! (isset($title)) ? $title : 'Título' !!}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ (isset($slot)) ? $slot : '' }}
            </div>
            <div class="modal-footer">
                {{ (isset($footer)) ? $footer : '' }}
            </div>
        </div>
    </div>
</div>
