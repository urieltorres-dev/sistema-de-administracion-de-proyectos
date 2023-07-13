//Configuración de dropzone

import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif,.pdf",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 100,
    uploadMultiple: false,
    //Trabajado con imagen en el contenedor de Dropzone
    init: function(){
        if(document.querySelector('[name="file"]').value.trim()){
            const file_upload= {};
            file_upload.size = 1000;
            file_upload.name = document.querySelector('[name="file"]').value;
            this.options.addedfile.call(this, file_upload);
            this.options.thumbnail.call(this, file_upload, '/uploads/${file_upload.name}');
            file_upload.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

//Eventos de Dropzone
//Información de la imagen
/*dropzone.on('sending', function(file, xhr, fromdata){
    console.log(file);
});*/

//1. Envío correcto de la imagen
dropzone.on('success', function(file, response){
    document.querySelector('[name="file"]').value = response.imagen;
});

//2. Evento de envío con error
dropzone.on('error', function(file, message){
    console.log(message);
});

//3. Evento cuando remueves un archivo
dropzone.on('removedfile', function(){
    document.querySelector('[name="file"]').value = "";
});
