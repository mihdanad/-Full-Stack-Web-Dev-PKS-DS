<?php

namespace App;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content' , 'id', 'post_id'];

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
        public function Post()
    {
        return $this->belongsTo('App\Post');
    }
}
