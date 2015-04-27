<?php
namespace Siviuq\MainBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProyectosType2 extends AbstractType
{
	
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	
	public function buildForm(FormBuilderInterface $builder,array $options)
	{
		$builder->add('titulo')
		->add('grupoInvestigacionId', 'entity', array(
				'class' => 'SiviuqMainBundle:GruposInvestigacion',
				'property' => 'nombre',))
		->add('lineaInvestigacion', 'entity', array(
				'class' => 'SiviuqMainBundle:LineasInvestigacion',
				'property' => 'nombre',))
				
		->add('investigadorPrincipal', 'entity', array(
				'class' => 'SiviuqMainBundle:Investigador',
				'property' => 'nombre',))
		
		->add('file', 'file', array(
				'label' => 'Propuesta en formato .pdf',
				'required' => true
		))
		
		->add('file2', 'file', array(
				'label' => 'Formato de cuadro presupuestal .xls',
				'required' => true
		));
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array('data_class'=>'Siviuq\MainBundle\Entity\Proyectos'));
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return 'siviuq_mainbundle_proyectos';
	}
}