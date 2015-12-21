<?php

namespace DgwebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Fotoblog
 *
 * @ORM\Table(name="fotoblog", indexes={@ORM\Index(name="fk_fotoblog_entrada_idx", columns={"id_entrada"})})
 * @ORM\Entity
 */
class Fotoblog
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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;
    
     /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @var \Entrada
     *
     * @ORM\ManyToOne(targetEntity="Entrada", inversedBy="idimagen", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entrada", referencedColumnName="id")
     * })
     */
    private $idEntrada;



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
     *
     * @return Fotoblog
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
     * Set idEntrada
     *
     * @param \DgwebBundle\Entity\Entrada $idEntrada
     *
     * @return Fotoblog
     */
    public function setIdEntrada(\DgwebBundle\Entity\Entrada $idEntrada = null)
    {
        $this->idEntrada = $idEntrada;

        return $this;
    }

    /**
     * Get idEntrada
     *
     * @return \DgwebBundle\Entity\Entrada
     */
    public function getIdEntrada()
    {
        return $this->idEntrada;
    }
}
