<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiantes
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Estudiantes
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
     * @ORM\Column(name="nombre", type="string", length=35)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=100)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=120)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=12)
     */
    private $telefono;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="smallint")
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=12)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     */
    private $observaciones;

    /**
     * @var integer
     *
     * @ORM\Column(name="programa_academico", type="integer")
     */
    private $programaAcademico;

    /**
     * @var integer
     *
     * @ORM\Column(name="semestre", type="integer")
     */
    private $semestre;

    /**
     * @var integer
     *
     * @ORM\Column(name="proyecto_investigacion", type="integer")
     */
    private $proyectoInvestigacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="semillero_formacion", type="integer")
     */
    private $semilleroFormacion;


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
     * @return Estudiantes
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
     * @return Estudiantes
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
     * Set direccion
     *
     * @param string $direccion
     * @return Estudiantes
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Estudiantes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return Estudiantes
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Estudiantes
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Estudiantes
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set programaAcademico
     *
     * @param integer $programaAcademico
     * @return Estudiantes
     */
    public function setProgramaAcademico($programaAcademico)
    {
        $this->programaAcademico = $programaAcademico;

        return $this;
    }

    /**
     * Get programaAcademico
     *
     * @return integer 
     */
    public function getProgramaAcademico()
    {
        return $this->programaAcademico;
    }

    /**
     * Set semestre
     *
     * @param integer $semestre
     * @return Estudiantes
     */
    public function setSemestre($semestre)
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * Get semestre
     *
     * @return integer 
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Set proyectoInvestigacion
     *
     * @param integer $proyectoInvestigacion
     * @return Estudiantes
     */
    public function setProyectoInvestigacion($proyectoInvestigacion)
    {
        $this->proyectoInvestigacion = $proyectoInvestigacion;

        return $this;
    }

    /**
     * Get proyectoInvestigacion
     *
     * @return integer 
     */
    public function getProyectoInvestigacion()
    {
        return $this->proyectoInvestigacion;
    }

    /**
     * Set semilleroFormacion
     *
     * @param integer $semilleroFormacion
     * @return Estudiantes
     */
    public function setSemilleroFormacion($semilleroFormacion)
    {
        $this->semilleroFormacion = $semilleroFormacion;

        return $this;
    }

    /**
     * Get semilleroFormacion
     *
     * @return integer 
     */
    public function getSemilleroFormacion()
    {
        return $this->semilleroFormacion;
    }
}
