<x-dashboard-layout>
    {{-- Page Header --}}

    <x-slot name="header">
        <h4 class="text-gray-900 fw-600 px-4">
            {{ __('My App') }}
        </h4>
    </x-slot>

    {{-- Slot --}}

    
        
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 session-status" :status="session('status')" />
    
    <div class="px-4">

    
        <div class="row px-0"> 


            

            @if ($app)
                <div class="col-md-12 mb-4">

                    <div class="card shadow-sm border-0 p-1">
                        <div class="card-body py-4">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h4 class="fw-600">{{$app->app_name}}</h4>
                                    <p class="fs-6 fw-400 mb-0">{{$app->app_description}}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="bg-white" >
                        <div class="card-body">
                            <table class="table bg-white table-bordered">
                                <thead>
                                    <tr >
                                        <th scope="col" class="py-2 text-center">App Name</th>
                                        <th scope="col" class="py-2 text-center">Date Created</th>
                                        <th scope="col" class="py-2 text-center">App ID</th>
                                        <th scope="col" class="py-2 text-center">API Key</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @isset($app) 
                                        <tr>
                                            <td class="py-2 text-center">{{$app->app_name}}</td>
                                            <td class="py-2 text-center">{{date('s-M-Y', strtotime($app->created_at))}}</td>
                                            <td class="py-2 text-center">{{$app->app_id}}</td>
                                            <td class="py-2 text-center">{{$app->app_api_key}}</td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    

            @endif
        
        </div>
    </div>

</x-dashboard-layout>
