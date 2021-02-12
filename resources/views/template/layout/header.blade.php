{{-- Main things --}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>

{{-- Load here global js --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>


{{-- This is needed for ability to add custom js here from other files --}}
@stack('js_head')

{{-- Load here global css --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans|500&family=Varela|500&display=swap" rel="stylesheet">

{{-- This is needed for ability to add custom css here from other files --}}
@stack('css')