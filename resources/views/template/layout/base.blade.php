<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Head --}}
    @include('template.layout.header')
</head>
<body>
    <div x-data="{ sidebarOpen: false }">
        <div class="flex h-screen bg-gray-100 dark:bg-gray-800 font-roboto">
            {{-- Sidebar navigation --}}
            @include('template.components.sidebar-navigation')
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
