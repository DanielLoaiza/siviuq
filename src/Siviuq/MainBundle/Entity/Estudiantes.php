<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Estudiantes
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Estudiantes
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
     * @ORM\Column(name="nombre", type="string", length=35)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=100)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=120)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=12)
     */
    private $telefono;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="smallint")
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=12)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     */
    private $observaciones;

    /**
     * @var integer
     *
     * @ManyToOne(targetEntity="Programa")
     */
    private $programaAcademico;

    /**
     * @var integer
     *
     * @ORM\Column(name="semestre", type="integer")
     */
    private $semestre;

    /**
     * @var integer
     *
     * @ManyToMany(targetEntity="Proyectos",mappedBy="estudiantes")
     */
    private $proyectoInvestigacion;

    /**
     * @var integer
     *
     * @ManyToOne(targetEntity="Semillero",inversedBy="estudiantes")
     */
    private $semilleroFormacion;

    /**
     *  @OneToMany(targetEntity="RegistroEstudiante", mappedBy="$estudiantesId")
     */
    private $registroEstudiante;
	
    public function __construct()
    {
    	$this->proyectoInvestigacion=new ArrayCollection();
    	$this->registroEstudiante=new ArrayCollection();
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
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 *
	 * @param string $nombre        	
	 */
	public function setNombre(string $nombre) {
		$this->nombre = $nombre;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCorreo() {
		return $this->correo;
	}
	
	/**
	 *
	 * @param string $correo        	
	 */
	public function setCorreo(string $correo) {
		$this->correo = $correo;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getDireccion() {
		return $this->direccion;
	}
	
	/**
	 *
	 * @param string $direccion        	
	 */
	public function setDireccion(string $direccion) {
		$this->direccion = $direccion;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getTelefono() {
		return $this->telefono;
	}
	
	/**
	 *
	 * @param string $telefono        	
	 */
	public function setTelefono(string $telefono) {
		$this->telefono = $telefono;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getTipo() {
		return $this->tipo;
	}
	
	/**
	 *
	 * @param
	 *        	$tipo
	 */
	public function setTipo($tipo) {
		$this->tipo = $tipo;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCedula() {
		return $this->cedula;
	}
	
	/**
	 *
	 * @param string $cedula        	
	 */
	public function setCedula(string $cedula) {
		$this->cedula = $cedula;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getObservaciones() {
		return $this->observaciones;
	}
	
	/**
	 *
	 * @param string $observaciones        	
	 */
	public function setObservaciones(string $observaciones) {
		$this->observaciones = $observaciones;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getProgramaAcademico() {
		return $this->programaAcademico;
	}
	
	/**
	 *
	 * @param
	 *        	$programaAcademico
	 */
	public function setProgramaAcademico($programaAcademico) {
		$this->programaAcademico = $programaAcademico;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getSemestre() {
		return $this->semestre;
	}
	
	/**
	 *
	 * @param
	 *        	$semestre
	 */
	public function setSemestre($semestre) {
		$this->semestre = $semestre;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getProyectoInvestigacion() {
		return $this->proyectoInvestigacion;
	}
	
	/**
	 *
	 * @param
	 *        	$proyectoInvestigacion
	 */
	public function setProyectoInvestigacion($proyectoInvestigacion) {
		$this->proyectoInvestigacion = $proyectoInvestigacion;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getSemilleroFormacion() {
		return $this->semilleroFormacion;
	}
	
	/**
	 *
	 * @param
	 *        	$semilleroFormacion
	 */
	public function setSemilleroFormacion($semilleroFormacion) {
		$this->semilleroFormacion = $semilleroFormacion;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getRegistroEstudiante() {
		return $this->registroEstudiante;
	}
	
	/**
	 *
	 * @param unknown_type $registroEstudiante        	
	 */
	public function setRegistroEstudiante($registroEstudiante) {
		$this->registroEstudiante = $registroEstudiante;
		return $this;
	}
	
    
    
    
	
}
