<?php

namespace DgwebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \Categoriaport
     *
     * @ORM\ManyToOne(targetEntity="Categoriaport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categoriaport", referencedColumnName="id")
     * })
     */
    private $idCategoriaport;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fotoportafolio", mappedBy="idProyecto")
     */
    private $idFotoportafolio;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idFotoportafolio = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add idFotoportafolio
     *
     * @param \DgwebBundle\Entity\Fotoportafolio $idFotoportafolio
     *
     * @return Proyecto
     */
    public function addIdFotoportafolio(\DgwebBundle\Entity\Fotoportafolio $idFotoportafolio)
    {
        $this->idFotoportafolio[] = $idFotoportafolio;

        return $this;
    }

    /**
     * Remove idFotoportafolio
     *
     * @param \DgwebBundle\Entity\Fotoportafolio $idFotoportafolio
     */
    public function removeIdFotoportafolio(\DgwebBundle\Entity\Fotoportafolio $idFotoportafolio)
    {
        $this->idFotoportafolio->removeElement($idFotoportafolio);
    }

    /**
     * Get idFotoportafolio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdFotoportafolio()
    {
        return $this->idFotoportafolio;
    }
}
