<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserApp;

class APIAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('X-Api-Key'); // Assuming you send the API key in the X-Api-Key header

        if (!$apiKey) {
            return response()->json(['message' => 'API key is missing'], 401);
        }

        $application = UserApp::where('app_api_key', $apiKey)->first();

        if (!$application) {
            return response()->json(['message' => 'Invalid API key'], 401);
        }

        // Attach the Application instance to the request for later use
        $request->attributes->add(['application' => $application]);

        return $next($request);
    }
}
