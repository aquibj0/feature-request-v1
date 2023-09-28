<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserApp;

class CustomDomain extends Model
{
    use HasFactory;

    protected $fillable = ['app_id', 'domain', 'is_ssl_enabled'];

    public function app(){
        return $this->belongsTo(UserApp::class);
    }
}
