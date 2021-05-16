<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [''];
    /**
     * Get all of the primaries for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function primaries()
    {
        return $this->hasMany(Primary::class);
    }
}
