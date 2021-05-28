<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Secondary extends Model
{
    protected $guarded = [''];
    public function primary(): BelongsTo
    {
        return $this->belongsTo(Primary::class);
    }   
}
