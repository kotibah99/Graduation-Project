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
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function secondaries()
    {
        return $this->hasMany(Secondary::class);
    }
}
