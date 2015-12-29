
function validarEntrada(){
$('.tituloEntrada').
        attr('data-bvalidator', 'required,required');

$('.escritaporEntrada').
        attr('data-bvalidator', 'required,required');


$('.imagenblog').
        attr('data-bvalidator', 'extension[jpg:png],required');
	
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
	
 }	
	