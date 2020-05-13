var barra = 1.7;

$(document).ready(function(){

var pasos = 0;
    

$('#smartwizard').smartWizard({
    selected: 0,
    keyNavigation:true,
    showStepURLhash: false,
    lang: {  // Language variables
        next: 'Siguiente >>', 
        previous: '<< Anterior'
    },
    toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                toolbarExtraButtons: [
			$('<button></button>',{ style: "display:none"}).text('Finalizar Test')
					      .addClass('btn btn-info finalizar')
					      .on('click', guardarPrueba),
			$('<button></button>').text('Empezar de Nuevo')
					      .addClass('btn btn-danger cancelar')
					      .on('click', function(){
                                                for(var i=0; i< 60; i++){
                                                    var name = "alternativa"+(i+1);
                                                    var valor = localStorage.getItem("alternativa"+(i+1));
                                                    $("input:radio[name='"+name+"'][value='"+valor+"']").prop("checked", false);
                                                    localStorage.removeItem("alternativa"+(i+1));
                                                }
                                                barra = 0;
                                                $("#bar-progreso").attr("style","width: "+barra+"%");
                                                $("#progreso").text(Math.round(parseInt(barra))+"%");
						$('#smartwizard').smartWizard("reset");
					      })
                      ]
    }, 
    transitionEffect: 'fade',
    transitionSpeed:'3000'

});

if(localStorage.length > 0){
    var step = 0;
    for(var i=0; i < 60; i++){
        if(localStorage.getItem("alternativa"+(i+1)) !== null){
            var name = "alternativa"+(i+1);
            var valor = localStorage.getItem("alternativa"+(i+1));
            $("input:radio[name='"+name+"'][value='"+valor+"']").prop("checked", true);
            $("#bar-progreso").attr("style","width: "+barra+"%");
            $("#progreso").text(Math.round(parseInt(barra))+"%");
            barra = barra + 1.6;
        }
        else{
            break;
        }
        step = i;
        
    }
    
    if(parseInt(step+1) === 60){
        $("button.finalizar").removeAttr("style");
        $("button.cancelar").attr("style","display:none");
    }
    else{
        $("button.finalizar").attr("style","display:none");
        $("button.cancelar").removeAttr("style");
    }
    $('#smartwizard').smartWizard('goToStep',step);
            
}

// Blur
$("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
    var paso = parseInt(stepNumber) + 1;
    
    if(anchorObject.attr("href") !== "#pregunta"+(paso+1)){
        $('#smartwizard').smartWizard('goToStep',(parseInt(paso)-1));
    }
    
    if(stepDirection === "forward"){
        barra = barra + 1.6;
        if(!$(".alternativa"+paso).is(":checked")){
            swal({
                title: "Seleccionar Alternativa", 
                text: "Debe seleccionar una de las alternativas ofrecidas",
                type: 'warning',
                confirmButtonText: 'Aceptar'
            });
            
            
            return false;
        }
        else if($(".alternativa"+paso).is(":checked")){
            //localStorage.setItem("alternativa"+paso, $(".alternativa"+paso).val());
        }
        if(paso === 60){
            
        }
        $("#bar-progreso").removeAttr("style");
        $("#bar-progreso").attr("style","width: "+barra+"%");
        $("#progreso").text(Math.round(parseInt(barra))+"%");
    }
    else if(stepDirection === "backward"){
        barra = barra - 1.6;
        if(paso === 60){
            $("button.finalizar").removeAttr("style");
            $("button.cancelar").attr("style","display:none");
            
        }
        else{
            $("button.finalizar").attr("style","display:none");
            $("button.cancelar").removeAttr("style");
        }
        $("#bar-progreso").removeAttr("style");
        $("#bar-progreso").attr("style","width: "+barra+"%");
        $("#progreso").text(Math.round(parseInt(barra))+"%");
    }
    
});

// Focus
$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
    var paso = parseInt(stepNumber) + 1;
    
    if(stepDirection === "forward"){
        if(paso === 60){
            $("button.finalizar").removeAttr("style");
            $("button.cancelar").attr("style","display:none");
            barra = barra + 0.71;
            $("#bar-progreso").attr("style","width: "+barra+"%");
            $("#progreso").text(Math.round(parseInt(barra))+"%");
        }
        else{
            $("button.finalizar").attr("style","display:none");
            $("button.cancelar").removeAttr("style");
        }
    }
    else if(stepDirection === "backward"){
        if(paso === 60){
            $("button.finalizar").removeAttr("style");
            $("button.cancelar").attr("style","display:none");
        }
        else{
            $("button.finalizar").attr("style","display:none");
            $("button.cancelar").removeAttr("style");
        }
    }
    
});

