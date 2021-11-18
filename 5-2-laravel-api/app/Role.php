<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $table = 'roles';
    
    protected $fillable = ['name' , 'id'];

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

    public function users()
    {
        return $this->hasMany('App\User');
    }
}