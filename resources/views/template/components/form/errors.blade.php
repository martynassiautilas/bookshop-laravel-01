@error($name, $bag)
    <p {!! $attributes->merge(['class' => 'border p-2 rounded form-input w-full hover:border-gray-300 focus:border-gray-500 transition-primary']) !!}>
        {{ $message }}
    </p>
@enderror