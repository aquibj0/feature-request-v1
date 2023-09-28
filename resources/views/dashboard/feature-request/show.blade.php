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

            <div class="col-md-9">

                <div class="card overflow-hidden mt-2 border p-1 mb-4" >
                    <div class="card-body">

                        <h3 class="fw-600 text-gray-900">{{$feature_request->feature_request_title}}</h3>
                        

                        @php
                            $date = Carbon\Carbon::parse($feature_request->created_at)->format('M d, Y')
                        @endphp

                        <p class="fw-500 pt-2">{{$date}}</p>

                        <p class="fw-400" style="line-height: 1.5">{{$feature_request->feature_request_description}}</p>

                        <hr>

                        <h6>Requested By : <span class="fw-600">{{$feature_request->user_name}} ({{$feature_request->user_email}})</span></h6>

                    </div>
                </div>
                <hr>
                <div class="card bg-white my-4">
                    <div class="card-body">

                        <h3 class="fw-600 text-gray-900 mb-2">{{'Comments'}}</h3>

                        <div class="my-4">
                            <form action="{{route('comment.store', $feature_request->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <textarea name="comment" class="form-control" id="" cols="30" rows="5" placeholder="Add a comment here"></textarea>
                                <div class="text-end mt-3">
                                    <x-primary-button type="submit">Post Comment</x-primary-button>
                                </div>
                            </form>
                        </div>

                        <hr>

                        @foreach ($feature_request->comments as $data)
                            <div class="card my-4">
                                <div class="card-body">
                                    <p class="mb-2">{{$data->comment}}</p>

                                    @php
                                        $date = Carbon\Carbon::parse($data->created_at)->format('M d, Y')
                                    @endphp
                                    <small class="mb-0 text-danger">{{$date}}</small>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>


            </div>

            <div class="col-md-3">

                <div class="card my-2 bg-white shadow-sm border-0">
                    <div class="card-body">
                        <form action="{{route('feature-req.update', $feature_request['id'])}}" method="POST" enctype="multipart/form-data">
                            
                            @method('PUT')
                            @csrf

                            <label for="status" class="d-block my-2">Status</label>
                            <select name="status" class="form-selec form-control text-black" id="">
                                <option value="{{$feature_request->status}}" selected>{{$feature_request->status}}</option>
                                <option value="completed">Complete</option>
                                <option value="rejected">Reject</option>
                                <option value="pending">Pending</option>
                            </select>

                            <label for="comment" class="d-block mt-3 mb-2">Comment(if any)</label>
                            <textarea name="comment" id="" class="form-control" cols="30" rows="5"></textarea>

                            <div class="my-3">
                                <x-primary-button type="submit" class="w-100">Submit</x-primary-button>
                            </div>
                        </form>
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
