<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/11/21
 * Time: 9:17 PM
 */


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
     * @ORM\Column(name="department_name", type="string")
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
     *   @ORM\JoinColumn(name="location_id", referencedColumnName="location_id")
     */
    private $location;

    /**
     * @return string
     */
    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    /**
     * @param string $departmentName
     */
    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;
    }

    /**
     * @return int
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * @param int $departmentId
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    /**
     * @return Locations
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Locations $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }


}

