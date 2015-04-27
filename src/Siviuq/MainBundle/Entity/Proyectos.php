<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * @ORM\Column(name="numero_proyecto",type="string",nullable=true)
     */
    private $numeroProyecto;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path2;
    
    /**
     * @Assert\File(
     *     maxSize = "2048k",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Por favor subir un PDF valido"
     * )
     */
    private $file;
    
    /**
     * @Assert\File(
     *     maxSize = "2048k",
     *     mimeTypes = {"application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"},
     *     mimeTypesMessage = "Por favor subir un Excel valido"
     * )
     */
    private $file2;
    
     /**
     * 
     * @ManyToOne(targetEntity="Convocatoria")
     */
    private $numeroConvocatoria;
    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=200)
     */
    private $titulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="gasto_efectivo", type="integer",nullable=true)
     */
    private $gastoEfectivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion", type="smallint",nullable=true)
     */
    private $duracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicio", type="date",nullable=true)
     */
    private $fechaInicio;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="date",nullable=true)
     */
    private $fechaFin;
    
    /**
     * 
     * @ManyToOne(targetEntity="GruposInvestigacion")
     */
    private $grupoInvestigacionId;


	/**
	 * @ManyToMany(targetEntity="Investigador")
	 */
    private $investigadores;
    
    /**
     * @ManyToOne(targetEntity="LineasInvestigacion")
     */
    private $lineaInvestigacion;
    
    
    /**
     * @ManyToOne(targetEntity="Investigador")
     */
    private $investigadorPrincipal;
    
   /**
     * @var integer
     *
     * @ORM\Column(name="horasPrincipal", type="smallint",nullable=true)
     */
    private $horasInvestigadorPrincipal;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="horasCoinvestigadores", type="smallint",nullable=true)
     */
    private $horasCoinvestigadores;
    
    /**
     * @var string
     *
     * @ORM\Column(name="estadoInforme", type="string", length=15,nullable=true)
     */
    private $estadoInforme;

    
    /**
     * @var string
     * @ORM\Column(name="estado", type="string", length=15,nullable=true)
     */
    private $estado;
    

    public function __construct()
    {
    
    	$this->investigadores=new ArrayCollection();
    }
	
	/**
	 *
	 * @return the integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * @param
	 *        	$id
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getNumeroProyecto() {
		return $this->numeroProyecto;
	}
	
	/**
	 *
	 * @param string $numeroProyecto        	
	 */
	public function setNumeroProyecto( $numeroProyecto) {
		$this->numeroProyecto = $numeroProyecto;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getNumeroConvocatoria() {
		return $this->numeroConvocatoria;
	}
	
	/**
	 *
	 * @param string $numeroConvocatoria        	
	 */
	public function setNumeroConvocatoria( $numeroConvocatoria) {
		$this->numeroConvocatoria = $numeroConvocatoria;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getTitulo() {
		return $this->titulo;
	}
	
	/**
	 *
	 * @param string $titulo        	
	 */
	public function setTitulo( $titulo) {
		$this->titulo = $titulo;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getGastoEfectivo() {
		return $this->gastoEfectivo;
	}
	
	/**
	 *
	 * @param
	 *        	$gastoEfectivo
	 */
	public function setGastoEfectivo($gastoEfectivo) {
		$this->gastoEfectivo = $gastoEfectivo;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getDuracion() {
		return $this->duracion;
	}
	
	/**
	 *
	 * @param
	 *        	$duracion
	 */
	public function setDuracion($duracion) {
		$this->duracion = $duracion;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getFechaInicio() {
		return $this->fechaInicio;
	}
	
	/**
	 *
	 * @param \DateTime $fechaInicio        	
	 */
	public function setFechaInicio( $fechaInicio) {
		$this->fechaInicio = $fechaInicio;
		return $this;
	}
	
	/**
	 *
	 * @return the DateTime
	 */
	public function getFechaFin() {
		return $this->fechaFin;
	}
	
	/**
	 *
	 * @param \DateTime $fechaFin        	
	 */
	public function setFechaFin( $fechaFin) {
		$this->fechaFin = $fechaFin;
		return $this;
	}
	
	
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
	public function getInvestigadores() {
		return $this->investigadores;
	}
	
	/**
	 *
	 * @param unknown_type $investigadores        	
	 */
	public function setInvestigadores($investigadores) {
		$this->investigadores = $investigadores;
		return $this;
	}
	

	/**
	 *
	 * @return the unknown_type
	 */
	public function getLineaInvestigacion() {
		return $this->lineaInvestigacion;
	}
	
	/**
	 *
	 * @param unknown_type $lineaInvestigacion        	
	 */
	public function setLineaInvestigacion($lineaInvestigacion) {
		$this->lineaInvestigacion = $lineaInvestigacion;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getInvestigadorPrincipal() {
		return $this->investigadorPrincipal;
	}
	
	/**
	 *
	 * @param unknown_type $investigadorPrincipal        	
	 */
	public function setInvestigadorPrincipal($investigadorPrincipal) {
		$this->investigadorPrincipal = $investigadorPrincipal;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getHorasInvestigadorPrincipal() {
		return $this->horasInvestigadorPrincipal;
	}
	
	/**
	 *
	 * @param
	 *        	$horasInvestigadorPrincipal
	 */
	public function setHorasInvestigadorPrincipal($horasInvestigadorPrincipal) {
		$this->horasInvestigadorPrincipal = $horasInvestigadorPrincipal;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getHorasCoinvestigadores() {
		return $this->horasCoinvestigadores;
	}
	
	/**
	 *
	 * @param
	 *        	$horasCoinvestigadores
	 */
	public function setHorasCoinvestigadores($horasCoinvestigadores) {
		$this->horasCoinvestigadores = $horasCoinvestigadores;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getEstadoInforme() {
		return $this->estadoInforme;
	}
	
	/**
	 *
	 * @param string $estadoInforme        	
	 */
	public function setEstadoInforme( $estadoInforme) {
		$this->estadoInforme = $estadoInforme;
		return $this;
	}
	
	public function getAbsolutePath()
	{
		return null === $this->path
		? null
		: $this->getUploadRootDir().'/'.$this->path;
	}
	
	public function getAbsolutePath2()
	{
		return null === $this->path2
		? null
		: $this->getUploadRootDir().'/'.$this->path2;
	}
	
	public function getWebPath()
	{
		return null === $this->path
		? null
		: $this->getUploadDir().'/'.$this->path;
	}
	
	public function getWebPath2()
	{
		return null === $this->path2
		? null
		: $this->getUploadDir().'/'.$this->path2;
	}
	
	protected function getUploadRootDir()
	{
		// the absolute directory path where uploaded
		// documents should be saved
		return __DIR__.'/../../../../web/'.$this->getUploadDir();
	}
	
	
	protected function getUploadDir()
	{
		// get rid of the __DIR__ so it doesn't screw up
		// when displaying uploaded doc/image in the view.
		return '/bundles/siviuqmain/uploads';
	}
	

	/**
	 * @ORM\PostPersist()
	 * @ORM\PostUpdate()
	 */
	public function upload()
	{
		// the file property can be empty if the field is not required
		if (null === $this->getFile()) {
			return;
		}
	
		// use the original file name here but you should
		// sanitize it at least to avoid any security issues
	
		// move takes the target directory and then the
		// target filename to move to
		$this->getFile()->move(
				$this->getUploadRootDir(),
				$this->getFile()->getClientOriginalName()
		);
		 
		if (isset($this->temp)) {
			// delete the old image
			unlink($this->getUploadRootDir().'/'.$this->temp);
			// clear the temp image path
			$this->temp = null;
		}
		 
	
		// set the path property to the filename where you've saved the file
		$this->path = $this->getFile()->getClientOriginalName();
	
		// clean up the file property as you won't need it anymore
		$this->file = null;
	}
	
	/**
	 * @ORM\PostPersist()
	 * @ORM\PostUpdate()
	 */
	public function upload2()
	{
		// the file property can be empty if the field is not required
		if (null === $this->getFile2()) {
			return;
		}
	
		// use the original file name here but you should
		// sanitize it at least to avoid any security issues
	
		// move takes the target directory and then the
		// target filename to move to
		$this->getFile2()->move(
				$this->getUploadRootDir(),
				$this->getFile2()->getClientOriginalName()
		);
			
		if (isset($this->temp2)) {
			// delete the old image
			unlink($this->getUploadRootDir().'/'.$this->temp2);
			// clear the temp image path
			$this->temp2 = null;
		}
			
	
		// set the path property to the filename where you've saved the file
		$this->path2 = $this->getFile2()->getClientOriginalName();
	
		// clean up the file property as you won't need it anymore
		$this->file2 = null;
	}
	
	/**
	 * @ORM\PostRemove()
	 */
	public function removeUpload()
	{
		$file = $this->getAbsolutePath();
		if ($file) {
			unlink($file);
		}
	}
	
	/**
	 * @ORM\PostRemove()
	 */
	public function removeUpload2()
	{
		$file = $this->getAbsolutePath2();
		if ($file) {
			unlink($file);
		}
	}
	
	/**
	 * Sets file.
	 *
	 * @param UploadedFile $file
	 */
	/**
	 * Sets file.
	 *
	 * @param UploadedFile $file
	 */
	public function setFile(UploadedFile $file = null)
	{
		$this->file = $file;
		// check if we have an old image path
		if (isset($this->path)) {
			// store the old name to delete after the update
			$this->temp = $this->path;
			$this->path = null;
		} else {
			$this->path = 'initial';
		}
	}
	
	/**
	 * Sets file.
	 *
	 * @param UploadedFile $file
	 */
	/**
	 * Sets file.
	 *
	 * @param UploadedFile $file
	 */
	public function setFile2(UploadedFile $file = null)
	{
		$this->file2 = $file;
		// check if we have an old image path
		if (isset($this->path2)) {
			// store the old name to delete after the update
			$this->temp2 = $this->path2;
			$this->path2 = null;
		} else {
			$this->path2 = 'initial';
		}
	}
	
	/**
	 * @ORM\PrePersist()
	 * @ORM\PreUpdate()
	 */
	public function preUpload()
	{
		if (null !== $this->getFile()) {
			// do whatever you want to generate a unique name
			$filename = sha1(uniqid(mt_rand(), true));
			$this->path = $filename.'.'.$this->getFile()->getExtension();
		}
	}
	
	/**
	 * @ORM\PrePersist()
	 * @ORM\PreUpdate()
	 */
	public function preUpload2()
	{
		if (null !== $this->getFile2()) {
			// do whatever you want to generate a unique name
			$filename = sha1(uniqid(mt_rand(), true));
			$this->path2 = $filename.'.'.$this->getFile2()->getExtension();
		}
	}
	
	/**
	 * Get file.
	 *
	 * @return UploadedFile
	 */
	public function getFile()
	{
		return $this->file;
	}
	
	/**
	 * Get file.
	 *
	 * @return UploadedFile
	 */
	public function getFile2()
	{
		return $this->file2;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function setEstado($estado) {
		$this->estado = $estado;
		return $this;
	}
	
	
	
    
}
