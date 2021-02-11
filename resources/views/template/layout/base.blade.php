<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Here goes html head content --}}
    @include('template.layout.header')
</head>
<body>
    <div x-data="{ sidebarOpen: false }">
        {{-- Sidebar navigation --}}
        @include('template.components.sidebar-navigation')
        <div class="flex h-screen">
            <div class="flex-1 flex flex-col overflow-hidden">
                {{-- Top header --}}
                @include('template.components.header')

                {{-- Here goes page content --}}
                @include('template.layout.content')
            </div>
        </div>
    </div>
    {{-- Footer --}}
    @include('template.layout.footer')
</body>
</html>
