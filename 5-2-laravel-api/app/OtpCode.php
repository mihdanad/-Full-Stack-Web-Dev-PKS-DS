<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    // protected $table = 'otp_codes';

    protected $fillable = ['otp', 'user_id', 'valid_until'];

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
