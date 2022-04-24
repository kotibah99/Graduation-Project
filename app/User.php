<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
  
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
   
    /**
     * Get all of the exam1s for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exam1s()
    {
        return $this->hasMany(Exam1::class);
    }

    public function fund1s()
    {
        return $this->hasMany(Fund1::class);
    }

    public function certms()
    {
        return $this->hasMany(Certm::class);
    }

    public function unilifes()
    {
        return $this->hasMany(Unilife::class);
    }

    public function lifens()
    {
        return $this->hasMany(Lifen::class);
    }

    public function Marks()
    {
        return $this->hasMany(Mark::class);
    }
    public function Markns()
    {
        return $this->hasMany(Markn::class);
    }

    public function grads()
    {
        return $this->hasMany(Grad::class);
    }

    public function hcerts()
    {
        return $this->hasMany(Hcert::class);
    }

    public function gradcs()
    {
        return $this->hasMany(Gradc::class);
    }

    public function gradorders()
    {
        return $this->hasMany(Gradorder::class);
    }

    public function bloods()
    {
        return $this->hasMany(Blood::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function seconds()
    {
        return $this->hasMany(Second::class);
    }

    public function termns()
    {
        return $this->hasMany(Termen::class);
    }

    public function gradcerts()
    {
        return $this->hasMany(Gradcert::class);
    }

    public function manuals()
    {
        return $this->hasMany(Manual::class);
    }

    public function rejects()
    {
        return $this->hasMany(Reject::class);
    }


    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        return false;
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
    public function setImpersonating($id)
    {
        Session::put('impersonate', $id);
    }

    public function stopImpersonating()
    {
        Session::forget('impersonate');
    }

    public function isImpersonating()
    {
        return Session::has('impersonate');
    }
}
