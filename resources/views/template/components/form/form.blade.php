<form method="{{ $spoofMethod ? 'POST' : $method }}" {!! $attributes !!}>
    @csrf
    @if($spoofMethod)
        @method($method)
    @endif
    {!! $slot !!}
</form>