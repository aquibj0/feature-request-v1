<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApp extends Model
{
    use HasFactory;

    protected $table = 'user_apps';

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'app_id',
        'user_id',
        'app_name',
        'app_description',
        'app_api_key'
    ];


    // Mutator to hash the API key before saving it
    public function setApiKeyAttribute($value)
    {
        $this->attributes['app_api_key'] = bcrypt($value);
    }

    public function domain(){
        return $this->hasOne('App\Models\CustomDomain','app_id');
    }


}
