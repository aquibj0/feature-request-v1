<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class FeatureRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            'name' => $this->user_name,
            'email' => $this->user_email,
            'title' => $this->feature_request_title,
            'description' => $this->feature_request_description,
            'status' => $this->status,
            'date' => Carbon::parse($this->created_at)->format('M d, Y'),
        ];
    }
}
