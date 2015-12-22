<?php

namespace DgwebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto", indexes={@ORM\Index(name="fk_proyecto_categoriaport1_idx", columns={"id_categoriaport"})})
 * @ORM\Entity
 */
class Proyecto
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
     * @ORM\Column(name="titulo", type="string", length=200, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="string", length=10000, nullable=true)
     */
    private $contenido;
    
    
     /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @var \Categoriaport
     *
     * @ORM\ManyToOne(targetEntity="Categoriaport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categoriaport", referencedColumnName="id")
     * })
     */
    private $idCategoriaport;

    
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
     *
     * @return Proyecto
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
     * Set contenido
     *
     * @param string $contenido
     *
     * @return Proyecto
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
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
     * Set idCategoriaport
     *
     * @param \DgwebBundle\Entity\Categoriaport $idCategoriaport
     *
     * @return Proyecto
     */
    public function setIdCategoriaport(\DgwebBundle\Entity\Categoriaport $idCategoriaport = null)
    {
        $this->idCategoriaport = $idCategoriaport;

        return $this;
    }

    /**
     * Get idCategoriaport
     *
     * @return \DgwebBundle\Entity\Categoriaport
     */
    public function getIdCategoriaport()
    {
        return $this->idCategoriaport;
    }
    
     /**
     * @ORM\OneToMany(targetEntity="ImagenProyecto", mappedBy="proyecto", cascade={"persist", "remove"})
     */
    protected $placas;
    public function __construct()
    {
        //$this->placas = array(new EstudioRadTamPlaca(), new EstudioRadTamPlaca());
        $this->placas = new ArrayCollection();
    }           
    public function getPlacas()
    {
        return $this->placas;
    }
    public function setPlacas(\Doctrine\Common\Collections\Collection $placas)
    {
        $this->placas = $placas;
        foreach ($placas as $placa) {
            $placa->setProyecto($this);
        }
    }
  /*  
      public function removePlaca(ImagenProyecto $placa)
    {
        $this->placas->removeElement($placa);
    }
  */  
   public function __toString() {
    return $this->titulo ? $this->titulo : '';
    }  

}
