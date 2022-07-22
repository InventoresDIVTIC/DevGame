import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

//Dropzone se encarga de la parte de subir imagenes y darle estilos 
const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    //Se ejecuta al crear dropzone
    init: function(){
        //Valida si hay algun dato cargado en dropzone
        if(document.querySelector('[name = "imagen"]').value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name = "imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this,
                imagenPublicada, 
                `/uploads/${imagenPublicada.name}`
                );

            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
        }
    }
});


//Respponde cuando se subio la imagen con exito
dropzone.on('success', (file, response)=>{
    document.querySelector('[name = "imagen"]').value = response.imagen;
});

dropzone.on('removeFile', ()=>{
    document.querySelector('[name = ""imagen]').value = '';
});

