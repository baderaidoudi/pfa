<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locations
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity
 */
class Locations
{
    /**
     * @var string
     *
     * @ORM\Column(name="adr", type="string", length=255)
     */
    private $adr;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=255)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Pfa\ProjectBundle\Entity\Departments", mappedBy="Locations")
     */
    private $departments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

