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
                    'attr'=>array('class'=>'tituloProyecto')))
            ->add('contenido','textarea', array('label'=>'Contenido','required'=>false,
                    'attr'=>array('class'=>'contenidoProyecto')))
            ->add('idCategoriaport',null, array('label'=>'Categoria','required'=>false,'empty_value'=>'Seleccione Categoria...',
                    'attr'=>array('class'=>'categoriaProyecto')))
                
           ->add('placas','collection',array(
                'type' => new ImagenProyectoType(),
                'label'=>' ',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                ))              
           
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
