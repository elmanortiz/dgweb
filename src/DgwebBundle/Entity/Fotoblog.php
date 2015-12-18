<?php

namespace DgwebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \Entrada
     *
     * @ORM\ManyToOne(targetEntity="Entrada")
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
