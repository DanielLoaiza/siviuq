<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Semillero {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	/**
	 * @ORM\Column(type="integer")
	 */
	private $anio;
	/**
	 * @ORM\Column(type="float")
	 */
	private $nota;
	/**
	 * @ManyToMany(targetEntity="GruposInvestigacion", mappedBy="semilleros")
	 */
	private $grupos_Investigacion;
	/**
	 * @ORM\Column(type="string")
	 */
	private $nombre;
	
	/**
	 * @ORM\ManyToOne(targetEntity="LineasInvestigacion")
	 */
	private $linea_investigacion;
	
	/**
	 * 
	 * @ORM\OneToMany(targetEntity="Estudiantes",mappedBy="semilleroFormacion")
	 */
	private $estudiantes;
	
	/**
	 * @ManyToMany(targetEntity="Proyectos",mappedBy="semillerosId")
	 */
	private $proyectos;
	
	public function __construct()
	{
		$this->estudiantes=new ArrayCollection();
		$this->proyectos=new ArrayCollection();
		$this->grupos_Investigacion=new ArrayCollection();
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * @param unknown_type $id        	
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getAnio() {
		return $this->anio;
	}
	
	/**
	 *
	 * @param unknown_type $anio        	
	 */
	public function setAnio($anio) {
		$this->anio = $anio;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getNota() {
		return $this->nota;
	}
	
	/**
	 *
	 * @param unknown_type $nota        	
	 */
	public function setNota($nota) {
		$this->nota = $nota;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getGruposInvestigacion() {
		return $this->grupos_Investigacion;
	}
	
	/**
	 *
	 * @param unknown_type $grupos_Investigacion        	
	 */
	public function setGruposInvestigacion($grupos_Investigacion) {
		$this->grupos_Investigacion = $grupos_Investigacion;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 *
	 * @param unknown_type $nombre        	
	 */
	public function setNombre($nombre) {
		$this->nombre = $nombre;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getLineaInvestigacion() {
		return $this->linea_investigacion;
	}
	
	/**
	 *
	 * @param unknown_type $linea_investigacion        	
	 */
	public function setLineaInvestigacion($linea_investigacion) {
		$this->linea_investigacion = $linea_investigacion;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getEstudiantes() {
		return $this->estudiantes;
	}
	
	/**
	 *
	 * @param unknown_type $estudiantes        	
	 */
	public function setEstudiantes($estudiantes) {
		$this->estudiantes = $estudiantes;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getProyectos() {
		return $this->proyectos;
	}
	
	/**
	 *
	 * @param unknown_type $proyectos        	
	 */
	public function setProyectos($proyectos) {
		$this->proyectos = $proyectos;
		return $this;
	}
	
	
	
	
	
}