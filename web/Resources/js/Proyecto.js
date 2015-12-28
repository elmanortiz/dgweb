
function validarProyecto(){
$('.tituloProyecto').
        attr('data-bvalidator', 'required,required');

$('.contenidoProyecto').
        attr('data-bvalidator', 'required,required');

$('.categoriaProyecto').
        attr('data-bvalidator', 'required,required');

$('.imagenProyecto').
        attr('data-bvalidator', 'extension[jpg:png],required');
	
 
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
	
 }	
	