<?php

namespace DgwebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fotoportafolio
 *
 * @ORM\Table(name="fotoportafolio")
 * @ORM\Entity
 */
class Fotoportafolio
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proyecto", inversedBy="idFotoportafolio")
     * @ORM\JoinTable(name="fotoportafolio_proyecto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_fotoportafolio", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_proyecto", referencedColumnName="id")
     *   }
     * )
     */
    private $idProyecto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProyecto = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Fotoportafolio
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
     * Add idProyecto
     *
     * @param \DgwebBundle\Entity\Proyecto $idProyecto
     *
     * @return Fotoportafolio
     */
    public function addIdProyecto(\DgwebBundle\Entity\Proyecto $idProyecto)
    {
        $this->idProyecto[] = $idProyecto;

        return $this;
    }

    /**
     * Remove idProyecto
     *
     * @param \DgwebBundle\Entity\Proyecto $idProyecto
     */
    public function removeIdProyecto(\DgwebBundle\Entity\Proyecto $idProyecto)
    {
        $this->idProyecto->removeElement($idProyecto);
    }

    /**
     * Get idProyecto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdProyecto()
    {
        return $this->idProyecto;
    }
}
