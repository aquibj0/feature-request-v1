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
    <body class="antialiased bg-white">
       
        <header class="my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="py-4 text-center">
                            <h5>Introducing</h5>
                            <h1 class="fw-700 pt-1"> Features<span >Hub</span></h1>
                        </div>
                        <div class="text-center">
                            <h4 class="fw-500">🌟  Your SaaS, Your Features, Your Community!🚀</h4>
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <p class="pt-2">Welcome to FeaturesHub, your open-source solution for streamlined feature management in SAAS applications. We believe in the power of collaboration and innovation, and we invite you to be a part of it!</p>
                                    <a href="{{route('register')}}" class="btn btn-primary px-4 " style="width:fit-content">Get Started <i class="bi bi-arrow-right"></i></a>
                                    <a href="{{route('register')}}" class="btn btn-secondary px-4 " style="width:fit-content">View on Github <i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section>
            <div class="container">
                <div class="heading text-center">
                    <h3 class="fw-700">✨ Why FeaturesHub? ✨</h3>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <p class="fs-5 fw-500">📈 Seamlessly track feature requests.</p>
                        <p class="fs-5 fw-500">💬 Engage with your user community.</p>
                        <p class="fs-5 fw-500">🔄 Effortlessly integrate with your SAAS.</p>
                        <p class="fs-5 fw-500">🚀 Expedite development decisions.</p>
                        <p class="fs-5 fw-500">🎯 Make data-driven choices, always!</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('images/thoughtful-woman-with-laptop-looking-big-question-mark_1150-39362.avif')}}" class="mw-100" alt="">
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>
