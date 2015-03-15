<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * GruposInvestigacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GruposInvestigacion
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
     * @ORM\Column(name="codigo", type="string", length=50)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_conformacion", type="date")
     */
    private $fechaConformacion;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Programa", inversedBy="grupos_investigacion")
     */
    private $programaId;
    
    /**
     * @ManyToMany(targetEntity="Tutor",inversedBy="grupos")
     */
    private $tutores;
	
    /**
     * 
     * @OneToMany(targetEntity="RegistroEstudiante",mappedBy="grupoInvestigacionId")
     */
    private $registroEstudiante;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Clasificacion_colciencias",inversedBy="gruposId")
     */
    private $clasificacionColciencias;
	/**
	 * 
	 * @ORM\ManyToMany(targetEntity="Lineas_investigacion",inversedBy="grupos_investigacion")
	 */
    private $lineaInvestigacion;
    
    public function __construct()
    {
    	$this->tutores=new ArrayCollection();
    	$this->registroEstudiante=new ArrayCollection();
    	$this->lineaInvestigacion=new ArrayCollection();
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
	public function getCodigo() {
		return $this->codigo;
	}
	
	/**
	 *
	 * @param string $codigo        	
	 */
	public function setCodigo(string $codigo) {
		$this->codigo = $codigo;
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
	 * @return the DateTime
	 */
	public function getFechaConformacion() {
		return $this->fechaConformacion;
	}
	
	/**
	 *
	 * @param \DateTime $fechaConformacion        	
	 */
	public function setFechaConformacion(\DateTime $fechaConformacion) {
		$this->fechaConformacion = $fechaConformacion;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getProgramaId() {
		return $this->programaId;
	}
	
	/**
	 *
	 * @param
	 *        	$programaId
	 */
	public function setProgramaId($programaId) {
		$this->programaId = $programaId;
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
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getClasificacionColciencias() {
		return $this->clasificacionColciencias;
	}
	
	/**
	 *
	 * @param unknown_type $clasificacionColciencias        	
	 */
	public function setClasificacionColciencias($clasificacionColciencias) {
		$this->clasificacionColciencias = $clasificacionColciencias;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getLineaInvestigacion() {
		return $this->lineaInvestigacion;
	}
	
	/**
	 *
	 * @param unknown_type $lineaInvestigacion        	
	 */
	public function setLineaInvestigacion($lineaInvestigacion) {
		$this->lineaInvestigacion = $lineaInvestigacion;
		return $this;
	}
	
    
    

}
