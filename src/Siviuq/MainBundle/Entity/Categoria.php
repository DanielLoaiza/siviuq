<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categoria
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
     * @ORM\Column(name="nombre", type="string", length=30)
     */
    private $nombre;

	/**
	 * @OneToMany(targetEntity="Tutor",mappedBy="categoriaId")
	 */
    private $tutores;
    /**
     * Get id
     *
     * @return integer 
     */
    
    public function __construct()
    {
    	$this->tutores=new ArrayCollection();
    }
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function setNombre(string $nombre) {
		$this->nombre = $nombre;
		return $this;
	}
	public function getTutores() {
		return $this->tutores;
	}
	public function setTutores($tutores) {
		$this->tutores = $tutores;
		return $this;
	}
	
    
    

	
    
    
}
