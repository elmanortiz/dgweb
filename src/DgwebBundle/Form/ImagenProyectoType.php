<?php

namespace DgwebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImagenProyectoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('imagen')
            //->add('proyecto')
                
             ->add('file',null, array('label'=>'Imagen','required'=>false,
                    'attr'=>array('class'=>'imagenProyecto'
                        
                    )))     
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DgwebBundle\Entity\ImagenProyecto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dgwebbundle_imagenproyecto';
    }
}
