<?php

namespace Siviuq\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('gastoEfectivo')
            ->add('duracion')
            ->add('fechaInicio','date',array(
    'widget' => 'single_text',
    'format' => 'yyyy-MM-dd'))
            ->add('fechaFin','date',array(
    'widget' => 'single_text',
    'format' => 'yyyy-MM-dd'))
            ->add('horasInvestigadorPrincipal')
            ->add('horasCoinvestigadores')
            ->add('estadoInforme')
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
