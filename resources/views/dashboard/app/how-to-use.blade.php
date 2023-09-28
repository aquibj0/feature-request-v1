<x-dashboard-layout>
    {{-- Page Header --}}

    <x-slot name="header">
        <h4 class="text-gray-900 fw-600 px-4">
            {{ __('How To Use') }}
        </h4>
    </x-slot>

    {{-- Slot --}}
        
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 session-status" :status="session('status')" />
    
    <div class="px-4">
        <div class="row px-0"> 
            @if ($app)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm border-0 p-1 my-4">
                        <div class="card-body py-4">
                            <div>
                                <div class="mb-4">
                                    <h5 class="fw-600">Introduction</h5>
                                    <p class="fs-6 fw-400 mb-0">
                                        Our Feature Request API allows you to seamlessly integrate feature request functionality into your <b>Aapplication</b>. Users can submit feature requests, and you can track and manage them through our API.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h5 class="fw-600">Authentication</h5>
                                    
                                    <p class="fs-6 fw-400">
                                        To access the Feature Request API, you need to include your unique API key in the header of your HTTP requests. The API key is used for authentication and authorization.
                                    </p>
                                </div>
                                
                                <div class="mb-4">
                                    <h5 class="fw-600">API Key Header</h5>
                                
                                    <p class="fs-6 fw-400">
                                        Include the following header in your HTTP requests:
                                        <ul>
                                            <li class="mb-2">Header Name: <span class="fw-600">X-Api-Key</span></li>
                                            <li>Header Value: <span class="fw-600">Your unique API key</span></li>
                                        </ul>
                                    </p>
                                    <p>Note: Your API key is generated after registering your application.</p>
                                </div>


                                <div class="mb-4">
                                    <h5 class="fw-600">API Endpoints</h5>
                                    <p class="fs-6 fw-400 ">
                                        API provides the following endpoints for managing feature requests:
                                        {{-- {{route('feature-request.store', $app->app_id)}} --}}
                                        <ul>
                                            <li class="mb-2"><span class="fw-500"><b>POST</b> /api/{YOUR_APP_ID}/feature-request/store</span > : Submits a new feature request.</li>
                                            <li><span class="fw-500"><b>GET</b> /api/{YOUR_APP_ID}/feature-request</span > : Fetch feature requests submitted by the user.</li>
                                        </ul>
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h5 class="fw-600">Submitting a Feature Request</h5>
                                    <p class="fs-6 fw-400 ">
                                        To submit a feature request, make a POST request to the following endpoint:

                                        <ul>
                                            <li class="mb-2">Endpoint: <b>POST /api/{YOUR_APP_ID}/feature-request/store</b></li>
                                            <li class="mb-2">Request Headers:
                                                <ul>
                                                    <li class="my-2"><b>Content-Type</b>: application/json</li>
                                                    <li class="mb-2"><b>X-Api-Key</b>: YOUR_API_KEY (Replace YOUR_API_KEY with your actual API key)</li>
                                                </ul>
                                            </li>
                                            <li class="mb-2">Request Body:
<pre class="mt-3">
<code>
{
    "name": "Name of the user",
    "email": "Email of the user",
    "title": "New Feature Request",
    "description": "Description of the feature request"
}
</code>
</pre>
                                            </li>
                                            <li class="mb-2">Response: JSON response indicating the success or failure of the request.</li>
                                        </ul>
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h5 class="fw-600">Fetching Feature Requests</h5>
                                    <p class="fs-6 fw-400 ">
                                    To fetch feature requests submitted by the authenticated user, make a GET request to the following endpoint:

                                        <ul>
                                            <li class="mb-2">Endpoint:
                                                <ul>
                                                    <li class="mb-2">GET /api/{YOUR_APP_ID}/feature-requests (Replace YOUR_APP_ID with your actual API ID</li>
                                                </ul>
                                            </li>
                                            <li class="mb-2">Request Headers:
                                                <ul>
                                                    <li class="mb-2"><span class="fw-600">X-Api-Key</span>: YOUR_API_KEY (Replace YOUR_API_KEY with your actual API key)</li>
                                                </ul>
                                            </li>
                                            <li>Request Body:
<pre class="mt-2">
<code>
{
    "name": "Name of the user",
    "email": "Email of the user",
    "title": "New Feature Request",
    "description": "Description of the feature request",
    "date": "Submission Date",
    "status": "status of the feature request (pending, in-progress, completed, rejected)"
}
</code>
</pre>
                                            </li>
                                            <li>Response:
                                                <ul>
                                                    <li class="mt-2">JSON response indicating the success or failure of the request.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </p>
                                </div>


                                <div class="mb-4">
                                    <h5 class="fw-600">Error Handling</h5>
                                    <p class="fs-6 fw-400 ">In case of errors, our API will return appropriate HTTP status codes and error messages. Be sure to handle errors gracefully in your application.</p>

                                </div>

                                <div class="mb-4">
                                    <h5 class="fw-600">Example Code</h5>
                                    <p class="fs-6 fw-400 ">Here's an example of how to make a POST request using cURL:</p>

<pre>
<code>
curl -X POST -H "Content-Type: application/json" -H "X-Api-Key: YOUR_API_KEY" -d '{
    "name": "Name of the user",
    "email": "Email of the user",
    "title": "New Feature Request"
    "description": "Description of the feature request"
}' http://your-api-url/api/feature-requests
</code>
</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif        
        </div>
    </div>
</x-dashboard-layout>
