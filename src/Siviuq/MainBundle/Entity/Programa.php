<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Programa
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Programa
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
     * @ORM\Column(name="nombre", type="string", length=80)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ManyToOne(targetEntity="Facultad",inversedBy="programas")
     */
    private $facultadId;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="GruposInvestigacion",mappedBy="programaId")
     */
    private $grupos_investigacion;

	
    public function __construct()
    {
    	$this->grupos_investigacion=new ArrayCollection();
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
	 * @return the integer
	 */
	public function getFacultadId() {
		return $this->facultadId;
	}
	
	/**
	 *
	 * @param
	 *        	$facultadId
	 */
	public function setFacultadId($facultadId) {
		$this->facultadId = $facultadId;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getGruposInvestigacion() {
		return $this->grupos_investigacion;
	}
	
	/**
	 *
	 * @param unknown_type $grupos_investigacion        	
	 */
	public function setGruposInvestigacion($grupos_investigacion) {
		$this->grupos_investigacion = $grupos_investigacion;
		return $this;
	}
	
    
    

	
    
    
}
