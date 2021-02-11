<div>
    <x-form.label for="{{$name}}">
        {{$label}}
    </x-form.label>

    <input
        {!! $attributes->merge(['class' => 'border p-2 rounded form-input w-full hover:border-gray-300 focus:border-gray-500 transition-primary']) !!}
        name="{{ $name }}"
        value="{{ $value }}"
        type="{{ $type }}" />

    @error($name)
    <p class="text-red-500 text-xs mt-4">
        {{ $message }}
    </p>
    @enderror
    
</div>