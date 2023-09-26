<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upvotes extends Model
{
    use HasFactory;

    protected $table = 'upvotes';

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'feature_request_id'
    ];

}
