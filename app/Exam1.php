<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class Exam1 extends Model
{
    protected $guarded = [''];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
