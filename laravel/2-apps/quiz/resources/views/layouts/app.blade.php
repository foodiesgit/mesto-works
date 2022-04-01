<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $header }} - {{ config('app.name', 'Quiz') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            @if (isset($header))
                <header class="bg-white shadow">
                    {{-- original --}}
                    {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div> --}}
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endif
            {{-- original --}}
            {{-- <main>
                {{ $slot }}
            </main> --}}

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    @endif
                    @if(session('success'))
                        <li class="alert alert-success">{{ session('success') }}</li>
                    @endif
                    {{ $slot }}
                </div>
            </div>
        </div>
        @stack('modals')
        @isset($js)
            {{$js}}
        @endisset
        @livewireScripts
    </body>
</html>
