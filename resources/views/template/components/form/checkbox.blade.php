<div>
    <x-form.label class="inline-flex items-center" for="{{$name}}">
        <input 
        {!! $attributes->merge(['class' => 'form-checkbox']) !!}
        type="checkbox" 
        {{ $checked ? 'checked' : '' }}
        name="{{$name}}" >
        <span class="ml-2">{{$label}}</span>
    </x-form.label>

    @error($name)
    <p class="text-red-500 mt-4">
        {{ $message }}
    </p>
    @enderror
</div>

