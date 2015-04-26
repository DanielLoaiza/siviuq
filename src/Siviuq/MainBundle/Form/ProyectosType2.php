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
// 		$builder->add('facultad', 'choice', array(
//     'choices' => array($this->facultades
//     ),
//     'required'    => true,
// ));
		$builder->add('facultad', 'entity', array(
				'class' => 'SiviuqMainBundle:Facultad',
				'property' => 'nombre',
		))->add('buscar','submit');
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