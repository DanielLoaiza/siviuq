<?php

namespace Siviuq\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Avance
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Avance
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
	 * @ORM\Column(type="string", length=255)
	 */
	public $path;
	
	/**
	 * @Assert\File(
	 *     maxSize = "2048k",
	 *     mimeTypes = {"application/msword",
	 *     "application/vnd.openxmlformats-officedocument.wordprocessingml.document"},
	 *     mimeTypesMessage = "Por favor subir un word valido"
	 * )
	 */
	private $file;
	
	private $temp;
	
	/**
	 * 
	 * @ManyToOne(targetEntity="Proyectos")
	 */
	private $proyecto;
	
	
	public function getAbsolutePath()
	{
		return null === $this->path
		? null
		: $this->getUploadRootDir().'/'.$this->path;
	}
	
	public function getWebPath()
	{
		return null === $this->path
		? null
		: $this->getUploadDir().'/'.$this->path;
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
	 * Get file.
	 *
	 * @return UploadedFile
	 */
	public function getFile()
	{
		return $this->file;
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getProyecto() {
		return $this->proyecto;
	}
	public function setProyecto($proyecto) {
		$this->proyecto = $proyecto;
		return $this;
	}
	
	
	
}