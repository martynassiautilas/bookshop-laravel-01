<div>
    <button 
    {!! $attributes->merge([
        'class' => 'w-full select-none font-bold whitespace-no-wrap p-3 rounded text-base leading-normal no-underline transition-primary text-white bg-primary-500 hover:bg-primary-600 sm:py-3',
        'type' => 'submit'
    ]) !!}>
        {!! trim($slot) ?: __('Submit') !!}
    </button>
</div>