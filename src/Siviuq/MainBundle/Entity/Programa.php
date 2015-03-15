<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programa
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Programa
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
     * @ORM\Column(name="nombre", type="string", length=80)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="facultad_id", type="integer")
     */
    private $facultadId;


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
     * @return Programa
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
     * Set facultadId
     *
     * @param integer $facultadId
     * @return Programa
     */
    public function setFacultadId($facultadId)
    {
        $this->facultadId = $facultadId;

        return $this;
    }

    /**
     * Get facultadId
     *
     * @return integer 
     */
    public function getFacultadId()
    {
        return $this->facultadId;
    }
}
