<div class="col">
    <div class="form-group {{$errors->has($field) ?' has-error' : ''}}">
        {{ $slot }}
        @include('form-components._help_block',['field' => $field])
    </div>
</div>
