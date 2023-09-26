<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeatureRequest;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'feature_request_id',
        'comment'
    ];

    public function featureRequest()
    {
        return $this->belongsTo(FeatureRequest::class, 'feature_request_id');
    }
}
