<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GruposInvestigacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GruposInvestigacion
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
     * @ORM\Column(name="codigo", type="string", length=50)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacion_colciencias", type="string", length=10)
     */
    private $clasificacionColciencias;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_conformacion", type="date")
     */
    private $fechaConformacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="programa_id", type="integer")
     */
    private $programaId;


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
     * Set codigo
     *
     * @param string $codigo
     * @return GruposInvestigacion
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return GruposInvestigacion
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
     * Set clasificacionColciencias
     *
     * @param string $clasificacionColciencias
     * @return GruposInvestigacion
     */
    public function setClasificacionColciencias($clasificacionColciencias)
    {
        $this->clasificacionColciencias = $clasificacionColciencias;

        return $this;
    }

    /**
     * Get clasificacionColciencias
     *
     * @return string 
     */
    public function getClasificacionColciencias()
    {
        return $this->clasificacionColciencias;
    }

    /**
     * Set fechaConformacion
     *
     * @param \DateTime $fechaConformacion
     * @return GruposInvestigacion
     */
    public function setFechaConformacion($fechaConformacion)
    {
        $this->fechaConformacion = $fechaConformacion;

        return $this;
    }

    /**
     * Get fechaConformacion
     *
     * @return \DateTime 
     */
    public function getFechaConformacion()
    {
        return $this->fechaConformacion;
    }

    /**
     * Set programaId
     *
     * @param integer $programaId
     * @return GruposInvestigacion
     */
    public function setProgramaId($programaId)
    {
        $this->programaId = $programaId;

        return $this;
    }

    /**
     * Get programaId
     *
     * @return integer 
     */
    public function getProgramaId()
    {
        return $this->programaId;
    }
}
