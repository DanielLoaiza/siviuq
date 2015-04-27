<?php

namespace Siviuq\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('tipo')
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
