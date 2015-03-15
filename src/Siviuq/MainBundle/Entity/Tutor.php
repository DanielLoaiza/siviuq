<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tutor
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tutor
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
     * @ORM\Column(name="documento", type="string", length=12)
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="genero", type="smallint")
     */
    private $genero;

    /**
     * @var integer
     *
     * @ORM\Column(name="categoria_id", type="integer")
     */
    private $categoriaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="grupo_investigacion_id", type="integer")
     */
    private $grupoInvestigacionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="proyecto_investigacion_id", type="integer")
     */
    private $proyectoInvestigacionId;


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
     * Set documento
     *
     * @param string $documento
     * @return Tutor
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Tutor
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
     * Set genero
     *
     * @param integer $genero
     * @return Tutor
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return integer 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set categoriaId
     *
     * @param integer $categoriaId
     * @return Tutor
     */
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;

        return $this;
    }

    /**
     * Get categoriaId
     *
     * @return integer 
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    /**
     * Set grupoInvestigacionId
     *
     * @param integer $grupoInvestigacionId
     * @return Tutor
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
     * Set proyectoInvestigacionId
     *
     * @param integer $proyectoInvestigacionId
     * @return Tutor
     */
    public function setProyectoInvestigacionId($proyectoInvestigacionId)
    {
        $this->proyectoInvestigacionId = $proyectoInvestigacionId;

        return $this;
    }

    /**
     * Get proyectoInvestigacionId
     *
     * @return integer 
     */
    public function getProyectoInvestigacionId()
    {
        return $this->proyectoInvestigacionId;
    }
}
