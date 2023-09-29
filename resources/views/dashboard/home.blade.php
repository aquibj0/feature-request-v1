<x-dashboard-layout>
    {{-- Page Header --}}

    <x-slot name="header">
        <h4 class="text-gray-900 fw-600 px-4">
            {{ __('Dashboard') }}
        </h4>
    </x-slot>

    {{-- Slot --}}

    
        
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 session-status" :status="session('status')" />
    
    <div class="px-4">

    
        <div class="row px-0"> 


            @if (auth()->user()->app()->exists())
                <div class="col-md-12 mb-4">
                    
                    <div class="card shadow-sm border-0 p-1">
                        <div class="card-body py-4">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h4 class="fw-600">{{$app->app_name}}</h4>
                                    <p class="fs-6 fw-400 mb-0">{{$app->app_description}}</p>
                                </div>
                                <div class="col-md-3 text-end">
                                    <a href="" class="btn btn-primary  px-3"> View Details</a>
                                    <a href="" class="btn btn-warning  px-3"> Setting </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="bg-white shadow-md rounded p-6 my-4 w-full">

                        <div class="text-gray-700 font-medium text-lg mb-2">
                            
                        </div>

                        <div class="text-gray-700 font-medium text-lg mb-2">
                            
                        </div>

                        <div class="text-gray-700 font-medium text-lg mb-2">
                            {{route('feature-request.store', $app->app_id)}}
                        </div>

                        <div class="text-gray-700 font-medium text-lg mb-2">
                            {{$app->app_id}}
                        </div>
                                                
                        <div class="text-gray-700 font-medium text-lg ">
                            {{$app->user_id}}
                        </div>
                        


                        <div class="w-full max-w-md py-4 border px-4">
                            <form id="featureReq" enctype="multipart/form-data">
                                @csrf


                                <input  name="user_id" value="{{auth()->user()->id}}" id="">
                                <div class="mb-4">
                                    <label for="name" class="block mb-1">Name</label>
                                    <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="My First App" required value="Aquib">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block mb-1">Email</label>
                                    <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="email" placeholder="My First App" required value="Aquib@fueler.io">
                                </div>


                                <div class="mb-4">
                                    <label for="title" class="block mb-1">Title</label>
                                    <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="My First App" required value="Test Request">
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="block mb-1">Description</label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="" cols="30" rows="5" placeholder="App Description" required>Test Request Description</textarea>
                                    
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>


                    </div> --}}
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body grid-center">
                            <div>
                                <h4 class="fw-700">{{count($pending_feature_requests)}}</h4>
                                <p class="fs-6 fw-400">Pending Feature-Requests</p>
                                <a href="{{route('feature-request.status', 'pending')}}" class="btn btn-primary  px-3"> View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body grid-center">
                            <div>
                                <h4 class="fw-700">{{count($completed_feature_requests)}}</h4>
                                <p class="fs-6 fw-400">Completed Feature-Requests</p>
                                <a href="{{route('feature-request.status', 'completed')}}" class="btn btn-primary  px-3"> View</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body grid-center">
                            <div>
                                <h4 class="fw-700">{{count($approved_feature_requests)}}</h4>
                                <p class="fs-6 fw-400">Approved Feature-Requests</p>
                                <a href="{{route('feature-request.status', 'approved')}}" class="btn btn-primary  px-3"> View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body grid-center">
                            <div>
                                <h4 class="fw-700">{{count($in_progess_feature_requests)}}</h4>
                                <p class="fs-6 fw-400">In Progress Feature-Requests</p>
                                <a href="{{route('feature-request.status', 'in-progress')}}" class="btn btn-primary  px-3"> View</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body grid-center">
                            <div>
                                <h4 class="fw-700">{{count($rejected_feature_requests)}}</h4>
                                <p class="fs-6 fw-400">Rejected Feature-Requests</p>
                                <a href="{{route('feature-request.status', 'rejected')}}" class="btn btn-primary  px-3"> View</a>
                            </div>
                        </div>
                    </div>
                </div>

            @else

                <div class="col-md-6">
                    <div class="text-gray-900">
                        {{ __("Create Your First App") }}
                    </div>
                    <div class="w-full max-w-xs pt-4">
                        <form class="" action="{{route('app.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}" id="">
                            <div class="mb-4">
                                <label class="form-label">Name</label>
                                <input name="name" class="form-control" id="" type="text" placeholder="My First App" required>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block mb-1">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="5" placeholder="App Description" required></textarea>
                                
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <button class="btn-primary btn px-3" type="submit">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            @endif
        
        </div>
    </div>



   
    @if (auth()->user()->app()->exists())
        <x-slot name="script">
            <script type="text/javascript">

                $(document).ready(function(){


                    // action="" method="POST"
                    $('#featureReq').on('submit', function(event){

                        event.preventDefault();
                        

                        $.ajax({

                            beforeSend: function(xhr) {
                                xhr.setRequestHeader('X-Api-Key', "{{$app['app_api_key']}}")
                            },
                            
                            type: 'POST',
                            url:"http://127.0.0.1:8000/api/5784eba9-5fbf-44e8-aa15-5cdd1d46ab97/feature-request/store",
                            data: new FormData(document.getElementById('featureReq')),
                            enctype: 'multipart/form-data',
                            dataType: "JSON",
                            // headers: {
                            //     "X-Api-Key": '{{$app['app_api_key']}}',
                            // },
                            contentType: false,
                            cache: false,
                            processData: false,

                            success: function (data) {
                                $(".loading").hide();  
                                // location.reload();
                                console.log(data);

                            },
                            error:function(xhr, errors, status){
                                // $(".loading").hide();                   
                                console.log(xhr);
                            },
                        })
                    });



                

                });
            </script>
        </x-slot>
    @endif

</x-dashboard-layout>
