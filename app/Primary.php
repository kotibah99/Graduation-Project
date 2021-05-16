<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Primary extends Model
{
    protected $guarded = [''];
    /**
     * Get the user that owns the Primary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }   
}
