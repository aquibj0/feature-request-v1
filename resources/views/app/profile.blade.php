<x-app-layout>

    <x-auth-session-status class="mb-4 session-status" :status="session('status')" />


    <header class="my-4">
        <div class="container">
            <div class="row justify-content-center">
                
            <div class="col-md-10 my-4">                    
                    
                    <div class="card shadow-sm border-0 p-1">
                        <div class="card-body py-4">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h4 class="fw-600">{{$app->app_name}}</h4>

                                    

                                    <p class="fs-6 fw-400 mb-0">{{$app->app_description}}</p>
                                </div>
                                <div class="col-md-3 text-end">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Request a feature
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    {{-- {{$app}} --}}

                    {{-- <div class="text-end mt-4">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown button
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        
                    </div> --}}



                    @if (isset($features_requested))                       
                        
                        @foreach ($features_requested as $data)

                            <div class="card p-1 my-4 bg-light shadow-sm {{$data->status}}">
                                <div class="card-body">
                                   <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <h3 class="fw-600 pb-1">{{$data->feature_request_title}} </h3>

                                            
                                            <p class="text-secondary mb-1 pb-1">{{date('s M, Y', strtotime($data->created_at))}}</p>                                           

                                            <p class="text-secondary fw-400">{{$data->feature_request_description}}</p>
                                            

                                            <hr>
                                            <div class="d-flex align-items-center mb-2">
                                                <div>
                                                    <i style="font-size: 1.15rem" class="bi bi-person-circle"></i>
                                                </div>
                                                <div>
                                                    <p  class="mb-0 ms-2">{{$data->user_name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </div>

                            
                        @endforeach

                    @endif

                </div>
            </div>
        </div>
    </header>

    <section>
        
    </section>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title ps-2" id="exampleModalLabel">Request a feature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="p-1">
                        <form action="{{route('feature-req.store', $app->slug)}}" method="POST" class="p-1" enctype="multipart/form-data">
                            {{-- @method('POST') --}}
                        {{-- <form id="featureReq" enctype="multipart/form-data"> --}}
                            @csrf


                            <div class="mb-3">
                                <label for="title" class="d-block mb-2">Feature Title</label>
                                <input type="text" name="title" class="form-control" id="title" :value="old('title')" required autocomplete="title" placeholder="Requesting like button for Posts">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="d-block mb-2">Feature Description</label>
                                <textarea name="description" id="" cols="30" class="form-control" rows="5"  required autocomplete="description" placeholder="Describe your request in few lines">{{old('description')}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="d-block mb-2">Name</label>
                                <input type="text" name="name" class="form-control" id="name" :value="old('name')" required autocomplete="name" placeholder="John Doe">
                            </div>


                            <div class="mb-3">
                                <label for="email" class="d-block mb-2">Email</label>
                                <input type="email" name="email" class="form-control" id="email" :value="old('email')" required autocomplete="email" placeholder="john@example.com">
                            </div>

                            
                            
                            <div class="mb-3 text-end">
                                <x-primary-button type="submit" class="px-3">Submit</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <script type="text/javascript">

        $(document).ready(function(){


            // action="" method="POST"
            $('#featureReq').on('submit', function(event){

                event.preventDefault();
                

                $.ajax({

                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-Api-Key', "{{$app['app_api_key']}}")
                    },
                    
                    type: 'POST',
                    url:"http://127.0.0.1:8000/api/{{$app->app_id}}/feature-request/store",
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
    </script> --}}

</x-app-layout>