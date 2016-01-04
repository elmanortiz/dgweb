
function validarProyecto(){
$('.tituloProyecto').
        attr('data-bvalidator', 'required,required');

$('.tinymce').
        attr('data-bvalidator', 'required,required');

$('.categoriaProyecto').
        attr('data-bvalidator', 'required,required');

$('.cfondo').
        attr('data-bvalidator', 'required,required');

$('.ctitulo').
        attr('data-bvalidator', 'required,required');

$('.cpx').
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
	