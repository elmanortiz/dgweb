<?php

namespace DgwebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * ImagenProyecto
 *
 * @ORM\Table(name="imagen_proyecto")
 * @ORM\Entity
 */
class ImagenProyecto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     */
    private $imagen;
    
     /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;
    
    /**
     * @var \proyecto
     *
     * @ORM\ManyToOne(targetEntity="Proyecto", inversedBy="placas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proyecto", referencedColumnName="id")
     * })
     */
    private $proyecto;
    
 
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
     * Set imagen
     *
     * @param string $imagen
     *
     * @return ImagenProyecto
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }
    
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
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
     * Set proyecto
     *
     * @param \DgwebBundle\Entity\Proyecto $proyecto
     *
     * @return ImagenProyecto
     */
    public function setProyecto(\DgwebBundle\Entity\Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \DgwebBundle\Entity\Proyecto
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }

}
