<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
        'username',
        'type'
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

    public function posts(){
        //Relacion 1 a muchos
        return $this->hasMany(Post::class);
    }

    public function levels(){
        //Relacion 1 a muchos
        return $this->hasMany(levels::class);
    }

    //Esto crea relacion entre tabla usarios y likes(Relacion 1 a muchos)
    public function likes(){
        return $this->hasMany(Like::class);
    }

    //almacena seguidores en tabla follower
    public function followers(){
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function Following(){
        return $this->belongsToMany(User::class, 'followers',  'follower_id', 'user_id');
    }

    //Verifica si ya sigue al usuario
    public function checkFollow(User $user){
        return $this->followers->contains($user->id);
    }

    

}
