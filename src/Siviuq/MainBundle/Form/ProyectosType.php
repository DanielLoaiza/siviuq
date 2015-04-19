<?php
namespace Siviuq\MainBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProyectosType extends AbstractType
{
	
	private $facultades;
	
	public function __construct($facultades)
	{
		
		$this->facultades=$facultades;
	}
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	
	public function buildForm(FormBuilderInterface $builder,array $options)
	{
		$builder->add('Facultad', 'choice', array(
    'choices' => array(
       $this->facultades
    ),
    'required'    => true,
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
	public function getFacultades() {
		return $this->facultades;
	}
	public function setFacultades($facultades) {
		$this->facultades = $facultades;
		return $this;
	}
	
	
	
}