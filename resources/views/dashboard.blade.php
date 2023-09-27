<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        
    <!-- Session Status -->
        
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    
                    <x-auth-session-status class="mb-4 session-status" :status="session('status')" />

                    @isset($app)

                        <div class="text-gray-900 font-bold text-xl">
                            {{ __("My Application") }}
                        </div>

                        <div class="bg-white shadow-md rounded p-6 my-4 w-full">

                            <div class="text-gray-700 font-medium text-lg mb-2">
                                {{$app->app_name}}
                            </div>

                            <div class="text-gray-700 font-medium text-lg mb-2">
                                {{$app->app_description}}
                            </div>

                            <div class="text-gray-700 font-medium text-lg mb-2">
                                {{-- {{$app->app_api_key}} <br>  --}}
                                {{route('feature-request.store', $app->app_id)}}
                            </div>

                            <div class="text-gray-700 font-medium text-lg mb-2">
                                {{$app->app_id}}
                            </div>
                            
                             <div class="text-gray-700 font-medium text-lg ">
                                {{$app->user_id}}
                            </div>
                           


                            <div class="w-full max-w-md py-4 border px-4">
                                <form action="{{route('feature-request.store', $app->app_id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- <input type="hidden" name="header" value="{{$app->app_api_key}}"> --}}

                                    <input  name="user_id" value="{{auth()->user()->id}}" id="">
                                    <div class="mb-4">
                                        <label for="name" class="block mb-1">Name</label>
                                        <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="My First App" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="block mb-1">Email</label>
                                        <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="email" placeholder="My First App" required>
                                    </div>


                                    <div class="mb-4">
                                        <label for="title" class="block mb-1">Title</label>
                                        <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="My First App" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="block mb-1">Description</label>
                                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="" cols="30" rows="5" placeholder="App Description" required></textarea>
                                        
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            Create
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>

                    @else

                        <div class="text-gray-900">
                            {{ __("Create Your First App") }}
                        </div>
                        <div class="w-full max-w-xs pt-4">
                            <form class="" action="{{route('app.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}" id="">
                                <div class="mb-4">
                                    <label for="name" class="block mb-1">Name</label>
                                    <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="My First App" required>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block mb-1">Description</label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="" cols="30" rows="5" placeholder="App Description" required></textarea>
                                    
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endisset
                    
                </div>

            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}



</x-app-layout>
