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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="grupo_investigacion_id", type="integer")
     */
    private $grupoInvestigacionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="estudiantes_id", type="integer")
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set grupoInvestigacionId
     *
     * @param integer $grupoInvestigacionId
     * @return RegistroEstudiante
     */
    public function setGrupoInvestigacionId($grupoInvestigacionId)
    {
        $this->grupoInvestigacionId = $grupoInvestigacionId;

        return $this;
    }

    /**
     * Get grupoInvestigacionId
     *
     * @return integer 
     */
    public function getGrupoInvestigacionId()
    {
        return $this->grupoInvestigacionId;
    }

    /**
     * Set estudiantesId
     *
     * @param integer $estudiantesId
     * @return RegistroEstudiante
     */
    public function setEstudiantesId($estudiantesId)
    {
        $this->estudiantesId = $estudiantesId;

        return $this;
    }

    /**
     * Get estudiantesId
     *
     * @return integer 
     */
    public function getEstudiantesId()
    {
        return $this->estudiantesId;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return RegistroEstudiante
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set fechaRetiro
     *
     * @param \DateTime $fechaRetiro
     * @return RegistroEstudiante
     */
    public function setFechaRetiro($fechaRetiro)
    {
        $this->fechaRetiro = $fechaRetiro;

        return $this;
    }

    /**
     * Get fechaRetiro
     *
     * @return \DateTime 
     */
    public function getFechaRetiro()
    {
        return $this->fechaRetiro;
    }
}
