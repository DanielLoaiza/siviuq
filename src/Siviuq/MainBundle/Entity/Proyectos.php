<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyectos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Proyectos
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
     * @ORM\Column(name="titulo", type="string", length=200)
     */
    private $titulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="gasto_efectivo", type="integer")
     */
    private $gastoEfectivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion", type="smallint")
     */
    private $duracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicio", type="date")
     */
    private $fechaInicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="semilleros_id", type="integer")
     */
    private $semillerosId;


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
     * Set titulo
     *
     * @param string $titulo
     * @return Proyectos
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set gastoEfectivo
     *
     * @param integer $gastoEfectivo
     * @return Proyectos
     */
    public function setGastoEfectivo($gastoEfectivo)
    {
        $this->gastoEfectivo = $gastoEfectivo;

        return $this;
    }

    /**
     * Get gastoEfectivo
     *
     * @return integer 
     */
    public function getGastoEfectivo()
    {
        return $this->gastoEfectivo;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return Proyectos
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Proyectos
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set semillerosId
     *
     * @param integer $semillerosId
     * @return Proyectos
     */
    public function setSemillerosId($semillerosId)
    {
        $this->semillerosId = $semillerosId;

        return $this;
    }

    /**
     * Get semillerosId
     *
     * @return integer 
     */
    public function getSemillerosId()
    {
        return $this->semillerosId;
    }
}
