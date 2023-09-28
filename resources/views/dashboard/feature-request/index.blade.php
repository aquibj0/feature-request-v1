<x-dashboard-layout>
    {{-- Page Header --}}

    <x-slot name="header">
        <h4 class="text-gray-900 fw-600 px-4">
            @isset($status)
                @if ($status == 'pending')
                    Pending
                @elseif ($status == 'in-progress')
                    In-Progress

                @elseif ($status == 'completed')
                    Completed

                @elseif ($status == 'rejected')
                    Rejected
                @endif
            @endisset {{ __(' Feature Requests') }}
        </h4>
    </x-slot>

    {{-- Slot --}}

    
        
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 session-status" :status="session('status')" />
    
    <div class="px-4">

    
        <div class="row px-0"> 

            <div class="col-md-12">

                <div class="card overflow-hidden m-2 border-0 bg-white" >
                    <div class="card-body">
                        <table class="table bg-white">
                            <thead>
                                <tr >
                                    {{-- <th scope="col" class="py-3">id</th> --}}
                                    
                                    <th scope="col" class="py-2">Request Title</th>
                                    {{-- <th scope="col" class="py-3">Request Description</th> --}}
                                    <th scope="col" class="py-2">Status</th>
                                    <th scope="col" class="py-3 text-center">Requested By</th>
                                    <th scope="col" class="py-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @isset($feature_requests)
                                    
                                    @foreach ($feature_requests as $data)
                                        <tr c>
                                            {{-- <td class="py-3">{{$data->app_id}}</td> --}}
                                           
                                            <td class="py-1">{{$data->feature_request_title}}</td>
                                            {{-- <td class="py-3">{{$data->feature_request_description}}</td> --}}
                                            <td class="py-1 text-center status">
                                                <div class="px-2 py-1 text-center {{$data->status}}">
                                                    {{$data->status}}
                                                </div>
                                            </td>
                                            <td class="py-1 text-center">{{$data->user_email}}</td>
                                            <td class="py-1 text-center">
                                                <a href="{{route('feature-req.show', $data['id'])}}" class="btn btn-primary btn-sm px-3">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

    
        </div>
    </div>



   

    {{-- <x-slot name="script">
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
    </x-slot> --}}

</x-dashboard-layout>
