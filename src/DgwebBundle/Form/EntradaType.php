<?php

namespace DgwebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use DgwebBundle\Form\FotoblogType;

class EntradaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', 'text', array(
                'required' => false,
                'attr'=>array('class'=>'tituloEntrada')
            ))
            ->add('escritapor', 'text', array( 'label' => 'Escrita por',
                'required' => false,
                'attr'=>array('class'=>'escritaporEntrada')
            ))
            //->add('fecha')
            ->add('contenido', 'textarea',array(
                  'required' => false,
                  'attr' => array(
                        'class' => 'tinymce',
                        'data-theme' => 'bbcode' // Skip it if you want to use default theme
                    ))
            )
            ->add('idimagen', new FotoblogType(), array(
                'label' => ' '
            ))
            ->add('idcategoriablog','entity', array(
                'label' => 'Elija una categoria', 'required' => false,'empty_value'=>'Seleccione categoria...',
                'class'=>'DgwebBundle:Categoriablog'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DgwebBundle\Entity\Entrada'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dgwebbundle_entrada';
    }
}
