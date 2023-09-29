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
                                <div class="col-md-3 text-end">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Edit App
                                    </button>

                                    <a href="{{route('app.keys')}}" class="btn btn-warning  px-3"> Access Keys </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card shadow-sm border-0 p-1 my-4">
                        <div class="card-body py-4">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h4 class="fw-600">How to use</h4>

                                    <h5 class="fw-500">Introduction</h5>
                                    <p class="fs-6 fw-400 ">
                                        Our Feature Request API allows you to seamlessly integrate feature request functionality into your SaaS application. Users can submit feature requests, and you can track and manage them through our API.
                                    </p>

                                    <h5 class="fw-500">Authentication</h5>
                                    <p class="fs-6 fw-400">
                                        To access the Feature Request API, you need to include your unique API key in the header of your HTTP requests. The API key is used for authentication and authorization.
                                    </p>
                                    <p class="fs-6 fw-400">
                                        Include the following header in your HTTP requests:

                                        <ul>
                                            <li>Header Name: X-Api-Key</li>
                                            <li>Header Value: Your unique API key</li>
                                        </ul>
                                    </p>
                                    <h5 class="fw-500">API Endpoints</h5>
                                    <p class="fs-6 fw-400 ">
                                        Our API provides the following endpoints for managing feature requests:

                                        <ul>
                                            <li><b>POST:</b> {{route('feature-request.store', $app->app_id)}}: Submit a new feature request.</li>
                                        </ul>
                                    </p>


                                    <h5 class="fw-500">Submitting a Feature Request</h5>
                                    <p class="fs-6 fw-400 ">
                                        To submit a feature request, make a POST request to the following endpoint:

                                        <ul>
                                            <li><b>Endpoint:</b> POST {{route('feature-request.store', $app->app_id)}}: Submit a new feature request.</li>
                                            <li>Request Headers:
                                                <ul>
                                                    <li><b>Content-Type</b>: application/json</li>
                                                    <li><b>X-Api-Key</b>: YOUR_API_KEY (Replace YOUR_API_KEY with your actual API key)</li>
                                                </ul>
                                            </li>
                                            <li>Request Body:
                                                <ul>
                                                    <li>
                                                        <code>
                                                            {
                                                                "name": "Name of the user",
                                                                "email": "Email of the user",
                                                                "title": "New Feature Request",
                                                                "description": "Description of the feature request"
                                                            }
                                                        </code>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><b>Response:</b> JSON response indicating the success or failure of the request.</li>
                                        </ul>
                                    </p>

                                    <h5 class="fw-500">Error Handling</h5>
                                    <p class="fs-6 fw-400 ">In case of errors, our API will return appropriate HTTP status codes and error messages. Be sure to handle errors gracefully in your application.</p>

                                    <h5 class="fw-500">Example Code</h5>
                                    <p class="fs-6 fw-400 ">Here's an example of how to make a POST request using cURL:</p>
                                    <code>
                                        curl -X POST -H "Content-Type: application/json" -H "X-Api-Key: YOUR_API_KEY" -d '{ <br>
                                             "name": "Name of the user", <br>
                                            "email": "Email of the user", <br>
                                            "title": "New Feature Request",<br>
                                            "description": "Description of the feature request" <br>
                                        }' http://your-api-url/api/feature-requests</code>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div> --}}


                    


                </div>
                {{-- <div class="setting">
                    <h4 class="fw-600">Setting</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-white">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('save.custom.domain') }}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="app_id" value="{{$app->id}}">
                                        <div class="mb-3">
                                            <label for="domain" class="d-block mb-2">Custom Domain:</label>
                                            <input type="text" id="domain" name="domain" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="is_ssl_enabled" class="mb-2">Enable SSL/TLS:</label>
                                            <input type="checkbox" id="is_ssl_enabled" class="ms-2" name="is_ssl_enabled" checked value="1">
                                        </div>
                                        <button type="submit" class="btn btn-primary px-4">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

    

            @endif
        
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit App</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="" method="POST" class="p-1" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="d-block mb-2">App Name</label>
                            <input type="text" name="name" class="form-control form-control-lg" id="" value="{{$app->app_name}}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="d-block mb-2">App Description</label>
                            <textarea name="description" id="" cols="30" class="form-control form-control-lg" rows="5">{{$app->app_description}}</textarea>
                        </div>
                        
                        <div class="mb-3 text-end">
                            <x-primary-button type="submit" class="px-3">Update</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
