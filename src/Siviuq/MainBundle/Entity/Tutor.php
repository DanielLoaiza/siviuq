<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tutor
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tutor
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
     * @ORM\Column(name="documento", type="string", length=12)
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20)
     */
    private $nombre;


    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     */
    private $categoriaId;

    /**
     * @var integer
     *
     * @ORM\ManyToMany(targetEntity="GruposInvestigacion",mappedBy="tutores")
     */
    private $grupoInvestigacionId;

    /**
     * @var integer
     *
     * @ManyToMany(targetEntity="Proyectos",mappedBy="$tutores")
     */
    private $proyectoInvestigacionId;
	
    
    public function __construct()
    {
    	$this->proyectoInvestigacionId=new ArrayCollection();
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
	public function getDocumento() {
		return $this->documento;
	}
	
	/**
	 *
	 * @param string $documento        	
	 */
	public function setDocumento(string $documento) {
		$this->documento = $documento;
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
	 * @return the integer
	 */
	public function getCategoriaId() {
		return $this->categoriaId;
	}
	
	/**
	 *
	 * @param
	 *        	$categoriaId
	 */
	public function setCategoriaId($categoriaId) {
		$this->categoriaId = $categoriaId;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getGrupoInvestigacionId() {
		return $this->grupoInvestigacionId;
	}
	
	/**
	 *
	 * @param
	 *        	$grupoInvestigacionId
	 */
	public function setGrupoInvestigacionId($grupoInvestigacionId) {
		$this->grupoInvestigacionId = $grupoInvestigacionId;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getProyectoInvestigacionId() {
		return $this->proyectoInvestigacionId;
	}
	
	/**
	 *
	 * @param
	 *        	$proyectoInvestigacionId
	 */
	public function setProyectoInvestigacionId($proyectoInvestigacionId) {
		$this->proyectoInvestigacionId = $proyectoInvestigacionId;
		return $this;
	}
	
    
    
}
