<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Facultad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Facultad
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
     * @ORM\OneToMany(targetEntity="Programa",mappedBy="facultadId")
     */
    private $programas;
	
    
    public function __construct()
    {
    	$this->programas=new ArrayCollection();
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
	 * @return the unknown_type
	 */
	public function getProgramas() {
		return $this->programas;
	}
	
	/**
	 *
	 * @param unknown_type $programas        	
	 */
	public function setProgramas($programas) {
		$this->programas = $programas;
		return $this;
	}
	
    
    
}
