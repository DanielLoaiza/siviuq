<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * LineasInvestigacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class LineasInvestigacion
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
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;
    
    /**
     * 
     * @ORM\ManyToMany(targetEntity="GruposInvestigacion" , mappedBy="lineaInvestigacion")
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
	public function setNombre($nombre) {
		$this->nombre = $nombre;
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
	
	public function __toString()
	{
		return $this->nombre;
	}
	
    
    

}
