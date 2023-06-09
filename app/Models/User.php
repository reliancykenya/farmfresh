<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
 
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function faunas(){
        return $this->hasMany(Fauna::class);
    }


    public function crops(){
        return $this->hasMany(Crop::class);
    }

    public function animals(){
        return $this->hasMany(Animal::class);
    }
    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }


    public function hasRole(...$user_roles){
        foreach($this->roles as $role){
            if(in_array($role->name,$user_roles)){
                return true;
            }
            return false;


        }

    }




}
