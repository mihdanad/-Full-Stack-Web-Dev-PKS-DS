<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{   
    // protected $table = 'users';

        protected $fillable = [
        'username', 'email', 'name', 'role_id', 'id'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
    	parent::boot();

    	static::creating( function($model){
    		if( empty($model->id) ){
    			$model->id = Str::uuid();
    		}
    	});
    }

    public function roles()
    {
        return $this->belongsTo('App\Role');
    }
}
