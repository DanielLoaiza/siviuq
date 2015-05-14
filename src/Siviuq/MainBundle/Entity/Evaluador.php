<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluador
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Evaluador
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
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=100)
     */
    private $correo;
	
    /**
     * 
     * @var String
     * @ORM\Column(name="area",type="string",length=100)
     */
    private $area;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Evaluador
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Evaluador
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }
	
	/**
	 *
	 * @return the String
	 */
	public function getArea() {
		return $this->area;
	}
	
	/**
	 *
	 * @param String $area        	
	 */
	public function setArea($area) {
		$this->area = $area;
		return $this;
	}
	
	public function __toString()
	{
		return $this->nombre;
	}
	
    
    
}
