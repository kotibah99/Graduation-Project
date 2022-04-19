<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class Certm extends Model
{
    protected $guarded = [''];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
