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

                    <div class="card shadow-sm border-0 p-1 my-4">
                        <div class="card-body py-4">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h4 class="fw-600">API Key</h4>
                                    <p class="fs-6 fw-400 mb-0">{{$app->app_api_key}}</p>
                                </div>
                                <div class="col-md-3 text-end">
                                    {{-- <a href="" class="btn btn-primary  px-3"> View Details</a> --}}
                                    <a href="" class="btn btn-warning  px-3"> Copy </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card shadow-sm border-0 p-1">
                        <div class="card-body py-4">
                            <div class="row align-items-center">
                                <div class="col-md-9">
                                    <h4 class="fw-600">Form URL</h4>
                                    <p class="fs-6 fw-400 mb-0">{{route('feature-request.store', $app->app_id)}}</p>
                                </div>
                                <div class="col-md-3 text-end">
                                    <a href="" class="btn btn-warning  px-3"> Copy </a>
                                </div>
                                
                            </div>
                        </div>
                    </div> --}}

                    <div class="card shadow-sm border-0 p-1 my-4">
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
                    </div>
                </div>

    

            @endif
        
        </div>
    </div>

</x-dashboard-layout>
