
function validarEditProyecto(){
$('.tituloProyecto').
        attr('data-bvalidator', 'required,required');

$('.categoriaProyecto').
        attr('data-bvalidator', 'required,required');

$('.cfondo').
        attr('data-bvalidator', 'required,required');

$('.ctitulo').
        attr('data-bvalidator', 'required,required');

$('.cpx').
        attr('data-bvalidator', 'required,required');


    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
	
 }	
	