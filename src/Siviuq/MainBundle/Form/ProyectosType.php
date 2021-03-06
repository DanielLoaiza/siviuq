<?php

namespace Siviuq\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ProyectosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroProyecto')
            ->add('titulo')
            ->add('gastoEfectivo', 'integer', array(
        'label' => 'Gasto Efectivo', 
        'data' => 0, // default value
        'precision' => 0, // disallow floats
        'constraints' => array(
            new Assert\NotBlank(), 
            new Assert\Type('integer'), 
            new Assert\Regex(array(
                'pattern' => '/^[0-9]\d*$/',
                'message' => 'Por favor ingresa valores positivos'
                )
            )
           
        )
    ))
            ->add('duracion', 'integer', array(
        'label' => 'Duración', 
        'data' => 0, // default value
        'precision' => 0, // disallow floats
        'constraints' => array(
            new Assert\NotBlank(), 
            new Assert\Type('integer'), 
            new Assert\Regex(array(
                'pattern' => '/^[0-9]\d*$/',
                'message' => 'Por favor ingresa valores positivos'
                )
            )
           
        )
    ))
            ->add('fechaInicio','date',array(
    'widget' => 'single_text',
    'format' => 'yyyy-MM-dd'))
            ->add('fechaFin','date',array(
    'widget' => 'single_text',
    'format' => 'yyyy-MM-dd'))
            ->add('horasInvestigadorPrincipal', 'integer', array(
        'label' => 'Tipo', 
        'data' => 0, // default value
        'precision' => 0, // disallow floats
        'constraints' => array(
            new Assert\NotBlank(), 
            new Assert\Type('integer'), 
            new Assert\Regex(array(
                'pattern' => '/^[0-9]\d*$/',
                'message' => 'Por favor ingresa valores positivos'
                )
            )
           
        )
    ))
            ->add('horasCoInvestigadores', 'integer', array(
        'label' => 'Tipo', 
        'data' => 0, // default value
        'precision' => 0, // disallow floats
        'constraints' => array(
            new Assert\NotBlank(), 
            new Assert\Type('integer'), 
            new Assert\Regex(array(
                'pattern' => '/^[0-9]\d*$/',
                'message' => 'Por favor ingresa valores positivos'
                )
            )
           
        )
    ))
            ->add('numeroConvocatoria')
            ->add('grupoInvestigacionId')
            ->add('lineaInvestigacion')
            ->add('investigadorPrincipal')
            ->add('investigadores')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Siviuq\MainBundle\Entity\Proyectos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siviuq_mainbundle_proyectos';
    }
}
