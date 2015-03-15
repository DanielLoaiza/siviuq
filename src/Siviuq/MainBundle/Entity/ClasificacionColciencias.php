<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ClasificacionColciencias
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ClasificacionColciencias
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
     * @ORM\Column(name="nombre", type="string", length=20)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="GruposInvestigacion",mappedBy="clasificacionColciencias")
     */
    private $gruposId;

	
    public function __construct()
    {
    	$this->gruposId= new ArrayCollection();
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
	public function getGruposId() {
		return $this->gruposId;
	}
	public function setGruposId($gruposId) {
		$this->gruposId = $gruposId;
		return $this;
	}
	
    
    
}
