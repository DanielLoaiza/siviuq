<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Proyectos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Proyectos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=200)
     */
    private $titulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="gasto_efectivo", type="integer")
     */
    private $gastoEfectivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion", type="smallint")
     */
    private $duracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicio", type="date")
     */
    private $fechaInicio;

     /**
     * 
     * @ManyToMany(targetEntity="Semillero", inversedBy="$proyectoInvestigacionId")
     */
    private $semillerosId;
    
    /**
     * 
     * @ManyToMany(targetEntity="Tutor", inversedBy="$proyectoInvestigacionId")
     */
    private $tutores;

	/**
	 * @ManyToMany(targetEntity="Estudiantes",inversedBy="proyectoInvestigacion")
	 */
    private $estudiantes;
    
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Facultad"))
     */
    private $facultad;
    
    /**
     * @var integer
     * @ORM\ManyToOne(targetEntity="Programa"))
     */
    private $programa;
    
    public function __construct()
    {
    	$this->tutores=new ArrayCollection();
    	$this->semillerosId=new ArrayCollection();
    	$this->estudiantes=new ArrayCollection();
    }
	
	/**
	 *
	 * @return the integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * @param
	 *        	$id
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getTitulo() {
		return $this->titulo;
	}
	
	/**
	 *
	 * @param string $titulo        	
	 */
	public function setTitulo(string $titulo) {
		$this->titulo = $titulo;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getGastoEfectivo() {
		return $this->gastoEfectivo;
	}
	
	/**
	 *
	 * @param
	 *        	$gastoEfectivo
	 */
	public function setGastoEfectivo($gastoEfectivo) {
		$this->gastoEfectivo = $gastoEfectivo;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getDuracion() {
		return $this->duracion;
	}
	
	/**
	 *
	 * @param
	 *        	$duracion
	 */
	public function setDuracion($duracion) {
		$this->duracion = $duracion;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getFechaInicio() {
		return $this->fechaInicio;
	}
	
	/**
	 *
	 * @param \DateTime $fechaInicio        	
	 */
	public function setFechaInicio(\DateTime $fechaInicio) {
		$this->fechaInicio = $fechaInicio;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getSemillerosId() {
		return $this->semillerosId;
	}
	
	/**
	 *
	 * @param unknown_type $semillerosId        	
	 */
	public function setSemillerosId($semillerosId) {
		$this->semillerosId = $semillerosId;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getTutores() {
		return $this->tutores;
	}
	
	/**
	 *
	 * @param unknown_type $tutores        	
	 */
	public function setTutores($tutores) {
		$this->tutores = $tutores;
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
	public function getFacultad() {
		return $this->facultad;
	}
	
	/**
	 *
	 * @param unknown_type $facultad
	 */
	public function setFacultad($facultad) {
		$this->facultad = $facultad;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getPrograma() {
		return $this->programa;
	}
	
	/**
	 *
	 * @param unknown_type $programa
	 */
	public function setPrograma($programa) {
		$this->programa = $programa;
		return $this;
	}
	
	
    
    

}
