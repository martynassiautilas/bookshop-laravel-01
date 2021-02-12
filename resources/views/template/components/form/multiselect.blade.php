<div>
    <x-form.label for="{{$name}}">
        {{$label}}
    </x-form.label>

    <select name="{{$name}}" multiple="multiple">
      @foreach($options as $optionValue => $optionName)
      <option value="{{ $optionValue }}">{{ $optionName }}</option>
      @endforeach
    </select>

</div>

@once
@push('js')
<script src="{{ asset('vendor/multiselect/jquery.multiselect.js') }}"></script>

<script>
    $('select[multiple]').each(function() {
        $(this).multiselect({
            search : true,
        });
    });
</script>

@endpush

@push('css')
<link href="{{ asset('vendor/multiselect/jquery.multiselect.css') }}" rel="stylesheet">
@endpush
@endonce