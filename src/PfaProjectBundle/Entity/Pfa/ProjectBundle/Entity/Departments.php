<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departments
 *
 * @ORM\Table(name="departments")
 * @ORM\Entity
 */
class Departments
{
    /**
     * @var string
     *
     * @ORM\Column(name="department_name", type="string", length=255)
     */
    private $departmentName;

    /**
     * @var integer
     *
     * @ORM\Column(name="department_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $departmentId;

    /**
     * @var \Pfa\ProjectBundle\Entity\Locations
     *
     * @ORM\ManyToOne(targetEntity="Pfa\ProjectBundle\Entity\Locations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location_id", referencedColumnName="location_id")
     * })
     */
    private $location;


}

