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
     * @ORM\Column(name="numero_proyecto",type="string")
     */
    private $numeroProyecto;
    
    /**
     * @var string
     *
     * @ORM\Column(name="numero_convocatoria",type="string")
     */
    private $numeroConvocatoria;
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="date")
     */
    private $fechaFin;

     /**
     * 
     * @ManyToMany(targetEntity="Semillero", inversedBy="$proyectos")
     */
    private $semillerosId;
    
    /**
     * 
     * @ManyToOne(targetEntity="GruposInvestigacion")
     */
    private $grupoInvestigacionId;
    /**
     * 
     * @ManyToMany(targetEntity="Tutor", inversedBy="$proyectoInvestigacionId")
     */
    private $tutores;

	/**
	 * @ManyToMany(targetEntity="Investigador")
	 */
    private $investigadores;
    
    /**
     * @ManyToOne(targetEntity="LineasInvestigacion")
     */
    private $lineaInvestigacion;
    
    
    /**
     * @ManyToOne(targetEntity="Investigador")
     */
    private $investigadorPrincipal;
    
   /**
     * @var integer
     *
     * @ORM\Column(name="horasPrincipal", type="smallint")
     */
    private $horasInvestigadorPrincipal;
    
   /**
     * @var integer
     *
     * @ORM\Column(name="horasCoinvestigadores", type="smallint")
     */
    private $horasCoinvestigadores;
    
    /**
     * @var string
     *
     * @ORM\Column(name="estadoInforme", type="string", length=15)
     */
    private $estadoInforme;
    public function __construct()
    {
    	$this->tutores=new ArrayCollection();
    	$this->semillerosId=new ArrayCollection();
    	$this->investigadores=new ArrayCollection();
    	$this->grupoInvestigacionId=new ArrayCollection();
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
	public function getNumeroProyecto() {
		return $this->numeroProyecto;
	}
	
	/**
	 *
	 * @param string $numeroProyecto        	
	 */
	public function setNumeroProyecto( $numeroProyecto) {
		$this->numeroProyecto = $numeroProyecto;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getNumeroConvocatoria() {
		return $this->numeroConvocatoria;
	}
	
	/**
	 *
	 * @param string $numeroConvocatoria        	
	 */
	public function setNumeroConvocatoria( $numeroConvocatoria) {
		$this->numeroConvocatoria = $numeroConvocatoria;
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
	public function setTitulo( $titulo) {
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
	public function setFechaInicio( $fechaInicio) {
		$this->fechaInicio = $fechaInicio;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getFechaFin() {
		return $this->fechaFin;
	}
	
	/**
	 *
	 * @param \DateTime $fechaFin        	
	 */
	public function setFechaFin( $fechaFin) {
		$this->fechaFin = $fechaFin;
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
	public function getGrupoInvestigacionId() {
		return $this->grupoInvestigacionId;
	}
	
	/**
	 *
	 * @param unknown_type $grupoInvestigacionId        	
	 */
	public function setGrupoInvestigacionId($grupoInvestigacionId) {
		$this->grupoInvestigacionId = $grupoInvestigacionId;
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
	public function getInvestigadores() {
		return $this->investigadores;
	}
	
	/**
	 *
	 * @param unknown_type $investigadores        	
	 */
	public function setInvestigadores($investigadores) {
		$this->investigadores = $investigadores;
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
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getInvestigadorPrincipal() {
		return $this->investigadorPrincipal;
	}
	
	/**
	 *
	 * @param unknown_type $investigadorPrincipal        	
	 */
	public function setInvestigadorPrincipal($investigadorPrincipal) {
		$this->investigadorPrincipal = $investigadorPrincipal;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getHorasInvestigadorPrincipal() {
		return $this->horasInvestigadorPrincipal;
	}
	
	/**
	 *
	 * @param
	 *        	$horasInvestigadorPrincipal
	 */
	public function setHorasInvestigadorPrincipal($horasInvestigadorPrincipal) {
		$this->horasInvestigadorPrincipal = $horasInvestigadorPrincipal;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getHorasCoinvestigadores() {
		return $this->horasCoinvestigadores;
	}
	
	/**
	 *
	 * @param
	 *        	$horasCoinvestigadores
	 */
	public function setHorasCoinvestigadores($horasCoinvestigadores) {
		$this->horasCoinvestigadores = $horasCoinvestigadores;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getEstadoInforme() {
		return $this->estadoInforme;
	}
	
	/**
	 *
	 * @param string $estadoInforme        	
	 */
	public function setEstadoInforme( $estadoInforme) {
		$this->estadoInforme = $estadoInforme;
		return $this;
	}
	
    
}
