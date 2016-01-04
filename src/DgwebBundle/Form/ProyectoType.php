<?php

namespace DgwebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProyectoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo','text', array('label'=>'Titulo','required'=>false,
                    'attr'=>array('class'=>'form-control tituloProyecto')))
            ->add('contenido','textarea', array('label'=>'Contenido','required'=>false,
                    'attr'=>array('class' => 'tinymce',
                        'data-theme' => 'bbcode'))
                    )
            ->add('idCategoriaport',null, array('label'=>'Elija una categoria','required'=>false,'empty_value'=>'Seleccione Categoria...',
                    'attr'=>array('class'=>'categoriaProyecto')))
                
           ->add('placas','collection',array(
                'type' => new ImagenProyectoType(),
                'label'=>' ',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                ))   
                
           ->add('colorFondo','text', array('label'=>'Color de fondo','required'=>false,
                    'attr'=>array('class'=>'cfondo')))
           ->add('colorTitulo','text', array('label'=>'Color de titulo','required'=>false,
                    'attr'=>array('class'=>'ctitulo')))
           ->add('cantidadPx','text', array('label'=>'Cantidad de px','required'=>false,
                    'attr'=>array('class'=>'cpx'))) 
                        
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DgwebBundle\Entity\Proyecto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dgwebbundle_proyecto';
    }
}
