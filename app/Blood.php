<?php

namespace App;
// use User;
use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    protected $guarded = [''];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
