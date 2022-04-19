<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $guarded = [''];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
