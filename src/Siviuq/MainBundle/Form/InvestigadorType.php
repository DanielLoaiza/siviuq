<?php

namespace Siviuq\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class InvestigadorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('correo')
            ->add('direccion')
            ->add('telefono')
           ->add('tipo', 'integer', array(
        'label' => 'Tipo', 
        'data' => 0, // default value
        'precision' => 0, // disallow floats
        'constraints' => array(
            new Assert\NotBlank(), 
            new Assert\Type('integer'), 
            new Assert\Regex(array(
                'pattern' => '/^[0-9]\d*$/',
                'message' => 'Por favor ingresa 0 o 1'
                )
            ),
            new Assert\Length(array('max' => 2))
        )
    ))
            ->add('cedula')
            ->add('observaciones')
            ->add('programaAcademico')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Siviuq\MainBundle\Entity\Investigador'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siviuq_mainbundle_investigador';
    }
}
