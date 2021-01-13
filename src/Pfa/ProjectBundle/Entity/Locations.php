<?php

namespace Pfa\ProjectBundle\Entity;
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/11/21
 * Time: 9:17 PM
 */


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

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
     * @ORM\Column(name="adr", type="string")
     */
    private $adr;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string")
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
     * One product has many features. This is the inverse side.
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Pfa\ProjectBundle\Entity\Departments", mappedBy="location")
     */
    private $departments;




    public function __construct() {
        $this->departments = new ArrayCollection();

    }

    /**
     * @return ArrayCollection
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * @param ArrayCollection $departments
     */
    public function setDepartments($departments)
    {
        $this->departments = $departments;
    }





    /**
     * @return string
     */
    public function getAdr()
    {
        return $this->adr;
    }

    /**
     * @param string $adr
     */
    public function setAdr($adr)
    {
        $this->adr = $adr;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param int $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }


}

