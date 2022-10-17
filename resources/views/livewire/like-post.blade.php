{{-- Regla en liveware siempre se tiene que retornar un div y su contenido --}}
<div>
    <div class="flex gap-2 items-center">
        {{-- Muetsra boton de like y llama la funcion de like en LikePost para agregarlo o eliminarlo --}}
        <button wire:click="like">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" 
                fill="{{$isLike ? "#26619c" : "none"}}" 
                viewBox="0 0 24 24" 
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
            </svg>
        </button>
        <p class="font-bold">{{$likes}} <span class="font-normal">Likes</span></p>
    </div>
</div>
