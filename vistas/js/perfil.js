
$(document).ready(function(){
    CKEDITOR.replace("metasperfil", {
        toolbar:[
            { name: "basistyles", items: ['Bold', 'Italic']},
            { name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] }
        ]   
    });
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        type: "POST",
        dataType: "json",
        data:{
            accion: "cargarusuario"
        }
    }).done(function(res){
       CKEDITOR.instances["metasperfil"].updateElement();
       CKEDITOR.instances["metasperfil"].setData("");
       if(res){
           $("#usuarioperfil").val(res.usuario);
           $("#claveactual").val(res.password);
           $("#nombreperfil").val(res.nombre);
           $("#correoperfil").val(res.correo);
           $("#celularperfil").val(res.celular);
           $("#institutoperfil").val(res.instituto);
           $("#fecnacperfil").val(res.fecnac);
           $("#fotoactual").val(res.foto);
           CKEDITOR.instances["metasperfil"].setData(res.metas);
       } 
    });
    
    /*=============================================
    SUBIENDO LA FOTO DEL USUARIO
    =============================================*/
    $("#fotoperfil").change(function(){

            var imagen = this.files[0];

            /*=============================================
            VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
            =============================================*/

            if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

                    $("#fotoperfil").val("");

                     swal({
                          title: "Error al subir la imagen",
                          text: "¡La imagen debe estar en formato JPG o PNG!",
                          type: "error",
                          confirmButtonText: "¡Cerrar!"
                        });

            }else if(imagen["size"] > 2000000){

                    $("#fotoperfil").val("");

                     swal({
                          title: "Error al subir la imagen",
                          text: "¡La imagen no debe pesar más de 2MB!",
                          type: "error",
                          confirmButtonText: "¡Cerrar!"
                        });

            }
    });
});