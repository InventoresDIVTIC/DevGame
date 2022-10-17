<?php

namespace App\Http\Livewire;

use League\Flysystem\MountManager;
use Livewire\Component;

class LikePost extends Component
{    
    //obtiene los datos del post
    public $post;
    public $isLike;
    public $likes; 

    //ciclo de vide de un livewire (contructor)
    public function mount($post){
        //Revisa si el usario ya dio like 
        $this->isLike = $post->checklikes(auth()->user());
        $this->likes = $post->likes()->count();
    }
    public function render(){
        return view('livewire.like-post');
    }

    public function like(){
        //Elimina Like
        if($this->post->checkLikes(auth()->user())){
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();
            $this->isLike = false;
            $this->likes--;
        }else{
            //Registra like
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLike = true;
            $this->likes++;
        }
    }

   
}
