$("#nombre").focus();
$("#volver").on("click", function(e){
    e.preventDefault();
    window.location = "login";
});

$("#usuario").on("blur", function(){
   if($(this).val() !== ""){
       $.ajax({
           url: "ajax/usuarios.ajax.php",
           type: "POST",
           dataType: "json",
           data:{
              validarUsuario: $(this).val() 
           }
       }).done(function(res){
           if(res){
               if(res.existe === "si"){
                   swal({
                        title: "Validar Usuario", 
                        text: "¡El usuario que ha ingresado ya existe, por favor intente con otro!",
                        type: 'warning',
                        confirmButtonText: 'Aceptar'
                    }).then(function(result){
                        if(result.value){
                            $("#usuario").val("").focus();
                        }
                    });
               }
           }
       });       
   } 
});

