<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        {{-- CkEditor CDN --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    </head>

    <body class="bg-white">

        <main class="container-fluid px-0">
            <div class="d-flex">
                <div>
                    <x-sidebar></x-sidebar>
                </div>
                <div class="py-3 w-100" style="margin-left: 280px">

                    <!-- Page Heading -->
                    @if (isset($header))
                        <header>
                            <div class="">
                                {{ $header }}
                            </div>
                        </header>
                    @endif
                    <hr>
                    {{$slot}}
                </div>
            </div>
        </main>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        @if (isset($script))
            {{ $script }}
        @endif


    </body>
</html>
