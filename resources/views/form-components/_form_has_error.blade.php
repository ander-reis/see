<div class="{{$errors->has($field) ?'has-error' : ''}}">
    {{ $slot }}
    @include('form-components._help_block',['field' => $field])
</div>