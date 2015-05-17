<?php

namespace Siviuq\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GruposInvestigacionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombre')
            ->add('fechaConformacion','date',array(
    'widget' => 'single_text',
    'format' => 'yyyy-MM-dd'))
            ->add('programaId')
            ->add('clasificacionColciencias')
            ->add('lineaInvestigacion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Siviuq\MainBundle\Entity\GruposInvestigacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'siviuq_mainbundle_gruposinvestigacion';
    }
}
