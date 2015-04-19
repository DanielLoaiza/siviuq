<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroEstudiante
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RegistroEstudiante
{

    /**
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="GruposInvestigacion",inversedBy="registroEstudiante")
     */
    private $gruposInvestigacionId;

    /**
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Investigador",inversedBy="registroEstudiante")
     */
    private $estudiantesId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date")
     */
    private $fechaIngreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_retiro", type="date")
     */
    private $fechaRetiro;
	
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
	public function getEstudiantesId() {
		return $this->estudiantesId;
	}
	
	/**
	 *
	 * @param unknown_type $estudiantesId        	
	 */
	public function setEstudiantesId($estudiantesId) {
		$this->estudiantesId = $estudiantesId;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getFechaIngreso() {
		return $this->fechaIngreso;
	}
	
	/**
	 *
	 * @param \DateTime $fechaIngreso        	
	 */
	public function setFechaIngreso(\DateTime $fechaIngreso) {
		$this->fechaIngreso = $fechaIngreso;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getFechaRetiro() {
		return $this->fechaRetiro;
	}
	
	/**
	 *
	 * @param \DateTime $fechaRetiro        	
	 */
	public function setFechaRetiro(\DateTime $fechaRetiro) {
		$this->fechaRetiro = $fechaRetiro;
		return $this;
	}
	
    
    

}