function guardarPrueba(){
    
    if(!$(".alternativa1").is(":checked")){ $('#smartwizard').smartWizard('goToStep',0); }
    else if(!$(".alternativa2").is(":checked")){ $('#smartwizard').smartWizard('goToStep',1); }
    else if(!$(".alternativa3").is(":checked")){ $('#smartwizard').smartWizard('goToStep',2); }
    else if(!$(".alternativa4").is(":checked")){ $('#smartwizard').smartWizard('goToStep',3); }
    else if(!$(".alternativa5").is(":checked")){ $('#smartwizard').smartWizard('goToStep',4); }
    else if(!$(".alternativa6").is(":checked")){ $('#smartwizard').smartWizard('goToStep',5); }
    else if(!$(".alternativa7").is(":checked")){ $('#smartwizard').smartWizard('goToStep',6); }
    else if(!$(".alternativa8").is(":checked")){ $('#smartwizard').smartWizard('goToStep',7); }
    else if(!$(".alternativa9").is(":checked")){ $('#smartwizard').smartWizard('goToStep',8); }
    else if(!$(".alternativa10").is(":checked")){ $('#smartwizard').smartWizard('goToStep',9); }
    else if(!$(".alternativa11").is(":checked")){ $('#smartwizard').smartWizard('goToStep',10); }
    else if(!$(".alternativa12").is(":checked")){ $('#smartwizard').smartWizard('goToStep',11); }
    else if(!$(".alternativa13").is(":checked")){ $('#smartwizard').smartWizard('goToStep',12); }
    else if(!$(".alternativa14").is(":checked")){ $('#smartwizard').smartWizard('goToStep',13); }
    else if(!$(".alternativa15").is(":checked")){ $('#smartwizard').smartWizard('goToStep',14); }
    else if(!$(".alternativa16").is(":checked")){ $('#smartwizard').smartWizard('goToStep',15); }
    else if(!$(".alternativa17").is(":checked")){ $('#smartwizard').smartWizard('goToStep',16); }
    else if(!$(".alternativa18").is(":checked")){ $('#smartwizard').smartWizard('goToStep',17); }
    else if(!$(".alternativa19").is(":checked")){ $('#smartwizard').smartWizard('goToStep',18); }
    else if(!$(".alternativa20").is(":checked")){ $('#smartwizard').smartWizard('goToStep',19); }
    else if(!$(".alternativa21").is(":checked")){ $('#smartwizard').smartWizard('goToStep',20); }
    else if(!$(".alternativa22").is(":checked")){ $('#smartwizard').smartWizard('goToStep',21); }
    else if(!$(".alternativa23").is(":checked")){ $('#smartwizard').smartWizard('goToStep',22); }
    else if(!$(".alternativa24").is(":checked")){ $('#smartwizard').smartWizard('goToStep',23); }
    else if(!$(".alternativa25").is(":checked")){ $('#smartwizard').smartWizard('goToStep',24); }
    else if(!$(".alternativa26").is(":checked")){ $('#smartwizard').smartWizard('goToStep',25); }
    else if(!$(".alternativa27").is(":checked")){ $('#smartwizard').smartWizard('goToStep',26); }
    else if(!$(".alternativa28").is(":checked")){ $('#smartwizard').smartWizard('goToStep',27); }
    else if(!$(".alternativa29").is(":checked")){ $('#smartwizard').smartWizard('goToStep',28); }
    else if(!$(".alternativa30").is(":checked")){ $('#smartwizard').smartWizard('goToStep',29); }
    
    else if(!$(".alternativa31").is(":checked")){ $('#smartwizard').smartWizard('goToStep',30); }
    else if(!$(".alternativa32").is(":checked")){ $('#smartwizard').smartWizard('goToStep',31); }
    else if(!$(".alternativa33").is(":checked")){ $('#smartwizard').smartWizard('goToStep',32); }
    else if(!$(".alternativa34").is(":checked")){ $('#smartwizard').smartWizard('goToStep',33); }
    else if(!$(".alternativa35").is(":checked")){ $('#smartwizard').smartWizard('goToStep',34); }
    else if(!$(".alternativa36").is(":checked")){ $('#smartwizard').smartWizard('goToStep',35); }
    else if(!$(".alternativa37").is(":checked")){ $('#smartwizard').smartWizard('goToStep',36); }
    else if(!$(".alternativa38").is(":checked")){ $('#smartwizard').smartWizard('goToStep',37); }
    else if(!$(".alternativa39").is(":checked")){ $('#smartwizard').smartWizard('goToStep',38); }
    else if(!$(".alternativa40").is(":checked")){ $('#smartwizard').smartWizard('goToStep',39); }
    else if(!$(".alternativa41").is(":checked")){ $('#smartwizard').smartWizard('goToStep',40); }
    else if(!$(".alternativa42").is(":checked")){ $('#smartwizard').smartWizard('goToStep',41); }
    else if(!$(".alternativa43").is(":checked")){ $('#smartwizard').smartWizard('goToStep',42); }
    else if(!$(".alternativa44").is(":checked")){ $('#smartwizard').smartWizard('goToStep',43); }
    else if(!$(".alternativa45").is(":checked")){ $('#smartwizard').smartWizard('goToStep',44); }
    else if(!$(".alternativa46").is(":checked")){ $('#smartwizard').smartWizard('goToStep',45); }
    else if(!$(".alternativa47").is(":checked")){ $('#smartwizard').smartWizard('goToStep',46); }
    else if(!$(".alternativa48").is(":checked")){ $('#smartwizard').smartWizard('goToStep',47); }
    else if(!$(".alternativa49").is(":checked")){ $('#smartwizard').smartWizard('goToStep',48); }
    else if(!$(".alternativa50").is(":checked")){ $('#smartwizard').smartWizard('goToStep',49); }
    else if(!$(".alternativa51").is(":checked")){ $('#smartwizard').smartWizard('goToStep',50); }
    else if(!$(".alternativa52").is(":checked")){ $('#smartwizard').smartWizard('goToStep',51); }
    else if(!$(".alternativa53").is(":checked")){ $('#smartwizard').smartWizard('goToStep',52); }
    else if(!$(".alternativa54").is(":checked")){ $('#smartwizard').smartWizard('goToStep',53); }
    else if(!$(".alternativa55").is(":checked")){ $('#smartwizard').smartWizard('goToStep',54); }
    else if(!$(".alternativa56").is(":checked")){ $('#smartwizard').smartWizard('goToStep',55); }
    else if(!$(".alternativa57").is(":checked")){ $('#smartwizard').smartWizard('goToStep',56); }
    else if(!$(".alternativa58").is(":checked")){ $('#smartwizard').smartWizard('goToStep',57); }
    else if(!$(".alternativa59").is(":checked")){ $('#smartwizard').smartWizard('goToStep',58); }
    else if(!$(".alternativa60").is(":checked")){ $('#smartwizard').smartWizard('goToStep',59); }
    
    else{
        $.ajax({
            url: "ajax/tests.ajax.php",
            type: "POST",
            dataType: "json",
            data:{
                accion: "guardarprueba",
                pregunta1: $("input:radio[name='alternativa1']:checked").val(),
                pregunta2: $("input:radio[name='alternativa2']:checked").val(),
                pregunta3: $("input:radio[name='alternativa3']:checked").val(),
                pregunta4: $("input:radio[name='alternativa4']:checked").val(),
                pregunta5: $("input:radio[name='alternativa5']:checked").val(),
                pregunta6: $("input:radio[name='alternativa6']:checked").val(),
                pregunta7: $("input:radio[name='alternativa7']:checked").val(),
                pregunta8: $("input:radio[name='alternativa8']:checked").val(),
                pregunta9: $("input:radio[name='alternativa9']:checked").val(),
                pregunta10: $("input:radio[name='alternativa10']:checked").val(),
                pregunta11: $("input:radio[name='alternativa11']:checked").val(),
                pregunta12: $("input:radio[name='alternativa12']:checked").val(),
                pregunta13: $("input:radio[name='alternativa13']:checked").val(),
                pregunta14: $("input:radio[name='alternativa14']:checked").val(),
                pregunta15: $("input:radio[name='alternativa15']:checked").val(),
                
                pregunta16: $("input:radio[name='alternativa16']:checked").val(),
                pregunta17: $("input:radio[name='alternativa17']:checked").val(),
                pregunta18: $("input:radio[name='alternativa18']:checked").val(),
                pregunta19: $("input:radio[name='alternativa19']:checked").val(),
                pregunta20: $("input:radio[name='alternativa20']:checked").val(),
                pregunta21: $("input:radio[name='alternativa21']:checked").val(),
                pregunta22: $("input:radio[name='alternativa22']:checked").val(),
                pregunta23: $("input:radio[name='alternativa23']:checked").val(),
                pregunta24: $("input:radio[name='alternativa24']:checked").val(),
                pregunta25: $("input:radio[name='alternativa25']:checked").val(),
                pregunta26: $("input:radio[name='alternativa26']:checked").val(),
                pregunta27: $("input:radio[name='alternativa27']:checked").val(),
                pregunta28: $("input:radio[name='alternativa28']:checked").val(),
                pregunta29: $("input:radio[name='alternativa29']:checked").val(),
                pregunta30: $("input:radio[name='alternativa30']:checked").val(),
                
                pregunta31: $("input:radio[name='alternativa31']:checked").val(),
                pregunta32: $("input:radio[name='alternativa32']:checked").val(),
                pregunta33: $("input:radio[name='alternativa33']:checked").val(),
                pregunta34: $("input:radio[name='alternativa34']:checked").val(),
                pregunta35: $("input:radio[name='alternativa35']:checked").val(),
                pregunta36: $("input:radio[name='alternativa36']:checked").val(),
                pregunta37: $("input:radio[name='alternativa37']:checked").val(),
                pregunta38: $("input:radio[name='alternativa38']:checked").val(),
                pregunta39: $("input:radio[name='alternativa39']:checked").val(),
                pregunta40: $("input:radio[name='alternativa40']:checked").val(),
                pregunta41: $("input:radio[name='alternativa41']:checked").val(),
                pregunta42: $("input:radio[name='alternativa42']:checked").val(),
                pregunta43: $("input:radio[name='alternativa43']:checked").val(),
                pregunta44: $("input:radio[name='alternativa44']:checked").val(),
                pregunta45: $("input:radio[name='alternativa45']:checked").val(),
                
                pregunta46: $("input:radio[name='alternativa46']:checked").val(),
                pregunta47: $("input:radio[name='alternativa47']:checked").val(),
                pregunta48: $("input:radio[name='alternativa48']:checked").val(),
                pregunta49: $("input:radio[name='alternativa49']:checked").val(),
                pregunta50: $("input:radio[name='alternativa50']:checked").val(),
                pregunta51: $("input:radio[name='alternativa51']:checked").val(),
                pregunta52: $("input:radio[name='alternativa52']:checked").val(),
                pregunta53: $("input:radio[name='alternativa53']:checked").val(),
                pregunta54: $("input:radio[name='alternativa54']:checked").val(),
                pregunta55: $("input:radio[name='alternativa55']:checked").val(),
                pregunta56: $("input:radio[name='alternativa56']:checked").val(),
                pregunta57: $("input:radio[name='alternativa57']:checked").val(),
                pregunta58: $("input:radio[name='alternativa58']:checked").val(),
                pregunta59: $("input:radio[name='alternativa59']:checked").val(),
                pregunta60: $("input:radio[name='alternativa60']:checked").val(),
                usuario: $("#usuario").val()
                
            }
        }).done(function(res){
            if(res && res === "ok"){
                
                // Vaciar el LocalStorage
                for(var i=0; i < 60; i++){
                    if(localStorage.getItem("alternativa"+(i+1)) !== null){
                        localStorage.removeItem("alternativa"+(i+1));
                    }
                }
                
                swal({
                        title: "Test Guardado",
		      	text: "Se ha guardado el Test de manera correcta",
		      	type: "success",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then(function(result) {
		        
		        if (result.value) {

                            window.location = "tests";

		       }

		});
            }
        });
    }
};

$(".alternativa1").on("click",function(){ localStorage.setItem("alternativa1",$(this).val()); });
$(".alternativa2").on("click",function(){ localStorage.setItem("alternativa2",$(this).val()); });
$(".alternativa3").on("click",function(){ localStorage.setItem("alternativa3",$(this).val()); });
$(".alternativa4").on("click",function(){ localStorage.setItem("alternativa4",$(this).val()); });

$(".alternativa5").on("click",function(){ localStorage.setItem("alternativa5",$(this).val()); });
$(".alternativa6").on("click",function(){ localStorage.setItem("alternativa6",$(this).val()); });
$(".alternativa7").on("click",function(){ localStorage.setItem("alternativa7",$(this).val()); });
$(".alternativa8").on("click",function(){ localStorage.setItem("alternativa8",$(this).val()); });

$(".alternativa9").on("click",function(){ localStorage.setItem("alternativa9",$(this).val()); });
$(".alternativa10").on("click",function(){ localStorage.setItem("alternativa10",$(this).val()); });
$(".alternativa11").on("click",function(){ localStorage.setItem("alternativa11",$(this).val()); });
$(".alternativa12").on("click",function(){ localStorage.setItem("alternativa12",$(this).val()); });

$(".alternativa13").on("click",function(){ localStorage.setItem("alternativa13",$(this).val()); });
$(".alternativa14").on("click",function(){ localStorage.setItem("alternativa14",$(this).val()); });
$(".alternativa15").on("click",function(){ localStorage.setItem("alternativa15",$(this).val()); });


$(".alternativa16").on("click",function(){ localStorage.setItem("alternativa16",$(this).val()); });
$(".alternativa17").on("click",function(){ localStorage.setItem("alternativa17",$(this).val()); });
$(".alternativa18").on("click",function(){ localStorage.setItem("alternativa18",$(this).val()); });
$(".alternativa19").on("click",function(){ localStorage.setItem("alternativa19",$(this).val()); });

$(".alternativa20").on("click",function(){ localStorage.setItem("alternativa20",$(this).val()); });
$(".alternativa21").on("click",function(){ localStorage.setItem("alternativa21",$(this).val()); });
$(".alternativa22").on("click",function(){ localStorage.setItem("alternativa22",$(this).val()); });
$(".alternativa23").on("click",function(){ localStorage.setItem("alternativa23",$(this).val()); });

$(".alternativa24").on("click",function(){ localStorage.setItem("alternativa24",$(this).val()); });
$(".alternativa25").on("click",function(){ localStorage.setItem("alternativa25",$(this).val()); });
$(".alternativa26").on("click",function(){ localStorage.setItem("alternativa26",$(this).val()); });
$(".alternativa27").on("click",function(){ localStorage.setItem("alternativa27",$(this).val()); });

$(".alternativa28").on("click",function(){ localStorage.setItem("alternativa28",$(this).val()); });
$(".alternativa29").on("click",function(){ localStorage.setItem("alternativa29",$(this).val()); });
$(".alternativa30").on("click",function(){ localStorage.setItem("alternativa30",$(this).val()); });

$(".alternativa31").on("click",function(){ localStorage.setItem("alternativa31",$(this).val()); });
$(".alternativa32").on("click",function(){ localStorage.setItem("alternativa32",$(this).val()); });
$(".alternativa33").on("click",function(){ localStorage.setItem("alternativa33",$(this).val()); });
$(".alternativa34").on("click",function(){ localStorage.setItem("alternativa34",$(this).val()); });

$(".alternativa35").on("click",function(){ localStorage.setItem("alternativa35",$(this).val()); });
$(".alternativa36").on("click",function(){ localStorage.setItem("alternativa36",$(this).val()); });
$(".alternativa37").on("click",function(){ localStorage.setItem("alternativa37",$(this).val()); });
$(".alternativa38").on("click",function(){ localStorage.setItem("alternativa38",$(this).val()); });

$(".alternativa39").on("click",function(){ localStorage.setItem("alternativa39",$(this).val()); });
$(".alternativa40").on("click",function(){ localStorage.setItem("alternativa40",$(this).val()); });
$(".alternativa41").on("click",function(){ localStorage.setItem("alternativa41",$(this).val()); });
$(".alternativa42").on("click",function(){ localStorage.setItem("alternativa42",$(this).val()); });

$(".alternativa43").on("click",function(){ localStorage.setItem("alternativa43",$(this).val()); });
$(".alternativa44").on("click",function(){ localStorage.setItem("alternativa44",$(this).val()); });
$(".alternativa45").on("click",function(){ localStorage.setItem("alternativa45",$(this).val()); });

$(".alternativa46").on("click",function(){ localStorage.setItem("alternativa46",$(this).val()); });
$(".alternativa47").on("click",function(){ localStorage.setItem("alternativa47",$(this).val()); });
$(".alternativa48").on("click",function(){ localStorage.setItem("alternativa48",$(this).val()); });
$(".alternativa49").on("click",function(){ localStorage.setItem("alternativa49",$(this).val()); });

$(".alternativa50").on("click",function(){ localStorage.setItem("alternativa50",$(this).val()); });
$(".alternativa51").on("click",function(){ localStorage.setItem("alternativa51",$(this).val()); });
$(".alternativa52").on("click",function(){ localStorage.setItem("alternativa52",$(this).val()); });
$(".alternativa53").on("click",function(){ localStorage.setItem("alternativa53",$(this).val()); });

$(".alternativa54").on("click",function(){ localStorage.setItem("alternativa54",$(this).val()); });
$(".alternativa55").on("click",function(){ localStorage.setItem("alternativa55",$(this).val()); });
$(".alternativa56").on("click",function(){ localStorage.setItem("alternativa56",$(this).val()); });
$(".alternativa57").on("click",function(){ localStorage.setItem("alternativa57",$(this).val()); });

$(".alternativa58").on("click",function(){ localStorage.setItem("alternativa58",$(this).val()); });
$(".alternativa59").on("click",function(){ localStorage.setItem("alternativa59",$(this).val()); });
$(".alternativa60").on("click",function(){ localStorage.setItem("alternativa60",$(this).val()); });
    
    

});