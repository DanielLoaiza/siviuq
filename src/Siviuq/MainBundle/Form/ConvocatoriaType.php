<?php

namespace Siviuq\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConvocatoriaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('fechaInicia','date',array(
    'widget' => 'single_text',
    'format' => 'yyyy-MM-dd'))
            ->add('fechaFin','date',array(
    'widget' => 'single_text',
    'format' => 'yyyy-MM-dd'))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Siviuq\MainBundle\Entity\Convocatoria'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siviuq_mainbundle_convocatoria';
    }
}
