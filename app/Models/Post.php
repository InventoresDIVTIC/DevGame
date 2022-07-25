<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'username', 'imagen']);
    }

    public function comentarios(){
        //Relacion de 1 a muchos
        return $this->hasMany(Comentario::class);
    }

    //Esto hace la relacion entre la tabla post y la tabla likes(Relacion de 1 a muchos)
    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function checkLikes(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
