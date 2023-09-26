<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureRequest extends Model
{
    use HasFactory;
    
    protected $table = 'feature_requests';

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'app_id',
        'feature_request_id',
        'user_name',
        'user_email',
        'feature_request_title',
        'feature_request_description',
        'status'
    ];

}
